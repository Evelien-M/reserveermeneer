<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventItemController extends Controller
{
    public function index($eventId)
    {
        $event = Event::whereId($eventId)->first();
        if($event == null)
        {
            abort(404);
        }
        return view('event/eventItem', ['event' => $event]);
    }  
}
