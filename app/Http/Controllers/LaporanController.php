<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanProvinsi()
    {
        $provinsis = Provinsi::with('kabupaten')->get();
        return view('laporan.provinsi', compact('provinsis'));
    }

    public function laporanKabupaten(Request $request)
    {
        $provinsiId = $request->input('provinsi_id');
        $kabupatens = Kabupaten::when($provinsiId, function ($query, $provinsiId) {
            return $query->where('provinsi_id', $provinsiId);
        })->with('provinsi')->get();

        $provinsis = Provinsi::all();
        return view('laporan.kabupaten', compact('kabupatens', 'provinsis', 'provinsiId'));
    }
}
