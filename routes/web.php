<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;

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

Route::get('/movies/{id}', function($id){
    return view('movie',[
    'movie' => Movie::find($id)
    ]);
});

Route::get('/user/urList', [UserController::class, 'urList'])->middleware('auth');
