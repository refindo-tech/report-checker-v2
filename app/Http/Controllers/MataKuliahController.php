<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MataKuliah = MataKuliah::with('programStudi')->where('id_prodi', Auth::user()->id_prodi)->get();
        $MatakuliahAdmin = MataKuliah::all();
        // dd($ProgramStudi);
        return view('matakuliah.index', compact('MataKuliah', 'MatakuliahAdmin'));
    }

    public function updateInline(Request $request)
    {
        $mikroskill = MataKuliah::find($request->id);
        if ($mikroskill) {
            $mikroskill->{$request->column} = $request->value;
            $mikroskill->save();
            return response()->json(['message' => 'Mikroskill sukses di update.']);
        }
        return response()->json(['success' => false], 400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mikroskill = MataKuliah::all();
        return response()->json($mikroskill);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validation = Validator::make($request->all(), [
            'name' => 'required|array',
            'sks' => 'required|array',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        foreach ($request->name as $index => $name) {
            MataKuliah::create([
                'id_kampus' => Auth::user()->id_kampus ?? null,
                'id_prodi' => Auth::user()->id_prodi ?? null,
                'name' => $request->name[$index] ?? null,
                'sks' => $request->sks[$index] ?? null, // Gunakan null jika sks tidak ada
            ]);
        }

        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah, $id)
    {
        $cplMikroskil = MataKuliah::findOrFail($id);
        $cplMikroskil->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil dihapus.');
    }
}
