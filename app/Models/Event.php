<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'name','image','content','content2','event_start_date','event_end_date','max_amount_tickets','max_amount_tickets_per_person','location','price'
    ];
}
