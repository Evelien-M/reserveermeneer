<?php

namespace App\Http\Controllers;

use App\Models\Restaurant_reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestaurantItemController extends Controller
{
    public function index($restaurant)
    {
        $restaurant =  DB::table('restaurants')
        ->select('restaurants.id as id', 'restaurants.name as name','restaurants.open_time as open_time','restaurants.close_time as close_time', 'restaurants.amount_seats as amount_seats', 'restaurants.location as location', 'restaurant_kitchentypes.type as kitchen_type', 'restaurant_kitchentypes.type2 as kitchen_type2')
        ->Join('restaurant_kitchentypes', 'restaurant_kitchentypes.type', '=', 'restaurants.kitchen_type')
        ->where('id', '=', $restaurant)
        ->first();
        if($restaurant == null)
        {
            abort(404);
        }
        $date = request('day');
        $availableTime = null;
        if ($date != null)
        {
            $availableTime = $this->getAvailableTime($restaurant,$date);
        }
    
        return view('restaurant.restaurantitem', ['restaurant' => $restaurant, 'availableTime' => $availableTime, 'day' => $date]);
    }

    public function store()
    {
        request()->validate([
            'zipcode' => 'required',
            'address' => 'required',
            'city' => 'required',
            'house_number' => 'required',
            'country' => 'required'
        ]);
        $amount = request('amount');

        for($i = 0; $i < $amount; $i++)
        {
            Restaurant_reservation::create([
                'restaurant_id' => request('restaurant_id'),
                'user_id' => Auth::User()->id,
                'day' => request('day'),
                'time' => request('time'),
                'zipcode' => request('zipcode'),
                'address' => request('address'),
                'city' => request('city'),
                'house_number' => request('house_number'),
                'country' => request('country')
            ]);
        }

        return redirect('/reservations');
    }

    private function getAvailableTime($restaurant,$date)
    {
        $time = array();
        $open = strtotime($restaurant->open_time);
        $closed = strtotime($restaurant->close_time);
        $timeslot = $this->time_range($open, $closed);
        array_pop($timeslot);

        foreach ($timeslot as $item) {
            $result = DB::table('Restaurant_reservations')
            ->select('day','time')
            ->where('restaurant_id', '=', $restaurant->id)
            ->where('day', '=', $date)
            ->where('time', '=', $item)
            ->get();
            if (count($result) < 10)
            {
                array_push($time,$item);
            }
        }
        return $time;
    }

    private function time_range( $start, $end, $step = 1800 ) {
        $return = array();
        for( $time = $start; $time <= $end; $time += $step )
            $return[] = date( 'H:i', $time );
        return $return;
    }
}