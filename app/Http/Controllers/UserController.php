<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $kampus = Kampus::all();
        $prodi = ProgramStudi::all();
        $fakultas = Fakultas::all();
        $fakultasRole = Fakultas::where('id_kampus', auth()->user()->id_kampus)->with('kampus')->get();
        // dd($fakultasRole);
        // $programStudi = ProgramStudi::where('id_fakultas', $fakultasRole->id)->with('fakultas.kampus')->get();
        return view('user.create', compact('kampus', 'prodi', 'fakultas', 'fakultasRole'));
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

        if ($request->role == 'Prodi') {

            // dd(request()->all());
            // Simpan data ke database
            $user = User::create([
                'id_kampus' => $request->id_kampus,
                'id_prodi' => $request->id_prodi,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // assign Role menggunakan spatie
            $user->assignRole('Prodi');

            Prodi::create([
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
                'id_prodi' => $request->id_prodi,
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
                'semester' => $request->semester,
            ]);
        } elseif ($request->role == 'AdminPT') {
            // dd(request()->all());
            // Simpan data ke database
            $user = User::create([
                'id_kampus' => $request->id_kampus,
                'id_prodi' => $request->id_prodi,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // assign Role menggunakan spatie
            $user->assignRole('AdminPT');

            Prodi::create([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
            ]);
        } else {
            // Simpan data ke database
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            // assign Role menggunakan spatie
            $user->assignRole('SuperAdmin');
        }


        // menampilkan message success
        // session()->flash('added', 'Data Berhasil Ditambahkan.');

        // Arahkan ke halaman
        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan.');;
    }

    public function edit($id)
    {
        $users = User::with('prodi', 'mahasiswa', 'kampus')->findOrFail($id);
        $kampus = Kampus::all();
        $fakultas = Fakultas::where('id_kampus', $users->id_kampus)->get();
        $prodi = ProgramStudi::where('id_fakultas', $users->id_fakultas)->get();
        // dd($users->name);

        return view('user.edit', compact('users', 'kampus', 'fakultas', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $user = User::with('prodi', 'mahasiswa')->find($id);
        // dd($request->all(), $user);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];

        $validated = $request->validate($rules);

        if ($user->prodi !== null) {
            // Simpan data ke database
            // update ke database
            $user->update([
                'id_kampus' => $request->id_kampus,
                'id_prodi' => $request->id_prodi,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $prodi = Prodi::where('user_id', $user->id)->first();

            $prodi->update([
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
                'semester' => $request->semester,
            ]);
        } else {
            // dd($user);
            // update ke database
            $user->update([
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
        $user = User::with('prodi', 'mahasiswa', 'roles', 'kampus')->findOrFail($id);
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


    public function getFakultasByKampus($kampus_id)
    {
        $fakultas = Fakultas::where('id_kampus', $kampus_id)->get();
        return response()->json($fakultas);
    }

    public function getProdiByFakultas($fakultas_id)
    {
        $prodi = ProgramStudi::where('id_fakultas', $fakultas_id)->get();
        return response()->json($prodi);
    }
}
