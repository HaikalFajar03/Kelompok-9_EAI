<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi_pekerjaan';

    protected $fillable = [
        'nama_penduduk',
        'hasil_test_uji',
        'nama_pekerjaan',
        'lokasi_pekerjaan',
        'deskripsi_pekerjaan',
    ];
}
