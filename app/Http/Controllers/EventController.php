<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
 
 
    public function index()
    {
        $showEdit = false;
        if (Auth::user() != null)
        {
            if (Auth::user()->name == "admin")
            {
                $showEdit = true;
            }
        }
        $events = Event::all();
        return view('event/event', ['events' => $events, 'showEdit' => $showEdit]);
    }  

}
