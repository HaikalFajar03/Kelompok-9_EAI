<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPekerjaan;
use Illuminate\Support\Facades\Log;


class tambahkategoriController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;

        $kategoriPekerjaan = kategoripekerjaan::where('nama_kategori', 'LIKE')
        ->orwhere('deskripsi', 'LIKE');
        return view('kategoripekerjaan');
    }

    public function create()
    {
        return view('tambahkategori');

    }

    public function store(Request $request)
    {
        // dd($request->all());
        // kategoripekerjaan::create($request->all());
        $tambah = new kategoripekerjaan;
        $tambah->nama_kategori = $request->nama_kategori;
        $tambah->deskripsi = $request->deskripsi;
        $tambah->save();
        // Log::info('Store Request Data: ' . json_encode($request->all()));

        // Validasi input jika diperlukan
        // $request->validate([
        //     'nama_kategori' => 'required|string',
        //     'deskripsi' => 'required|string',
        // ]);

        // // Log::info('Validated Data: ' . json_encode($request->all()));

        // // Simpan data ke dalam database
        // Database::create([
        //             'nama_kategori' => $request->input('nama_kategori'),
        //             'deskripsi' => $request->input('deskripsi'),
        // ]);

        // Log::info('Data Created');

        return redirect()->route('kategoripekerjaan')
            ->with('success', 'Data baru berhasil ditambahkan');
    }

}
