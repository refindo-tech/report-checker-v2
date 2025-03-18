<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\finalReport;
use App\Models\Kampus;
use App\Models\laprak_has_mikroskill;
use App\Models\ProgramStudi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FinalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = finalReport::with('user')->get();
        // dd($report);
        $reportUser = finalReport::where('user_id', Auth::user()->id)->with('user')->get();
        $reports = finalReport::where('user_id', Auth::user()->id)->with('user')->latest()->first();
        // dd($report);
        return view('final_report.index', compact('report', 'reports', 'reportUser'));
    }

    // ini buat mahasiswa dari program studi kesini
    public function indexMahasiswa($id)
    {
        $report = finalReport::where('user_id', $id)
            ->whereHas('user', function ($query) {
                $query->where('id_kampus', Auth::user()->id_kampus);
            })
            ->with('user') // Ambil relasi user
            ->get();
        // dd($report);

        $reports = finalReport::where('user_id', Auth::user()->id)->with('user')->latest()->first();
        // dd($reports);
        return view('final_report.mahasiswaview', compact('report', 'reports'));
    }

    // ini buat dosen atau prodi
    public function indexDosen()
    {
        $report = finalReport::selectRaw('final_reports.user_id, COUNT(*) as total')
            ->join('users', 'users.id', '=', 'final_reports.user_id') // Join dengan tabel users
            ->where('users.id_kampus', Auth::user()->id_kampus) // Filter berdasarkan id_kampus di tabel users
            ->groupBy('final_reports.user_id')
            ->with('user.mahasiswa') // Ambil relasi mahasiswa
            ->get();


        // dd($reports);
        return view('final_report.dosenview', compact('report',));
    }

    // ini buat admin
    public function indexAdmin()
    {
        $fakultas = Fakultas::with(['prodi'])
            ->where('id_kampus', Auth::user()->id_kampus)
            ->get();


        // dd($fakultas);
        return view('final_report.adminview', compact('fakultas',));
    }

    // ini buat prodi
    public function indexProdi($id)
    {
        $users = User::where('id_prodi', $id)->role('Mahasiswa')->with('Mahasiswa')
            ->get();

        return view('final_report.prodiview', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function review(Request $request, $id)
    {
        $report = finalReport::findorFail($id);
        // dd($id, $report);
        // $report->status = '2';
        $report->reviewer_id = Auth::user()->id;
        $report->save();
        // dd($report, $id);
        return view('final_report.review', compact('report'));
    }

    public function reviewstore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'laprak' => 'required',
            'sertifikat' => 'required',
            'nilai_sertifikat' => 'required|integer|min:0|max:100',
            'dokumentasi' => 'required',
            'tes_mikroskill' => 'required',
            'nilai_mikroskill' => 'required|integer|min:0|max:100',
            'maks_sks' => 'required|integer|min:0|max:24',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // dd($request->all());
        $report = finalReport::find($id);
        if ($request->feedback != null) {
            $report->feedback = $request->feedback;
            $report->save();
        }
        $report->laprak_status = $request->laprak;
        $report->sertifikat_status = $request->sertifikat;
        $report->dokumentasi_status = $request->dokumentasi;
        $report->mikroskill_status = $request->tes_mikroskill;
        $report->nilai_sertifikat = $request->nilai_sertifikat;
        $report->nilai_mikroskill = $request->nilai_mikroskill;
        $report->maks_sks = $request->maks_sks;

        // ✅ **Jika salah satu status tidak valid (0), maka status keseluruhan juga tidak valid (3)**
        if ($request->laprak == 0 || $request->sertifikat == 0 || $request->dokumentasi == 0 || $request->tes_mikroskill == 0) {
            $report->status = '3'; // 3 = Tidak Valid ❌
        } else {
            $report->status = '2'; // 2 = Valid ✅
        }
        $report->save();

        // alihkan halaman ke halaman slider.index  
        return redirect()->route('report.indexMahasiswa', $report->user_id)->with('success', 'Berkas berhasil direview.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi file
        $validator = Validator::make($request->all(), [
            'laprak' => 'required|file|mimes:pdf,doc,docx',
            'sertifikat' => 'required|file|mimes:pdf,doc,docx',
            'dokumentasi' => 'required|file|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Ubah nama file gambar dengan angka random
        $fileName = Auth()->user()->name . '-' . 'laprak' . '-' . time() . '.' . $request->file('laprak')->extension();
        $fileNameSertif = Auth()->user()->name . '-' . 'sertifikat' . '-' . time() . '.' . $request->file('sertifikat')->extension();
        $fileNameDok = Auth()->user()->name . '-' . 'dokumentasi' . '-' . time() . '.' . $request->file('dokumentasi')->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/report', $request->file('laprak'), $fileName);
        Storage::putFileAs('public/sertifikat', $request->file('sertifikat'), $fileNameSertif);
        Storage::putFileAs('public/dokumentasi', $request->file('dokumentasi'), $fileNameDok);


        // Insert data ke table finalReport
        $report = finalReport::create([
            'user_id' => Auth::user()->id,
            'status' => '1',
            'laprak' => $fileName, // Sekarang tidak null
            'sertifikat' => $fileNameSertif,
            'dokumentasi' => $fileNameDok,
            'mitra' => $request->mitra,
            'addressMitra' => $request->addressMitra,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'JenisKegiatan' => $request->jenisKegiatan,
            'laprak_status' => false,
            'sertifikat_status' => false,
            'dokumentasi_status' => false,
            'mikroskill_status' => false,
        ]);

        // Redirect ke halaman report.index dengan pesan sukses
        return redirect()->route('report.index')->with('success', 'Berkas berhasil diupload.');
    }


    /**
     * Display the specified resource.
     */
    public function show(finalReport $finalReport, $id)
    {
        $finalReport = finalReport::with('user', 'reviewer')->find($id);
        // dd($finalReport);
        return view('final_report.show', compact('finalReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(finalReport $finalReport, $id)
    {
        $report = finalReport::find($id);
        return view('final_report.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, finalReport $finalReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(finalReport $finalReport, $id)
    {
        $report = finalReport::find($id);
        Storage::delete('public/report/' . $report->berkas);
        $report->delete();
        return redirect()->route('report.index')->with('success', 'Berkas berhasil dihapus.');
    }

    public function tesMikroskill($id)
    {
        $report = finalReport::find($id);
        return view('final_report.tesmikroskill', compact('report'));
    }

    public function tesMikroskillStore(Request $request, $id)
    {
        // Misalnya, validasi input jika diperlukan
        $request->validate([
            // Pastikan setiap pertanyaan diisi
            'question1'  => 'required|integer',
            'question2'  => 'required|integer',
            'question3'  => 'required|integer',
            'question4'  => 'required|integer',
            'question5'  => 'required|integer',
            'question6'  => 'required|integer',
            'question7'  => 'required|integer',
            'question8'  => 'required|integer',
            'question9'  => 'required|integer',
            'question10' => 'required|integer',
            'question11' => 'required|integer',
            'question12' => 'required|integer',
            'question13' => 'required|integer',
            'question14' => 'required|integer',
            'question15' => 'required|integer',
            'question16' => 'required|integer',
            'question17' => 'required|integer',
            'question18' => 'required|integer',
            'question19' => 'required|integer',
            'question20' => 'required|integer',
        ]);

        // Menghitung total score dengan looping
        $totalScore = 0;
        for ($i = 1; $i <= 20; $i++) {
            $totalScore += (int) $request->input("question$i", 0);
        }

        // Misalnya, update model FinalReport dengan nilai total mikroskill
        $report = FinalReport::findOrFail($id);
        $report->nilai_mikroskill = $totalScore;
        $report->save();

        return redirect()->route('report.index')->with('success', "Tes Mikroskil berhasil disimpan. Total score: $totalScore");
    }


    public function cetak_pdf()
    {
        // $report = finalReport::with('user', 'reviewer', 'mahasiswa', 'dosen')->find($id);
        // $kampus = Kampus::where('id', $report->user->id_kampus)->first();
        // dd($report, $kampus);    
        // $pivotData = laprak_has_mikroskill::with('mikroskill', 'report')->where('id_laprak', $report->id)->get();
        // dd($pivotData);

        // $opciones_ssl = array(
        //     "ssl" => array(
        //         "verify_peer" => false,
        //         "verify_peer_name" => false,
        //     ),
        // );

        // $img_path = public_path('admin/img/logountirta.png');
        // $img_kampus = public_path('storage/kampus/' . $kampus->image);
        // $extencion = pathinfo($img_path, PATHINFO_EXTENSION);
        // $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
        // $img_base_64 = base64_encode($data);
        // $path_img = 'data:image/' . $extencion . ';base64,' . $img_base_64;

        // $path_img = asset('admin/img/logountirta.png');

        // Pastikan data dikirim sebagai array
        $pdf = PDF::loadView('final_report.print', [
            // 'report' => $report,
            // 'kampus' => $kampus,
            // 'pivotData' => $pivotData,
            // 'path_img' => $img_path,
            // 'img_kampus' => $img_kampus,
        ]);

        // Download file PDF
        return $pdf->stream();
    }
}
