@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
@csrf
@section('content')
    <div class="border border-gray-200 rounded p-6" style="width:1000px; margin:0 auto;">
        <div class="d-flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('images/movie-icon.png') }}"
                alt=""
            />
            
            <div class="mr-20">
                <h1 style="font-size: 1.5em; justify-content: left;"><b>{{ $movie->title }}</b></h1>
                <p style="padding-bottom: 0.7em;"><b>{{ $movie->type }}</b></p>
                <p><b>{{ $movie->year }}</b></p>
                <p>Episodes: {{ $movie->episodes }} </p>
                <p style="width:500px; padding-top: 0.7em;">{{ $movie->description }}</p>
            </div>
            
              
            @auth    
        <div id="app" class="ml-6">
          <list-component movie-id="{{ $movie->id }}" liststatus="{{ $liststatus }} " lstatus="{{ $lstatus}}" episodes="{{ $movie->episodes }}" eWatch="{{ $ewatch }}"></list-component>
        </div>
          @endauth
            
        </div>
    
    </div>
@endsection
