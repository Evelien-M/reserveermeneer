<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Event_ticket;
use Illuminate\Http\Request;
use DateTime;
use DateInterval;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class EventItemController extends Controller
{
    public function index($eventId)
    {
        $event = Event::whereId($eventId)->first();
        if($event == null)
        {
            abort(404);
        }
        $ticketsLeft = $this->getAmountOfTicketsLeft($event);
        if ($ticketsLeft < $event->max_amount_tickets_per_person)
        {
            $event->max_amount_tickets_per_person = $ticketsLeft;
        }
        return view('event/eventItem', ['event' => $event, 'dayslist' => $this->getDays($event), 'canReserve' => $this->canMakeReservation($event), 'ticketsLeft' => $ticketsLeft]);
    }  


    public function store()
    {
        $event = Event::whereId(request('event_id'))->first();
        if($event == null)
        {
            abort(404);
        }

        $checks = request()->input('datecheck');
        if ($checks == null || !$this->canMakeReservation($event))
        {
            return redirect()->back();
        }
        request()->validate([
            'zipcode' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'house_number' => 'required|max:255',
            'country' => 'required|max:255',
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount' => 'required|integer|between:1,'.$event->max_amount_tickets_per_person.''
        ]);
        // image hanlding
        $newimagename = null;
        if (request()->hasFile('input_img')) {
            
            $image = request()->file('input_img');
            $newimagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/reservation');
            $image->move($destinationPath, $newimagename);
        }
        // end imagehandling
        $amount = request('amount');

        for($i = 0; $i < $amount; $i++)
        {
            Event_ticket::create([
                'user_id' => Auth::user()->id,
                'events_id' => request('event_id'),
                'image' => $newimagename,
                'days' => implode("|",$checks),
                'zipcode' => request('zipcode'),
                'address' => request('address'),
                'city' => request('city'),
                'house_number' => request('house_number'),
                'country' => request('country')
            ]);
        }
        return redirect('/reservations'); 
    }


    private function getDays($event)
    {
        $date1 = new DateTime($event->event_start_date);
        $date2 = new DateTime($event->event_end_date);
        $daysbetween  = $date2->diff($date1)->format('%a') + 1;
        $dayslist = array();
        array_push($dayslist,$date1->format('d-m-Y'));
        if ($daysbetween > 2)
        {
            for($i = 0; $i < $daysbetween - 2; $i++)
            {
                $bdate = $date1->add(new DateInterval('P1D')); // P1D means a period of 1 day
                array_push($dayslist,$bdate->format('d-m-Y'));
            }
        }
        array_push($dayslist,$date2->format('d-m-Y'));

        return $dayslist;
    }

    private function canMakeReservation($event)
    {
        $amount = request('amount');
        if ($amount > $this->getAmountOfTicketsLeft($event))
        {
            return false;
        }
        return true;
    }

    private function getAmountOfTicketsLeft($event)
    {
        $tickets_sold = Event_ticket::all()->where('events_id', '=', $event->id)->count();
        $tickets_left = $event->max_amount_tickets - $tickets_sold;
        return $tickets_left;
    }
}
