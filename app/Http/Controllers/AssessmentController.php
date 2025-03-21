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
        $report = finalReport::with(['user', 'mahasiswa', 'assesment'])
            ->where('status', '2')
            ->where('user_id', $id)
            ->latest()
            ->firstOrFail(); // Pastikan data ada, kalau tidak akan menampilkan error 404

        // dd($report, $matkul);
        // Inisialisasi array untuk menyimpan permission role
        $reports = finalReport::with(['user', 'mahasiswa', 'assesment'])
            ->where('status', '2')
            ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($reports, $report);
        // Inisialisasi array untuk menyimpan permission role
        $reportAssesment = [];

        foreach ($reports as $item) {
            $reportAssesment[$item->id] = $item->assesment->map(function ($assesment) {
                return [
                    'name' => $assesment->name,
                    'nilai' => $assesment->pivot->nilai ?? 0, // Ambil nilai dari pivot
                ];
            })->toArray();
        }


        // dd($reportAssesment);
        return view('assessment.index', compact('matkul', 'reports', 'reportAssesment'));
        // return view('assessment.index', compact('mikroskill', 'kampus', 'reports', 'reportMikroskill'));
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

    public function printScore()
    {
        return view('final_report.printscore');
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
        $data = $request->data;

        foreach ($data as $item) {
            // Nilai::updateOrCreate(
            //     ['mata_kuliah_id' => $item['mata_kuliah_id']], // Update jika sudah ada
            //     ['sks' => $item['sks'], 'nilai' => $item['nilai']]
            // );
        }

        return response()->json(['message' => 'Data berhasil disimpan']);
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
        DB::beginTransaction();
        try {
            $idLaprak = $request->id_laprak;
            $matakuliah = $request->matakuliah ?? []; // Pastikan selalu array
            $totalSKS = $request->total_sks;
            $nilai = $request->nilai;

            // Ambil data lama dari database
            $existingMatkul = laprak_has_assesment::where('id_laprak', $idLaprak)
                ->pluck('id_matkul')
                ->toArray();

            // Cari data yang perlu ditambahkan
            $newMatkul = array_diff($matakuliah, $existingMatkul);

            // Cari data yang perlu dihapus
            $deletedMatkul = array_diff($existingMatkul, $matakuliah);

            // Tambahkan data baru
            foreach ($newMatkul as $idMatkul) {
                laprak_has_assesment::updateOrCreate([
                    'id_laprak' => $idLaprak,
                    'id_matkul' => $idMatkul,
                    'nilai' => $nilai,
                ]);
            }

            // **Update nilai jika sudah ada**
            laprak_has_assesment::where('id_laprak', $idLaprak)
                ->whereIn('id_matkul', $matakuliah)
                ->update(['nilai' => $nilai]);

            // Hapus data yang tidak ada di request
            laprak_has_assesment::where('id_laprak', $idLaprak)
                ->whereIn('id_matkul', $deletedMatkul)
                ->delete();

            // Update total SKS di tabel final_report
            $finalReport = FinalReport::findOrFail($idLaprak);
            $finalReport->total_sks = $totalSKS;
            $finalReport->save();

            DB::commit();

            return response()->json([
                'message' => 'Data berhasil diperbarui!'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }




    /**
     * Menghapus data berdasarkan ID.
     */
    public function destroy($id)
    {
        $cplMikroskil = CplMikroskil::findOrFail($id);
        $cplMikroskil->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
