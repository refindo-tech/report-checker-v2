<?php

namespace App\Http\Controllers;

use App\Models\CplMikroskil;
use App\Models\finalReport;
use App\Models\Kampus;
use App\Models\laprak_has_assesment;
use App\Models\laprak_has_mikroskill;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    /**
     * Menampilkan daftar penilaian.
     */
    public function index($id)
    {
        // $mikroskill = CplMikroskil::where('id_kampus', Auth::user()->id_kampus)->get();
        $matkul = MataKuliah::where('id_kampus', Auth::user()->id_kampus)->get();

        // Ambil laporan dengan relasi ke mikroskill melalui pivot table
        $reportFirst = finalReport::with(['user', 'mahasiswa', 'assesment'])
            ->where('user_id', $id)
            ->latest()
            ->firstOrFail(); // Pastikan data ada, kalau tidak akan menampilkan error 404

        // dd($report, $matkul);
        // Inisialisasi array untuk menyimpan permission role
        $reports = finalReport::with(['user', 'mahasiswa', 'assesment'])
            ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($reports, $report);
        // Inisialisasi array untuk menyimpan permission role
        $reportAssesment = [];

        foreach ($reports as $item) {
            $reportAssesment[$item->id] = $item->assesment->map(function ($assesment) {
                return [
                    'id'    => $assesment->pivot->id ?? null, // Pastikan pivot memiliki field id
                    'name' => $assesment->name,
                    'nilai' => $assesment->pivot->nilai ?? 0, // Ambil nilai dari pivot
                ];
            })->toArray();
        }


        // dd($reportAssesment);
        return view('assessment.index', compact('matkul', 'reports', 'reportAssesment', 'reportFirst'));
        // return view('assessment.index', compact('mikroskill', 'kampus', 'reports', 'reportMikroskill'));
    }

    public function publish($id)
    {
        $report = finalReport::find($id);
        $report->status = 4;
        $report->save();
        // dd($report);

        return redirect()->back()->with('success', 'Laporan berhasil dipublikasikan.');
    }
    public function unpublish($id)
    {
        $report = finalReport::find($id);
        $report->status = 2;
        $report->save();
        // dd($report);

        return redirect()->back()->with('success', 'Laporan berhasil di Turunkan.');
    }

    public function print($id)
    {
        $report = finalReport::with('user', 'reviewer', 'mahasiswa')->find($id);
        $kampus = Kampus::where('id', $report->user->id_kampus)->first();
        // dd($report, $kampus);    
        $pivotData = laprak_has_assesment::with('assesment', 'report')->where('id_laprak', $report->id)->get();
        // dd($pivotData);

        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        if (empty($kampus->image)) {
            return "Perbarui data kampus";
        }

        $img_path = public_path('admin/img/logountirta.png');
        $img_kampus = public_path('storage/kampus/' . $kampus->image);
        // $extencion = pathinfo($img_path, PATHINFO_EXTENSION);
        // $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
        // $img_base_64 = base64_encode($data);
        // $path_img = 'data:image/' . $extencion . ';base64,' . $img_base_64;

        // $path_img = asset('admin/img/logountirta.png');

        // Pastikan data dikirim sebagai array
        $pdf = PDF::loadView('final_report.print', [
            'report' => $report,
            'kampus' => $kampus,
            'pivotData' => $pivotData,
            'path_img' => $img_path,
            'img_kampus' => $img_kampus,
        ]);

        // Download file PDF
        return $pdf->stream();
    }

    public function printScore($id)
    {
        $report = finalReport::with('user', 'reviewer', 'mahasiswa')->find($id);
        $kampus = Kampus::where('id', $report->user->id_kampus)->first();
        // dd($report, $kampus);    
        $pivotData = laprak_has_assesment::with('assesment', 'report')->where('id_laprak', $report->id)->get();
        $totalSks = $pivotData->sum(function ($data) {
            return $data->matkul->sks ?? 0;
        });
        // dd($pivotData);

        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        $img_path = public_path('admin/img/logountirta.png');
        $img_kampus = public_path('storage/kampus/' . $kampus->image);
        // $extencion = pathinfo($img_path, PATHINFO_EXTENSION);
        // $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
        // $img_base_64 = base64_encode($data);
        // $path_img = 'data:image/' . $extencion . ';base64,' . $img_base_64;

        // $path_img = asset('admin/img/logountirta.png');

        // Pastikan data dikirim sebagai array
        $pdf = PDF::loadView('final_report.printscore', [
            'report' => $report,
            'kampus' => $kampus,
            'totalSks' => $totalSks,
            'pivotData' => $pivotData,
            'path_img' => $img_path,
            'img_kampus' => $img_kampus,
        ]);

        // Download file PDF
        return $pdf->stream();
    }

    // viewDosen   
    public function indexDosen()
    {
        $finalReport = finalReport::with('user')->where('status', '2')->get();
        // dd($finalReport);
        return view('assessment.dosenview', compact('finalReport'));
    }

    /**
     * Mengambil data CPL Mikroskil dalam format JSON.
     */
    public function create()
    {
        $matkul = MataKuliah::all(); // Ambil semua mata kuliah dari database
        return view('assessment.index', compact('matkul'));
    }

    /**
     * Menyimpan data penilaian baru.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $matakuliah = $request->input('matakuliah'); // array id mata kuliah
        $nilai = $request->input('nilai');           // array nilai
        $sks = $request->input('sks');               // array sks (jika diperlukan)
        $idlaprak = $request->input('id_laprak');

        if (is_array($matakuliah)) {
            foreach ($matakuliah as $index => $idMatkul) {
                laprak_has_assesment::updateOrCreate(
                    [
                        'id_laprak' => $idlaprak,
                        'id_matkul' => $idMatkul,
                    ],
                    [
                        'nilai' => $nilai[$index],
                        // Jika diperlukan, Anda juga bisa menyimpan SKS:
                        // 'sks' => $sks[$index],
                    ]
                );
            }
            return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Data penilaian tidak valid.');
        }

        // $validator = Validator::make($request->all(), [
        //     'id_mahasiswa' => 'required|exists:mahasiswa,id',
        //     'id_cpl' => 'required|exists:cpl_mikroskil,id',
        //     'sks' => 'required|integer|min:1|max:10',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // CplMikroskil::create([
        //     'id_mahasiswa' => $request->id_mahasiswa,
        //     'id_cpl' => $request->id_cpl,
        //     'sks' => $request->sks,
        // ]);

        // return redirect()->route('mikroskil.index')->with('success', 'Penilaian berhasil disimpan.');
    }

    /**
     * Mengupdate data secara inline.
     */
    public function updateInline(Request $request)
    {
        // Cari record assessment berdasarkan assessment_id yang dikirim
        $assessment = laprak_has_assesment::find($request->assessment_id);

        if ($assessment) {
            // Pastikan hanya kolom yang diperbolehkan yang diupdate (misalnya: id_matkul atau nilai)
            if (in_array($request->column, ['id_matkul', 'nilai'])) {
                $assessment->{$request->column} = $request->value;
                $assessment->save();

                return response()->json(['message' => 'Data assessment berhasil diupdate.']);
            } else {
                return response()->json(['message' => 'Kolom tidak valid.'], 400);
            }
        }

        return response()->json(['message' => 'Data tidak ditemukan.'], 400);
    }


    /**
     * Menghapus data berdasarkan ID.
     */
    public function destroy($id)
    {
        try {
            // Cari record assessment berdasarkan id
            $assessment = laprak_has_assesment::findOrFail($id);

            // Hapus record
            $assessment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data assessment berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data! ' . $e->getMessage()
            ], 500);
        }
    }
}
