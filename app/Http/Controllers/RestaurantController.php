<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Restaurant_kitchentype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $options = Restaurant_kitchentype::all();

        $filter_location = request("location");
        $filter_kitchentype = request("kitchentype");

        $sort = array();
        $sort[0] = "id";
        $sort[1] = "ASC";
        if (request("order") != null)
        {
            $sort = explode("-",request("order"));
        }

        if($filter_location != null)
        {
            if($filter_kitchentype == "all")
            {
                $restaurants = DB::table('restaurants')
                ->where('location', '=', $filter_location)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
            else
            {
                $restaurants = DB::table('restaurants')
                ->where('location', '=', $filter_location)
                ->where('kitchen_type', '=', $filter_kitchentype)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
        }
        else
        {
            if($filter_kitchentype == "all" || $filter_kitchentype == null)
            {
                $restaurants = DB::table('restaurants')
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
            else
            {
                $restaurants = DB::table('restaurants')
                ->where('kitchen_type', '=', $filter_kitchentype)
                ->orderBy($sort[0], $sort[1])
                ->get();
            }
        }
        return view('restaurant/restaurant', ['restaurants' => $restaurants, 'options' => $options, 'filter_location' => $filter_location, 'filter_kitchentype' => $filter_kitchentype]);
    }
}
