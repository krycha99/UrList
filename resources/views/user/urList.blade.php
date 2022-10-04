@extends('layouts.urLayout')

@section('content')
<div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0  " style="width:1500px; margin:0 auto; ">
    
    @unless(count($movies) == 0)
    
    @foreach ($movies as $movie)
    <div class="movies  border border-gray-200 rounded p-6">
        <div class="d-flex">
            <img
                class="movieimg  mr-6 "
                width="20"
                height="10"
                src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('images/movie-icon.png') }}"
                alt=""
            />
            <div class>
                <h3 class="text-2xl">
                    <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{ $movie->type }} {{ $movie->year }} </div>
                <div class="text-xl font-bold mb-4">Episodes: {{ $movie->episodes }} </div>
                <x-movie-category :categoriesCsv="$movie->categories" />
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
