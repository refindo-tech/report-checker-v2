<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function master_profil()
    {
        $user = User::where('id', Auth::user()->id)->with('dosen', 'mahasiswa')->first();
        return view('master.master_profil', compact('user'));
    }
    public function master_profil_edit()
    {
        $users = User::where('id', Auth::user()->id)->with('dosen', 'mahasiswa', 'kampus')->first();
        $kampus = Kampus::all();
        return view('master.master_profil_edit', compact('users', 'kampus'));
    }
    public function master_profil_update(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        $id = $user->id;
        // dd($id);
        if ($request->hasFile('image')) {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            // ambil nama file gambar lama dari database
            $old_image = Auth::user()->image;

            // dd($old_image);

            // hapus file gambar lama dari folder slider
            Storage::delete('public/profile/' . $old_image);

            // ubah nama file
            $imageName = time() . '.' . $request->image->extension();

            // simpan file ke folder public/product
            Storage::putFileAs('public/profile', $request->image, $imageName);

            // update data product
            User::where('id', $id)->update([
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
                'image' => $imageName,
            ]);
            if ($user->roles[0]->name == 'Dosen' || $user->roles[0]->name == 'Admin') {

                Dosen::updateOrCreate(
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
                        'prodi' => $request->prodi,
                        'fakultas' => $request->fakultas,
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
                'id_kampus' => $request->id_kampus,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($user->roles[0]->name == 'Dosen' || $user->roles[0]->name == 'Admin') {

                Dosen::updateOrCreate(
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
                        'prodi' => $request->prodi,
                        'fakultas' => $request->fakultas,
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
