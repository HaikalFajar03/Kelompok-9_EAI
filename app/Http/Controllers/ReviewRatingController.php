<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewBintang;
use Illuminate\Support\Facades\Auth; // Import class Auth untuk mengakses informasi pengguna yang sedang login
use Illuminate\Support\Facades\DB;

class ReviewRatingController extends Controller
{
    // Menampilkan isi database getin table review_ratings
    public function index()
    {
        // Dapatkan tipe pengguna saat ini
        $userType = Auth::user()->user_type;

        // Dapatkan semua review ratings
        $reviewRatings = ReviewBintang::all(['id', 'comments', 'star_rating']);

        // Kirim data ke tampilan
        return view('rating', compact('reviewRatings', 'userType'));
    }

    // Menghapus isi database getin table review_ratings
    public function destroy($id)
    {
        // Hanya izinkan penghapusan jika pengguna adalah Super Admin
        if (Auth::user()->user_type === 'Super Admin') {
            DB::table('review_ratings')->where('id', $id)->delete();
            return redirect('/feedback')->with('success', 'Review Rating deleted successfully');
        } else {
            // Redirect dengan pesan kesalahan jika pengguna bukan Super Admin
            return redirect('/feedback')->with('error', 'You are not authorized to delete reviews.');
        }
    }

    public function showRatings()
    {
        // Mendapatkan tipe pengguna saat iniii
        $userType = Auth::user()->user_type;
    
        // Mendapatkan semua data review dan rating
        $reviewRatings = ReviewBintang::all();
    
        // Kirim data ke view
        return view('rating', compact('reviewRatings', 'userType'));
    }
}
