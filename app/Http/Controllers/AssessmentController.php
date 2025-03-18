<?php

namespace App\Http\Controllers;

use App\Models\CplMikroskil;
use App\Models\finalReport;
use App\Models\Kampus;
use App\Models\laprak_has_mikroskill;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    /**
     * Menampilkan daftar penilaian.
     */
    public function index()
    {
        // $mikroskill = CplMikroskil::where('id_kampus', Auth::user()->id_kampus)->get();
        $kampus = Kampus::all();

        // Ambil laporan dengan relasi ke mikroskill melalui pivot table
        $reports = finalReport::with(['user', 'mahasiswa', 'mikroskill'])
            ->where('status', '0')
            ->where('reviewer_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($reports);
        // Inisialisasi array untuk menyimpan permission role
        $reportMikroskill = [];

        foreach ($reports as $report) {
            // Mengambil nama mikroskill yang terhubung melalui tabel pivot
            $reportMikroskill[$report->id] = $report->mikroskill->pluck('name')->toArray();
            // dd($reportMikroskill);
        }
        return view('assessment.index');
        // return view('assessment.index', compact('mikroskill', 'kampus', 'reports', 'reportMikroskill'));
    }

    // viewDosen   
    public function indexDosen()
    {
        // $report = finalReport::selectRaw('final_reports.user_id, COUNT(*) as total')
        //     ->join('users', 'users.id', '=', 'final_reports.user_id') // Join dengan tabel users
        //     ->where('users.id_kampus', Auth::user()->id_kampus) // Filter berdasarkan id_kampus di tabel users
        //     ->groupBy('final_reports.user_id')
        //     ->with('user.mahasiswa') // Ambil relasi mahasiswa
        //     ->get();


        // dd($reports);
        return view('assessment.dosenview');
    }

    /**
     * Mengambil data CPL Mikroskil dalam format JSON.
     */
    public function create()
    {
        $mikroskill = CplMikroskil::all();
        return response()->json($mikroskill);
    }

    /**
     * Menyimpan data penilaian baru.
     */
    public function store(Request $request)
    {
        $data = $request->data;

        foreach ($data as $item) {
            Nilai::updateOrCreate(
                ['mata_kuliah_id' => $item['mata_kuliah_id']], // Update jika sudah ada
                ['sks' => $item['sks'], 'nilai' => $item['nilai']]
            );
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
            $mikroskills = $request->mikroskills; // Data baru dari request (array)
            $totalSKS = $request->total_sks;

            // Ambil data lama dari database
            $existingMikroskills = laprak_has_mikroskill::where('id_laprak', $idLaprak)
                ->pluck('id_mikroskill')
                ->toArray();

            // Cari data yang perlu ditambahkan
            $newMikroskills = array_diff($mikroskills, $existingMikroskills);

            // Cari data yang perlu dihapus
            $deletedMikroskills = array_diff($existingMikroskills, $mikroskills);

            // Tambahkan data baru ke database
            foreach ($newMikroskills as $idMikroskill) {
                laprak_has_mikroskill::create([
                    'id_laprak' => $idLaprak,
                    'id_mikroskill' => $idMikroskill,
                ]);
            }

            // Hapus data yang tidak ada di request
            laprak_has_mikroskill::where('id_laprak', $idLaprak)
                ->whereIn('id_mikroskill', $deletedMikroskills)
                ->delete();

            // Update total SKS di tabel final_report
            $finalReport = FinalReport::findOrFail($idLaprak);
            $finalReport->nilai = $totalSKS;
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
