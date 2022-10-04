<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function urList()
    {
        return view('user/urList', [
            'movies' => Auth::user()->listing()->where('user_id', Auth::user()->id)->get(),
            //dd(Auth::user()->listing()->where('user_id', Auth::user()->id)->get())
        ]);
    }

    public function watching()
    {
        return view('user/urList', [
            'movies' => Auth::user()->listing()->where('lstatus', 'Watching')->get(),
            //dd(Auth::user()->listing()->where('user_id', Auth::user()->id)->get())
        ]);
    }

    public function plantowatch()
    {
        return view('user/urList', [
            'movies' => Auth::user()->listing()->where('lstatus', 'Plan to watch')->get(),
            //dd(Auth::user()->listing()->where('user_id', Auth::user()->id)->get())
        ]);
    }

    public function completed()
    {
        return view('user/urList', [
            'movies' => Auth::user()->listing()->where('lstatus', 'Completed')->get(),
            //dd(Auth::user()->listing()->where('user_id', Auth::user()->id)->get())
        ]);
    }

    public function edit(User $user)
    {
        return view('user/editUser', ['User'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'username' => 'required'
        ]);

        if($request->hasFile('profileImg'))
        {
            $formFields['profileImg'] = $request->file('profileImg')->store('avatars', 'public');
        }

        $user->username = $formFields['username'];
        $user->profileImg = $formFields['profileImg'];
        $user->save();

        return redirect('/')->with('message', 'Profile edited successfully!');
    }
}
