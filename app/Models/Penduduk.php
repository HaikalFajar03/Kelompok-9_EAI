<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'namalengkap',
        'TTL',
        'gender', // Sesuaikan dengan nama kolom di tabel database
        'agama',
        'alamat',
        'phonenumber',
        'email',
        'No_ktp',
        
        'pendidikan',
        'institusi',
        'jurusan',
        'tahunmasuk',
        'tahunlulus',

        'pengalaman',
        'bidang',
        'tahun',
        'posisi',

    ];

}
