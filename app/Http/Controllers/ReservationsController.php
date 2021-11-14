<?php

namespace App\Http\Controllers;

use App\Models\Event_ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    public function index()
    {
        $event_reservation =  Event_ticket::all()->where('user_id',Auth::user()->id);


        return view('reservations', ['event' => $event_reservation]);
    }
}
