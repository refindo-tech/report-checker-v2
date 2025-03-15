<?php

namespace App\Http\Controllers;

use App\Models\CplMikroskil;
use App\Models\Kampus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CplMikroskilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mikroskill = CplMikroskil::where('id_kampus', Auth::user()->id_kampus)->with('kampus')->get();
        // dd($mikroskill);
        // $kampus = Kampus::all();
        // dd($mikroskill);
        return view('cpl_mikroskil.index', compact('mikroskill'));
    }


    public function updateInline(Request $request)
    {
        $mikroskill = CplMikroskil::find($request->id);
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
        $mikroskill = CplMikroskil::all();
        return response()->json($mikroskill);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validation = Validator::make($request->all(), [
            'rubrik' => 'required|array',
            'sks' => 'required|array',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        foreach ($request->rubrik as $index => $rubrik) {
            CplMikroskil::create([
                'id_kampus' => Auth::user()->id_kampus,
                'name' => $request->rubrik[$index] ?? null,
                'sks' => $request->sks[$index] ?? null, // Gunakan null jika sks tidak ada
            ]);
        }

        return redirect()->route('mikroskil.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CplMikroskil $cplMikroskil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CplMikroskil $cplMikroskil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CplMikroskil $cplMikroskil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CplMikroskil $cplMikroskil, $id)
    {
        $cplMikroskil = CplMikroskil::findOrFail($id);
        $cplMikroskil->delete();

        return redirect()->route('mikroskil.index')->with('success', 'Data berhasil dihapus.');
    }
}
