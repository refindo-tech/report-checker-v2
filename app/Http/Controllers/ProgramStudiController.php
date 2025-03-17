<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ProgramStudi = ProgramStudi::with(['fakultas.kampus'])->get();
        // dd($ProgramStudi);
        return view('program_studi.index', compact('ProgramStudi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::with('kampus')->get();
        $fakultasRole = Fakultas::where('id_kampus', auth()->user()->id_kampus)->with('kampus')->get();
        return view('program_studi.create', compact('fakultas', 'fakultasRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'fakultas' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        ProgramStudi::create([
            'name' => ucwords($request->name),
            'id_fakultas' => $request->fakultas
        ]);

        return redirect()->route('programstudi.index')->with('success', 'Program Studi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ProgramStudi = ProgramStudi::find($id);
        return view('program_studi.show', compact('ProgramStudi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fakultas = Fakultas::with('kampus')->get();
        $fakultasRole = Fakultas::where('id_kampus', auth()->user()->id_kampus)->with('kampus')->get();
        $ProgramStudi = ProgramStudi::with('fakultas.kampus')->findOrFail($id); // Perbaikan relasi

        return view('program_studi.edit', compact('ProgramStudi', 'fakultas', 'fakultasRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'fakultas' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        // Temukan program studi berdasarkan ID
        $programStudi = ProgramStudi::findOrFail($id);

        // Update data
        $programStudi->update([
            'name' => ucwords($request->name),
            'id_fakultas' => $request->fakultas
        ]);

        return redirect()->route('programstudi.index')->with('success', 'Program Studi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ProgramStudi = ProgramStudi::find($id);
        $ProgramStudi->delete();
        return redirect()->route('programstudi.index')->with('success', 'Program Studi Berhasil Dihapus');
    }
}
