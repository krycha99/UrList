<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    
    public function Add(Movie $movie, User $user)
    {
        echo 'dodano do listy: ';
        //echo Auth::user()->listing()->findOrFail($movie->id, ['movie_id'])->pivot->episodesWatched;
        // $price = Auth::user()->listing()->where('movie_id', $movie->id)->first()->pivot->episodesWatched;
        // echo $price;
        echo 'reszta : ';
        return Auth::user()->listing()->attach($movie, ['lStatus' => "Plan to watch",'episodesWatched' => 0]);
        //return Auth::user()->listing()->toggle($movie, ['episodesWatched' => 22]);
    }

    public function Drop(Movie $movie, User $user)
    {
        echo 'usunieto do listy: ';
        //echo Auth::user()->listing()->findOrFail($movie->id, ['movie_id'])->pivot->episodesWatched;
        // $price = Auth::user()->listing()->where('movie_id', $movie->id)->firstOrFail()->pivot->lstatus;
        // echo $price;
        echo Auth::user()->listing()->where('movie_id', $movie->id)->firstOrFail()->pivot->lStatus;
        echo 'reszta : ';
        
        //return Auth::user()->listing()->attach($movie, ['episodesWatched' => 22]);
        return Auth::user()->listing()->detach($movie);
    }

    public function WatchingUpdate(Movie $movie, User $user)
    {
        echo 'test updejtu ';
        //$model->problems()->updateExistingPivot($problemId, ['price' => $newPrice]);
        return Auth::user()->listing()->updateExistingPivot($movie, ['lStatus' => 'Watching']);
    }

    public function PlanUpdate(Movie $movie, User $user)
    {
        echo 'test updejtu ';
        //$model->problems()->updateExistingPivot($problemId, ['price' => $newPrice]);
        return Auth::user()->listing()->updateExistingPivot($movie, ['lStatus' => 'Plan to watch']);
    }

    public function CompletedUpdate(Movie $movie, User $user)
    {
        echo 'test updejtu ';
        //$model->problems()->updateExistingPivot($problemId, ['price' => $newPrice]);
        return Auth::user()->listing()->updateExistingPivot($movie, ['lStatus' => 'Completed', 'episodesWatched' => $movie->episodes]);
    }

    public function EpisodesUpdate(Movie $movie, User $user)
    {
        echo 'test updejtu ';
        $ep = Auth::user()->listing()->where('movie_id', $movie->id)->firstOrFail()->pivot->episodesWatched;
        //$model->problems()->updateExistingPivot($problemId, ['price' => $newPrice]);
        return Auth::user()->listing()->updateExistingPivot($movie, ['episodesWatched' => ($ep + 1) ]);
    }

    public function EpisodesUpdateDim(Movie $movie, User $user)
    {
        echo 'test odejmowania ';
        $ep = Auth::user()->listing()->where('movie_id', $movie->id)->firstOrFail()->pivot->episodesWatched;
        //$model->problems()->updateExistingPivot($problemId, ['price' => $newPrice]);
        return Auth::user()->listing()->updateExistingPivot($movie, ['episodesWatched' => ($ep - 1) ]);
    }
  
}
