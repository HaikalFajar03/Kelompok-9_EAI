<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUjiKemampuan extends Model
{
    use HasFactory;

    protected $table = 'test_uji_kemampuan';

    protected $fillable = [
        'nama_test',
        'tanggal_pelaksanaan',
        'tempat_pelaksanaan',
        'anggota_test',
    ];
}
