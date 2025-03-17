<?php

namespace App\Http\Controllers;

use App\Models\finalReport;
use App\Models\Kampus;
use App\Models\laprak_has_mikroskill;
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
        $reportUser = finalReport::where('user_id', Auth::user()->id)->with('user')->get();
        $reports = finalReport::where('user_id', Auth::user()->id)->with('user')->latest()->first();
        // dd($reports);
        return view('final_report.index', compact('report', 'reports', 'reportUser'));
    }

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

    /**
     * Show the form for creating a new resource.
     */
    public function review(Request $request, $id)
    {
        $report = finalReport::findorFail($id);
        // dd($id, $report);
        $report->status = '2';
        $report->reviewer_id = Auth::user()->id;
        $report->save();
        // dd($report, $id);
        return view('final_report.review', compact('report'));
    }

    public function reviewstore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
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
        $report->status = $request->status;
        $report->save();

        // alihkan halaman ke halaman slider.index  
        return redirect()->route('report.indexMahasiswa', $report->user_id)->with('success', 'Berkas berhasil direview.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $fileName = Auth()->user()->name . '-' . time() . '.' . $request->file->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/report', $request->file('file'), $fileName);

        // insert data ke table sliders
        $report = finalReport::create([
            'user_id' => Auth::user()->id,
            'status' => '1',
            'berkas' => $fileName,
            'mitra' => $request->mitra,
            'addressMitra' => $request->addressMitra,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'JenisKegiatan' => $request->jenisKegiatan,
        ]);

        // alihkan halaman ke halaman slider.index
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
        Storage::delete('public/report/'.$report->berkas);
        $report->delete();
        return redirect()->route('report.index')->with('success', 'Berkas berhasil dihapus.');
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
