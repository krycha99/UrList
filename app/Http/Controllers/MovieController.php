<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
     public function index()
    {
        return view('index', [
            'movies' => Movie::latest()->filter
            (request(['category', 'search']))->get()
        ]);
    }
    
    public function create()
    {
        return view('movies/create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('movies', 'title')],
            'type' => 'required',
            'year'=> 'required',
            'episodes' => 'required',
            'categories' => 'required',
            'description' => 'required'
        ]);
        
        if($request->hasFile('poster')) {
            $formFields['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Movie::create($formFields);

        return redirect('/')->with('message', 'Movie/Series added successfully');
    }
   
}
