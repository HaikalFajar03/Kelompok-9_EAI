<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'comments',
        'star_rating',
    ];

    // Jika nama tabel tidak sesuai dengan konvensi Laravel, Anda dapat menentukannya di sini
    protected $table = 'review_ratings';
}
