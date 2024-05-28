<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class database extends Model
{
    use HasFactory;

    protected $table = 'databases';
    protected $fillable = [
        'nama',
        'nik',
        'domisili',
        'notelp'
    ];
}
