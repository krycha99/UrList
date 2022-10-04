<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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

        return redirect('/');
    }
   
}
