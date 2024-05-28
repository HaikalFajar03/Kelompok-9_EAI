<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPekerjaan;
use Illuminate\Support\Facades\Log;

class KategoriPekerjaanController extends Controller
{
    // Menampilkan semua kategori pekerjaan
    public function index(Request $request)
    {
        // $kategoriPekerjaan = kategoripekerjaan::where('nama_kategori', 'LIKE')
        // ->orwhere('deskripsi', 'LIKE');
        // return view('kategoripekerjaan'); // Ubah view menjadi 'kategoripekerjaan.index'
        $tambah = kategoripekerjaan::all();
        return view('kategoripekerjaan', ['kategoriList' => $tambah]);
    }

    // Menampilkan form untuk menambahkan kategori pekerjaan baru
    public function create()
    {
        return view('tambahkategori'); // Ubah view menjadi 'kategoripekerjaan.create'
    }

    // Menyimpan kategori pekerjaan baru ke dalam database
    public function store(Request $request)
    {

        Log::info('Store Request Data: ' . json_encode($request->all()));

        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);
        $cleanedDeskripsi = strip_tags($request->input('deskripsi'));
        if (empty($cleanedDeskripsi)) {
            return back()->withErrors(['deskripsi' => 'Deskripsi tidak boleh kosong setelah pembersihan HTML.']);
        }
        KategoriPekerjaan::create([
            'nama_kategori' => $request->input('nama_kategori'),
            'deskripsi' => $cleanedDeskripsi,
        ]);

        

        return redirect()-> route('kategoripekerjaan')
            ->with('success', 'Data added successfully.');

    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data = KategoriPekerjaan::findOrFail($id);
        return view('produksi-manufaktur', [
            'datadetail'=> $data
        ]);
    }
    
    // Menghapus kategori pekerjaan
    public function destroy($id)
    {
        //DELETE
        $data = KategoriPekerjaan::findOrFail($id);
        $data->delete();
        return redirect()-> route('kategoripekerjaan')
        ->with('success', 'Data deleted successfully.');

    }

    public function updateDeskripsi(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'deskripsi' => 'required|string'
        ]);

        // Cari kategori berdasarkan ID
        $kategori = KategoriPekerjaan::findOrFail($id);
        $cleanedDeskripsi = strip_tags($request->input('deskripsi'));
        // Update deskripsi
        $kategori->deskripsi = $cleanedDeskripsi;
        $kategori->save();
        

        // Kembalikan respons
        return back()->with('Success', 'berhasil ngupdate data');
    }
}
