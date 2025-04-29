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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function master_profil()
    {
        $user = User::where('id', Auth::user()->id)->with('prodi', 'mahasiswa', 'programStudi', 'fakultas')->first();
        // $fakultas = optional(optional($user->programStudi)->fakultas)->id ?
        //     Fakultas::find($user->programStudi->fakultas->id) : null;

        // dd($user, $fakultas, $user->programStudi);
        return view('master.master_profil', compact('user'));
    }
    public function master_profil_edit()
    {
        $users = User::where('id', Auth::user()->id)->with('prodi', 'mahasiswa', 'kampus', 'fakultas', 'programStudi')->first();
        // $kampus = Kampus::all();
        // dd($users->programStudi);
        $fakultas = optional($users)->id_kampus ?
            Fakultas::where('id_kampus', $users->id_kampus)->get() : null;

        // Ambil semua id_fakultas dari fakultas yang ditemukan
        $fakultasIds = $fakultas->pluck('id');

        // Cari semua program studi yang memiliki id_fakultas yang ada dalam fakultasIds
        $programstudi = ProgramStudi::whereIn('id_fakultas', $fakultasIds)->get();

        return view('master.master_profil_edit', compact('users', 'fakultas', 'programstudi'));
    }
    public function master_profil_update(Request $request)
    {
        $user = Auth::user();
        // dd($request->all());
        $id = $user->id;
        // dd($id);
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            // ambil nama file lama
            $old_image = $user->image;

            // path folder tujuan
            $destinationPath = public_path('profile');

            // buat folder jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // hapus gambar lama jika ada
            $oldPath = $destinationPath . '/' . $old_image;
            if ($old_image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($destinationPath, $imageName);

            // update user
            User::where('id', $id)->update([
                'id_kampus' => $user->id_kampus,
                'id_prodi' => $request->id_prodi,
                'name' => $request->name,
                'email' => $request->email,
                'image' => $imageName,
            ]);

            // update detail tambahan
            if ($user->roles[0]->name == 'Prodi' || $user->roles[0]->name == 'AdminPT') {
                Prodi::updateOrCreate(
                    ['user_id' => $id],
                    [
                        'nip' => $request->nip,
                        'gender' => $request->gender,
                        'phone' => $request->phone,
                        'address' => $request->alamat,
                    ]
                );
            } else if ($user->roles[0]->name == 'Mahasiswa') {
                Mahasiswa::updateOrCreate(
                    ['user_id' => $id],
                    [
                        'nim' => $request->nim,
                        'gender' => $request->gender,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'semester' => $request->semester,
                    ]
                );
            }
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            // Ambil data pengguna saat ini
            $user = Auth::user();
            $id = $user->id;

            // update data product tanpa menyertakan file gambar
            User::where('id', $id)->update([
                'id_kampus' => $user->id_kampus,
                'id_prodi' => $request->id_prodi,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($user->roles[0]->name == 'Prodi' || $user->roles[0]->name == 'AdminPT') {

                Prodi::updateOrCreate(
                    ['user_id' => $id], // Kondisi pencarian
                    [
                        'nip' => $request->nip,
                        'gender' => $request->gender,
                        'phone' => $request->phone,
                        'address' => $request->alamat,
                    ]
                );
            } else if ($user->roles[0]->name == 'Mahasiswa') {

                Mahasiswa::updateOrCreate(
                    ['user_id' => $id], // Kondisi pencarian
                    [
                        'nim' => $request->nim,
                        'gender' => $request->gender,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'semester' => $request->semester,
                    ]
                );
            }
        }

        // redirect ke halaman product.index
        return redirect()->route('profil_admin')->with('success', 'Profile berhasil diperbarui.');

        // // Redirect dengan pesan sukses
        // return view('master.master_profil')->with([
        //     'success' => 'Profil berhasil diperbarui.'
        // ]);
    }
    //tools
    public function tools_impor_data_master()
    {
        return view('master.tools_impor_data_master');
    }
    public function tools_ekspor_data_master()
    {
        return view('master.tools_ekspor_data_master');
    }
    public function tools_backup_database()
    {
        return view('master.tools_backup_database');
    }
    public function tools_data_login()
    {
        return view('master.tools_data_login');
    }

    //akademik
    public function akademik_indentitas_sekolah()
    {
        return view('master.akademik_indentitas_sekolah');
    }
    public function akademik_tenaga_pendidik()
    {
        return view('master.akademik_tenaga_pendidik');
    }
    public function akademik_paket_keahlian()
    {
        return view('master.akademik_paket_keahlian');
    }
    public function akademik_mata_pelajaran()
    {
        return view('master.akademik_mata_pelajaran');
    }
    public function akademik_capaian_pembelajaran()
    {
        return view('master.akademik_capaian_pembelajaran');
    }
    public function akademik_kelas_walikelas()
    {
        return view('master.akademik_kelas_walikelas');
    }
    public function akademik_peserta_didik()
    {
        return view('master.akademik_peserta_didik');
    }

    //kurikulum
    public function kurikulum_versi()
    {
        return view('master.kurikulum_versi');
    }
    public function kurikulum_tahunajaran()
    {
        return view('master.kurikulum_tahunajaran');
    }
    public function kurikulum_pengumuman()
    {
        return view('master.kurikulum_pengumuman');
    }
    public function kurikulum_perakat_ujian()
    {
        return view('master.kurikulum_perakat_ujian');
    }
    public function kurikulum_proses_kbm_perkelas()
    {
        return view('master.kurikulum_proses_kbm_perkelas');
    }
    public function kurikulum_proses_kbm_perguru()
    {
        return view('master.kurikulum_proses_kbm_perguru');
    }
    public function kurikulum_proses_kbm_remedial()
    {
        return view('master.kurikulum_proses_kbm_remedial');
    }
    public function kurikulum_cetak_rapor()
    {
        return view('master.kurikulum_cetak_rapor');
    }
    public function kurikulum_transkrip_nilai()
    {
        return view('master.kurikulum_transkrip_nilai');
    }
}
