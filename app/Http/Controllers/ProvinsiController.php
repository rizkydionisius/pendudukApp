<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::with('kabupaten')->get();
        return view('provinsi.index', compact('provinsis'));
    }

    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_provinsi' => 'required|string|max:255',
        ]);

        Provinsi::create($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan');
    }

    public function edit(Provinsi $provinsi)
    {
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate([
            'nama_provinsi' => 'required|string|max:255',
        ]);

        $provinsi->update($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diupdate');
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus');
    }
}
