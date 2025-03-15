<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id_kampus', Auth::user()->id_kampus)->with('dosen', 'mahasiswa')->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $kampus = Kampus::all();
        return view('user.create', compact('kampus'));
    }

    public function store(Request $request)
    {
        // dd(request()->all());

        $validator = Validator::make($request->all(), [
            'id_kampus' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->role == 'Dosen') {

            // dd(request()->all());
            // Simpan data ke database
            $user = User::create([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // assign Role menggunakan spatie
            $user->assignRole('Dosen');

            Dosen::create([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
            ]);
        } elseif ($request->role == 'Mahasiswa') {
            // dd($request->all());
            // Simpan data ke database
            $user = User::create([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            // assign Role menggunakan spatie
            $user->assignRole('Mahasiswa');

            Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => $request->nim,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
                'semester' => $request->semester,
            ]);
        } else {
            // Simpan data ke database
            $user = User::create([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            // assign Role menggunakan spatie
            $user->assignRole('Admin');

            Dosen::create([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
            ]);
        }


        // menampilkan message success
        // session()->flash('added', 'Data Berhasil Ditambahkan.');

        // Arahkan ke halaman
        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan.');;
    }

    public function edit($id)
    {
        $users = User::with('dosen', 'mahasiswa', 'kampus')->findOrFail($id);
        $kampus = Kampus::all();
        // dd($users->name);

        return view('user.edit', compact('users', 'kampus'));
    }

    public function update(Request $request, $id)
    {
        $user = User::with('dosen', 'mahasiswa')->find($id);
        // dd($request->all(), $user);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $rules = [
            'id_kampus' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];

        $validated = $request->validate($rules);

        if ($user->dosen !== null) {
            // Simpan data ke database
            // update ke database
            $user->update([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $dosen = Dosen::where('user_id', $user->id)->first();

            $dosen->update([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
            ]);
        } elseif ($user->mahasiswa !== null) {
            // Simpan data ke database
            // update ke database
            $user->update([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

            $mahasiswa->update([
                'user_id' => $user->id,
                'nim' => $request->nim,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
                'prodi' => $request->prodi,
                'semester' => $request->semester,
            ]);
        } else {
            // dd($user);
            // update ke database
            $user->update([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah.');
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Ambil user yang sedang login
        $user = User::find(Auth::id());

        // Cek apakah password lama benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profil_admin')->with('success', 'Profile berhasil diperbarui.');
    }


    public function show($id)
    {
        $user = User::with('dosen', 'mahasiswa', 'roles', 'kampus')->findOrFail($id);
        // dd($user);
        return view('user.show', compact('user'));
    }
    public function destroy($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);
        $dosen = Dosen::where('user_id', $user->id)->first();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        // dd($user);

        // Hapus data user
        $user->delete();

        if ($dosen != null) {
            $dosen->delete();
        } else if ($mahasiswa != null) {
            $mahasiswa->delete();
        }

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus.');
    }
}
