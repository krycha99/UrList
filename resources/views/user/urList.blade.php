@extends('layouts.urLayout')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@section('content')
<div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0  " style="width:1500px; margin:0 auto; ">
    
    @unless(count($movies) == 0)
    
    <div id="app" >
    @foreach ($movies as $movie)
    <div class="movies  border border-gray-200 rounded p-6 mt-2">
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
                {{-- <div class="text-xl font-bold mb-4">{{ $movie->description }}</div> --}}
                
            </div>

            <div class="d-flex ml-auto align-self-center ">
                <list-buttons movie-id="{{ $movie->id }}" episodes="{{ $movie->episodes }}" lstatus="{{ $movie->listed()->where('user_id', Auth::user()->id)->firstOrFail()->pivot->lStatus }}" eWatch="{{ $movie->listed()->where('user_id', Auth::user()->id)->firstOrFail()->pivot->episodesWatched }}">test2</list-buttons>
             </div>
            
            </div>
        
    </div>
    @endforeach
    </div>
    @else   
     <p>No movies found</p>
    @endunless
</div>
@endsection
