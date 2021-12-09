<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantItemController extends Controller
{
    public function index($restaurant)
    {
        $restaurant =  DB::table('restaurants')
        ->select('restaurants.id as id', 'restaurants.name as name','restaurants.open_time as open_time','restaurants.close_time as close_time', 'restaurants.amount_seats as amount_seats', 'restaurant_kitchentypes.type as kitchen_type', 'restaurant_kitchentypes.type2 as kitchen_type2')
        ->Join('restaurant_kitchentypes', 'restaurant_kitchentypes.type', '=', 'restaurants.kitchen_type')
        ->where('id', '=', $restaurant)
        ->first();
        if($restaurant == null)
        {
            abort(404);
        }
        $availableTime = $this->getAvailableTime($restaurant);
        return view('restaurant.restaurantitem', ['restaurant' => $restaurant, 'availableTime' => $availableTime]);
    }


    private function getAvailableTime($restaurant)
    {
        $time = array();
        $open = strtotime($restaurant->open_time);
        $closed = strtotime($restaurant->close_time);
        $timeslot = $this->time_range($open, $closed);
        array_pop($timeslot);
        return $timeslot;
    }

    private function time_range( $start, $end, $step = 1800 ) {
        $return = array();
        for( $time = $start; $time <= $end; $time += $step )
            $return[] = date( 'H:i', $time );
        return $return;
    }
}