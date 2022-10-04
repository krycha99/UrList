<?php

use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use Psy\Readline\Hoa\Console;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [MovieController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/movies/create', [MovieController::class, 'create'])->middleware('auth');

Route::post('/movies', [MovieController::class, 'store']);

Route::get('/movies/{id}', function($id, User $user, Movie $movie){
    if(Auth::user() != null && Auth::user()->listing->contains($id)){
        $liststatus = true;
        $lstatus=Auth::user()->listing->find($id)->pivot->lStatus;
        $ewatch = Auth::user()->listing->find($id)->pivot->episodesWatched;
    } else
    {
        $liststatus = false;
        $lstatus='empty';
        $ewatch = 0;
    }
    return view('movies/movie',[
    'movie' => Movie::find($id)
    ], compact('liststatus', 'lstatus', 'ewatch'));
});

Route::get('/user/urList', [UserController::class, 'urList'])->middleware('auth');

Route::get('/user/urList/watching', [UserController::class, 'watching'])->middleware('auth');

Route::get('/user/urList/plantowatch', [UserController::class, 'plantowatch'])->middleware('auth');

Route::get('/user/urList/completed', [UserController::class, 'completed'])->middleware('auth');

Route::get('/user/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

Route::put('/user/{user}', [UserController::class, 'update'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('list/{movie}', [ListController::class, 'Add']);

Route::post('list/{movie}/drop', [ListController::class, 'Drop']);

Route::post('list/{movie}/watching', [ListController::class, 'WatchingUpdate']);

Route::post('list/{movie}/plan', [ListController::class, 'PlanUpdate']);

Route::post('list/{movie}/completed', [ListController::class, 'CompletedUpdate']);

Route::post('list/{movie}/ep', [ListController::class, 'EpisodesUpdate']);

Route::post('list/{movie}/epDim', [ListController::class, 'EpisodesUpdateDim']);


