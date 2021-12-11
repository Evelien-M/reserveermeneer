<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Restaurant_kitchentype;
use App\Models\Restaurant_reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestaurantCRUDController extends Controller
{
    public function index()
    {
        if (Auth::user()->name == "admin")
        {
            $restaurants =  DB::table('restaurants')
            ->select('restaurants.id as id', 'restaurants.name as name','restaurants.open_time as open_time','restaurants.close_time as close_time', 'restaurants.amount_seats as amount_seats', 'restaurant_kitchentypes.type as kitchen_type', 'restaurant_kitchentypes.type2 as kitchen_type2')
            ->Join('restaurant_kitchentypes', 'restaurant_kitchentypes.type', '=', 'restaurants.kitchen_type')
            ->get();

            return view('admin.restaurantCRUD.index', ['restaurants' => $restaurants]);
        }
        return redirect()->back();
    }

    public function create()
    {
        if (Auth::user()->name == "admin")
        {
            $options = Restaurant_kitchentype::all();
            return view('admin.restaurantCRUD.create', ['options' => $options]);
        }
        return redirect()->back();
    } 
    
    public function store()
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'open_time' => 'required',
                'close_time' => 'required',
                'amount_seats' => 'required',
                'kitchen_type' => 'required',
            ]);
            
            Restaurant::create([
                'name' => request('name'),
                'open_time' => request('open_time'),
                'close_time' => request('close_time'),
                'amount_seats' => request('amount_seats'),
                'kitchen_type' => request('kitchen_type')
            ]);
             

            return redirect('/restaurantcrud'); 
        }
        return redirect()->back();
    }

    public function edit(Restaurant $restaurant)
    {
        if (Auth::user()->name == "admin")
        {
            $options = Restaurant_kitchentype::all();
            return view('admin.restaurantCRUD.edit', ['restaurant' => $restaurant, 'options' => $options]);
        }
        return redirect()->back();
    }

    public function update(Restaurant $restaurant)
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'open_time' => 'required',
                'close_time' => 'required',
                'amount_seats' => 'required',
                'kitchen_type' => 'required',
            ]);
         
            $restaurant->update([
                'name' => request('name'),
                'open_time' => request('open_time'),
                'close_time' => request('close_time'),
                'amount_seats' => request('amount_seats'),
                'kitchen_type' => request('kitchen_type')
            ]);
            
            return redirect('/restaurantcrud'); 
        }
        return redirect()->back();;
    }  

    public function dashboard(Restaurant $restaurant)
    {
        if (Auth::user()->name == "admin")
        {
            $result = DB::table('Restaurant_reservations')
            ->select('day','time',DB::raw('count(time) as total'))
            ->where('restaurant_id', '=', $restaurant->id)
            ->groupBy('time')
            ->orderByDesc('total')
            ->get();

            return view('admin.restaurantCRUD.dashboard', ['restaurant' => $restaurant, 'results' => $result]);
        }
        return redirect()->back();
    }
}