<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewBintang extends Model
{
    use HasFactory;

    protected $table = 'review_ratings';

    protected $fillable = ['comments', 'star_rating'];
}