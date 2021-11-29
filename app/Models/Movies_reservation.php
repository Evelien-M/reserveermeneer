<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies_reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'halls_has_movies_id','user_id','x','y','locked','zipcode','address','city','house_number','country'
    ];
}
