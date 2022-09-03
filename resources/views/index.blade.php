@extends('layouts.app')

<link rel="stylesheet" href="css/app.css">

@section('content')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
    @unless(count($movies) == 0)
    
    @foreach ($movies as $movie)
    {{-- <h2>{{ $movie['title'] }}</h2>
    <p>{{ $movie['description'] }}</p> --}}
    <div class="movies  border border-gray-200 rounded p-6">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="images/movie-icon.png"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{ $movie->type }} {{ $movie->year }} </div>
                <div class="text-xl font-bold mb-4">Episodes: {{ $movie->episodes }} </div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Laravel</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">API</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Backend</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Vue</a>
                    </li>
                </ul>
                <div class="text-xl font-bold mb-4">{{ $movie->description }}</div>
            </div>
        </div>
    </div>
    @endforeach

    @else   
     <p>No movies found</p>
    @endunless
</div>
@endsection
