<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','events_id','image','days','zipcode','address','city','house_number','country'
    ];
}
