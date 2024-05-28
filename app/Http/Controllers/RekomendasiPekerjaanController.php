<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomendasiPekerjaan;

class RekomendasiPekerjaanController extends Controller

{
    public function index()
    {
        $rekomendasipekerjaan = RekomendasiPekerjaan::all();
        return view('rekomendasipekerjaan.index', compact('rekomendasipekerjaan'));
    }

    public function create()
    {
        return view('rekomendasipekerjaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penduduk' => 'required|string|max:255',
            'hasil_test_uji' => 'required|string|max:255',
            'nama_pekerjaan' => 'required|string|max:255',
            'lokasi_pekerjaan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
        ]);

        RekomendasiPekerjaan::create($request->all());

        return redirect()->route('rekomendasipekerjaan.index')->with('success', 'Data rekomendasi pekerjaan berhasil disimpan.');
    }

    public function show($id)
    {
        $rekomendasiPekerjaan = RekomendasiPekerjaan::findOrFail($id);
        return view('rekomendasipekerjaan.show', compact('rekomendasiPekerjaan'));
    }

    public function edit($id)
    {
        $rekomendasiPekerjaan = RekomendasiPekerjaan::findOrFail($id);
        return view('rekomendasipekerjaan.edit', compact('rekomendasiPekerjaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penduduk' => 'required|string|max:255',
            'hasil_test_uji' => 'required|string|max:255',
            'nama_pekerjaan' => 'required|string|max:255',
            'lokasi_pekerjaan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
        ]);

        $rekomendasiPekerjaan = RekomendasiPekerjaan::findOrFail($id);
        $rekomendasiPekerjaan->update($request->all());

        return redirect()->route('rekomendasipekerjaan.index')->with('success', 'Data rekomendasi pekerjaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rekomendasiPekerjaan = RekomendasiPekerjaan::findOrFail($id);
        $rekomendasiPekerjaan->delete();

        return redirect()->route('rekomendasipekerjaan.index')->with('success', 'Data rekomendasi pekerjaan berhasil dihapus.');
    }
}
