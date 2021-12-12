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

        $filter_location = request('location');
        $filter_date_start = request('date_start');
        $filter_date_end = request('date_end');
        $sort = array();
        $sort[0] = "id";
        $sort[1] = "ASC";

        if (request("order") != null)
        {
            $sort = explode("-",request("order"));
        }

        if($filter_location != null)
        {
            if ($filter_date_start != null && $filter_date_end != null)
            {
                $events = DB::table('events')
                ->select('id','name','image','event_start_date', 'event_end_date','price','location')
                ->where('event_start_date', '>', $filter_date_start)
                ->where('event_start_date', '<', $filter_date_end)
                ->where('location', '=', $filter_location)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
            else
            {
                $events = DB::table('events')
                ->select('id','name','image','event_start_date', 'event_end_date','price','location')
                ->where('event_start_date', '>', $now)
                ->where('location', '=', $filter_location)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
        }
        else
        {
            if ($filter_date_start != null && $filter_date_end != null)
            {
                $events = DB::table('events')
                ->select('id','name','image','event_start_date', 'event_end_date','price','location')
                ->where('event_start_date', '>', $filter_date_start)
                ->where('event_start_date', '<', $filter_date_end)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
            else
            {
                $events = DB::table('events')
                ->select('id','name','image','event_start_date', 'event_end_date','price','location')
                ->where('event_start_date', '>', $now)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
        }
        $sort_order = $sort[0] . "-" . $sort[1];
        return view('event/event', ['events' => $events, 'filter_location' => $filter_location, 'filter_date_start' => $filter_date_start, 'filter_date_end' => $filter_date_end, 'sort_order' => $sort_order]);
    }  

}
