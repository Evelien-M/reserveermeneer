<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use Illuminate\Support\Facades\File; 

class MovieCRUDController extends Controller
{
    public function index()
    {
        if (Auth::user()->name == "admin")
        {
            $movies = Movie::all();
            return view('admin.movieCRUD.index', ['movies' => $movies]);
        }
        return redirect()->back();
    }

    public function create()
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin.movieCRUD.create');
        }
        return redirect()->back();
    }  

    public function store()
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'content' => 'required',
                'content2' => 'required',
                'duration' => 'required',
                'price' => 'required',
            ]);

            // image hanlding
            $newimagename = null;
            if (request()->hasFile('input_img')) {
                
                $image = request()->file('input_img');
                $newimagename = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/movies');
                $image->move($destinationPath, $newimagename);
            }
            // end imagehandling
            
            Movie::create([
                'name' => request('name'),
                'image' => $newimagename,
                'content' => request('content'),
                'content2' => request('content2'),
                'duration' => request('duration'),
                'price' => request('price')
            ]);
             

            return redirect('/moviecrud'); 
        }
        return redirect()->back();
    }

    public function edit(Movie $movie)
    {
        if (Auth::user()->name == "admin")
        {
            return view('admin.movieCRUD.edit', ['movie' => $movie]);
        }
        return redirect()->back();
    }
    public function update(Movie $movie)
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'name' => 'required',
                'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'content' => 'required',
                'content2' => 'required',
                'duration' => 'required',
                'price' => 'required',
            ]);

                    
            // image upload file handler
            if (request()->hasFile('input_img')) {

                // delete previous file
                if ($movie->image != null)
                {
                    $file_path = public_path() . '/images/movies/' . $movie->image;
                    File::delete($file_path);
                }

                $image = request()->file('input_img');
                $newimagename = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/movies');
                $image->move($destinationPath, $newimagename);

                $movie->update([
                    'name' => request('name'),
                    'image' => $newimagename,
                    'content' => request('content'),
                    'content2' => request('content2'),
                    'duration' => request('duration'),
                    'price' => request('price')
                ]);
            }
            else
            {
                $movie->update([
                    'name' => request('name'),
                    'content' => request('content'),
                    'content2' => request('content2'),
                    'duration' => request('duration'),
                    'price' => request('price')
                ]);
            }
            // end upload file handler

            
            return redirect('/moviecrud'); 
        }
        return redirect()->back();;
    }  
}
