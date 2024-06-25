<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Provinsi;

class KabupatenController extends Controller
{
    public function index(Request $request)
{
    $provinsis = Provinsi::all();
    $kabupatens = Kabupaten::with('provinsi');

    if ($request->has('provinsi_ids')) {
        $kabupatens = $kabupatens->whereIn('provinsi_id', $request->provinsi_ids);
    }

    if ($request->has('search')) {
        $kabupatens = $kabupatens->where('nama_kabupaten', 'like', '%' . $request->search . '%');
    }

    $kabupatens = $kabupatens->get();

    return view('kabupaten.index', compact('provinsis', 'kabupatens'));
}


    public function create()
    {
        $provinsis = Provinsi::all();
        return view('kabupaten.create', compact('provinsis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|string|max:255',
            'provinsi_id' => 'required|exists:provinsi,id',
            'jumlah_penduduk' => 'required|integer',
        ]);

        Kabupaten::create($request->all());
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil ditambahkan');
    }

    public function edit(Kabupaten $kabupaten)
    {
        $provinsis = Provinsi::all();
        return view('kabupaten.edit', compact('kabupaten', 'provinsis'));
    }

    public function update(Request $request, Kabupaten $kabupaten)
    {
        $request->validate([
            'nama_kabupaten' => 'required|string|max:255',
            'provinsi_id' => 'required|exists:provinsi,id',
            'jumlah_penduduk' => 'required|integer',
        ]);

        $kabupaten->update($request->all());
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil diupdate');
    }

    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil dihapus');
    }
}
