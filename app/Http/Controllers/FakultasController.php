<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Kampus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::with('kampus')->get();
        $fakultasRole = Fakultas::where('id_kampus', auth()->user()->id_kampus)->with('kampus')->get();
        return view('fakultas.index', compact('fakultas', 'fakultasRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kampus = Kampus::all();
        return view('fakultas.create', compact('kampus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|unique:fakultas,name',
            'kampus' => 'required',
        ]);
        
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $fakultas = Fakultas::create([
            'name' => ucwords($request->name),
            'id_kampus' => $request->kampus,
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas, $id)
    {
        $fakultas = Fakultas::find($id)->with('kampus')->first();
        return view('fakultas.show', compact('fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas, $id)
    {
        $fakultas = Fakultas::with('kampus')->findorFail($id);
        // dd($fakultas, $id);
        $kampus = Kampus::all();
        return view('fakultas.edit', compact('fakultas', 'kampus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas, $id)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(), [
            'name' => 'required|string' . $fakultas->id,
            'kampus' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $fakultas = Fakultas::find($id);

        $fakultas->update([
            'name' => ucwords($request->name),
            'id_kampus' => $request->kampus,
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas, $id)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus');
    }
}
