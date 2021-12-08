<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Restaurant_kitchentype;
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
            ->select('restaurants.id as id', 'restaurants.name as name','restaurants.open_time as open_time','restaurants.close_time as close_time', 'restaurants.amount_seats as amount_seats', 'restaurant_kitchentypes.type as kitchen_type')
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
            
            echo(request('kitchen_type'));

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
}