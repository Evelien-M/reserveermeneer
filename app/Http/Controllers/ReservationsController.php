<?php

namespace App\Http\Controllers;

use App\Models\Event_ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function index()
    {
        $event_reservation = DB::table('event_tickets')
            ->join('events', 'events.id', '=', 'event_tickets.events_id')
            ->where('event_tickets.user_id', '=', Auth::user()->id)
            ->get();

        return view('reservations', ['event' => $event_reservation]);
    }
}
