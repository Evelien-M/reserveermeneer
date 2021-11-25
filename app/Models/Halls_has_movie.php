<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halls_has_movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id','movie_id','movie_start_date','movie_end_date','day'
    ];
}
