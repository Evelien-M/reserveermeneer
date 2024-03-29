<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'restaurant_id','user_id','day','time','zipcode','address','city','house_number','country'
    ];
}
