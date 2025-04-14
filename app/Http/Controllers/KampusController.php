<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kampus = Kampus::where('id', Auth::user()->id_kampus)->get();

        $kampusAdmin = null;

        if (Auth::user()->id_kampus) {
            $kampusAdmin = Kampus::find(Auth::user()->id_kampus);
        }

        // dd($kampuses);
        return view('kampus.index', compact('kampus', 'kampusAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kampus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:kampuses',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Kampus::create([
            'name' => $request->name,
        ]);
        return redirect()->route('kampus.index')->with('success', 'Nama kampus berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kampus $kampus, $id)
    {
        $kampus = Kampus::find($id);
        return view('kampus.show', compact('kampus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kampus $kampus, $id)
    {
        $kampus = Kampus::find($id);
        return view('kampus.edit', compact('kampus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kampus $kampus, $id)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:3',
                'address' => 'required|string|min:3',
                'phone' => 'required|string|min:3',
                'fax' => 'required|string|min:3',
                'website' => 'required|string|min:3',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            // ambil nama file gambar lama dari database
            $kampus = Kampus::where('id', $id)->first();

            $old_image = $kampus->image;

            // dd($old_image);

            // hapus file gambar lama dari folder slider
            Storage::delete('public/kampus/' . $old_image);

            // ubah nama file
            $imageName = time() . '.' . $request->image->extension();

            // simpan file ke folder public/product
            Storage::putFileAs('public/kampus', $request->image, $imageName);

            // update data product
            Kampus::where('id', $id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'website' => $request->website,
                'image' => $imageName,
            ]);
        } else {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:3',
                'address' => 'required|string|min:3',
                'phone' => 'required|string|min:3',
                'fax' => 'required|string|min:3',
                'website' => 'required|string|min:3',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            // update data product tanpa menyertakan file gambar
            Kampus::where('id', $id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'website' => $request->website,
            ]);
        }
        return redirect()->route('kampus.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kampus $kampus, $id)
    {
        $kampus = Kampus::findorFail($id);
        $kampus->delete();

        return redirect()->route('kampus.index')->with('success', 'Nama kampus berhasil dihapus.');
    }
}
