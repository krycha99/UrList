<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    
    public function Add(Movie $movie)
    {
       return Auth::user()->listing()->attach($movie, ['lStatus' => "Plan to watch",'episodesWatched' => 0]);
    }

    public function Drop(Movie $movie)
    {
        return Auth::user()->listing()->detach($movie);
    }

    public function WatchingUpdate(Movie $movie)
    {
        return Auth::user()->listing()->updateExistingPivot($movie, ['lStatus' => 'Watching']);
    }

    public function PlanUpdate(Movie $movie)
    {
        return Auth::user()->listing()->updateExistingPivot($movie, ['lStatus' => 'Plan to watch']);
    }

    public function CompletedUpdate(Movie $movie)
    {
        return Auth::user()->listing()->updateExistingPivot($movie, ['lStatus' => 'Completed', 'episodesWatched' => $movie->episodes]);
    }

    public function EpisodesUpdate(Movie $movie)
    {
        $ep = Auth::user()->listing()->where('movie_id', $movie->id)->firstOrFail()->pivot->episodesWatched;
         return Auth::user()->listing()->updateExistingPivot($movie, ['episodesWatched' => ($ep + 1) ]);
    }

    public function EpisodesUpdateDim(Movie $movie)
    {
        $ep = Auth::user()->listing()->where('movie_id', $movie->id)->firstOrFail()->pivot->episodesWatched;
        return Auth::user()->listing()->updateExistingPivot($movie, ['episodesWatched' => ($ep - 1) ]);
    }
  
}
