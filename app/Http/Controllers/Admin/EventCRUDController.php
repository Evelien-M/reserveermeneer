<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File; 

class EventCRUDController extends Controller
{
    public function index()
    {
        if (Auth::user()->name == "admin")
        {
            $events = Event::all();
            return view('admin.eventCRUD.index', ['events' => $events]);
        }
        return redirect()->back();
    }  
    public function create()
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin.eventCRUD.create');
        }
        return redirect()->back();
    }  

    public function store()
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'content' => 'required',
                'content2' => 'required',
                'location' => 'required',
                'event_start_date' => 'required|date',
                'event_end_date' => 'required|date',
                'max_amount_tickets' => 'required|integer',
                'max_amount_tickets_per_person' => 'required|integer',
                'price' => 'required',
                'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // image hanlding
            $newimagename = null;
            if (request()->hasFile('input_img')) {
                
                $image = request()->file('input_img');
                $newimagename = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/events');
                $image->move($destinationPath, $newimagename);
            }
            // end imagehandling
            
            Event::create([
                'name' => request('name'),
                'content' => request('content'),
                'content2' => request('content2'),
                'image' => $newimagename,
                'event_start_date' => request('event_start_date'),
                'event_end_date' => request('event_end_date'),
                'max_amount_tickets' => request('max_amount_tickets'),
                'max_amount_tickets_per_person' => request('max_amount_tickets_per_person'),
                'location' => request('location'),
                'price' => request('price')
            ]);
            

            return redirect('/eventcrud'); 
        }
        return redirect()->back();
    }

    public function edit(Event $event)
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin.eventCRUD.edit', ['event' => $event]);
        }
        return redirect()->back();
    }
    public function update(Event $event)
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'content' => 'required',
                'content2' => 'required',
                'location' => 'required',
                'event_start_date' => 'required|date',
                'event_end_date' => 'required|date',
                'max_amount_tickets' => 'required|integer',
                'max_amount_tickets_per_person' => 'required|integer',
                'price' => 'required',
                'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

                    
            // image upload file handler
            if (request()->hasFile('input_img')) {

                // delete previous file
                if ($event->image != null)
                {
                    $file_path = public_path() . '/images/events/' . $event->image;
                    File::delete($file_path);
                }

                $image = request()->file('input_img');
                $newimagename = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/events');
                $image->move($destinationPath, $newimagename);

                $event->update([
                    'name' => request('name'),
                    'content' => request('content'),
                    'content2' => request('content2'),
                    'image' => $newimagename,
                    'event_start_date' => request('event_start_date'),
                    'event_end_date' => request('event_end_date'),
                    'max_amount_tickets' => request('max_amount_tickets'),
                    'max_amount_tickets_per_person' => request('max_amount_tickets_per_person'),
                    'location' => request('location'),
                    'price' => request('price')
                ]);
            }
            else
            {
                $event->update([
                    'name' => request('name'),
                    'content' => request('content'),
                    'content2' => request('content2'),
                    'event_start_date' => request('event_start_date'),
                    'event_end_date' => request('event_end_date'),
                    'max_amount_tickets' => request('max_amount_tickets'),
                    'max_amount_tickets_per_person' => request('max_amount_tickets_per_person'),
                    'location' => request('location'),
                    'price' => request('price')
                ]);
            }
            // end upload file handler

            
            return redirect('/eventcrud'); 
        }
        return redirect()->back();;
    }  
    public function delete(Event $event)
    {
        if (Auth::user()->name == "admin")
        {
            Event::where('id', $event->id)->delete();
        } 
        return redirect()->back();;
    }
    
    


}
