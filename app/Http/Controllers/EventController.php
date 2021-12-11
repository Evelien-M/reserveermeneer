<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class EventController extends Controller
{
 
 
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');
        $events = DB::table('events')
        ->select('id','name','image','event_start_date', 'event_end_date','price','location')
        ->where('event_start_date', '>', $now)
        ->get();
        return view('event/event', ['events' => $events]);
    }  

}
