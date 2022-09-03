@extends('layouts.app')

@section('content')
    <div class="border border-gray-200 rounded p-6" style="width:1000px; margin:0 auto;">
        <div class="d-flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src={{ url("images/movie-icon.png") }}
                alt=""
            />
            <div>
                <h1 style="font-size: 1.5em;"><b>{{ $movie->title }}</b></h1>
                <p style="padding-bottom: 0.7em;"><b>{{ $movie->type }}</b></p>
                <p><b>{{ $movie->year }}</b></p>
                <p>Episodes: {{ $movie->episodes }} </p>
                <p style="width:500px; padding-top: 0.7em;">{{ $movie->description }}</p>
            </div>
        </div>
    
    </div>
@endsection
