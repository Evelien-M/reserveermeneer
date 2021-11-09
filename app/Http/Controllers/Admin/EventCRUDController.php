<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventCRUDController extends Controller
{
    public function index()
    {
        if (Auth::user()->name == "admin")
        {
            $events = Event::all();
            return view('admin.eventCRUD.index', ['events' => $events]);
        }
        return view('event/event');
    }  
    public function create()
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin.eventCRUD.create');
        }
        return view('event/event');
    }  

    public function store()
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'event_start_date' => 'required|date',
                'event_end_date' => 'required|date',
                'max_amount_tickets' => 'required|integer',
                'max_amount_tickets_per_person' => 'required|integer',
                'price' => 'required'
            ]);

            Event::create([
                'name' => request('name'),
                'image' => request('image'),
                'event_start_date' => request('event_start_date'),
                'event_end_date' => request('event_end_date'),
                'max_amount_tickets' => request('max_amount_tickets'),
                'max_amount_tickets_per_person' => request('max_amount_tickets_per_person'),
                'price' => request('price')
            ]);

            return redirect('/eventcrud');
        }
        return view('event/event');
    }

    public function edit(Event $event)
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin.eventCRUD.edit', ['event' => $event]);
        }
        return view('event/event');
    }
    public function update(Event $event)
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'event_start_date' => 'required|date',
                'event_end_date' => 'required|date',
                'max_amount_tickets' => 'required|integer',
                'max_amount_tickets_per_person' => 'required|integer',
                'price' => 'required'
            ]);

            $event->update([
                'name' => request('name'),
                'image' => request('image'),
                'event_start_date' => request('event_start_date'),
                'event_end_date' => request('event_end_date'),
                'max_amount_tickets' => request('max_amount_tickets'),
                'max_amount_tickets_per_person' => request('max_amount_tickets_per_person'),
                'price' => request('price')
            ]);
            return redirect('/eventcrud');
        }
        return view('event/event');
    }  
    public function delete()
    {
        return view('event/event');
    }  
}
