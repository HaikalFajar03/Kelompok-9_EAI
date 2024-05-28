<?php
namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function cariPendudukPelatihanX(Request $request)
    {
        // Mencari penduduk yang telah menyelesaikan pelatihan X
        $pendudukPelatihanX = Penduduk::where('pelatihan', 'X')->get();

        return view('hasil_pencarian', compact('pendudukPelatihanX'));
    }
}
namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function cariPenduduk(Request $request)
    {
        // Validasi request
        $request->validate([
            'pekerjaan' => 'required|string',
            'wilayah' => 'required|string',
        ]);

        // Ambil data dari request
        $pekerjaan = $request->pekerjaan;
        $wilayah = $request->wilayah;

        // Hitung jumlah penduduk berdasarkan kategori pekerjaan dan wilayah
        $jumlahPenduduk = Penduduk::where('pekerjaan', $pekerjaan)
                                  ->where('wilayah', $wilayah)
                                  ->count();

        // Tampilkan hasil pencarian
        return view('hasil_pencarian', compact('jumlahPenduduk', 'pekerjaan', 'wilayah'));
    }
}
