<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventCRUDController extends Controller
{
    public function index()
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin/eventCRUD/eventRead');
        }
        return view('event/event');
    }  
    public function create()
    {
        return view('event/event');
    }  
    public function update()
    {
        return view('event/event');
    }  
    public function delete()
    {
        return view('event/event');
    }  
}
