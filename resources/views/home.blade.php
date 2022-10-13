@extends('layouts.app')

@section('content')
<div class="container" style="margin:0 auto; height:80vh;">
    <div class="row justify-content-center" style="color: white;">
        <div class="col-md-8 border border-gray-200 rounded" style="background-image: radial-gradient( #003366, #0C1618);" >
            <div class="card" style=" background-image: radial-gradient( #003366, #0C1618);" >
                <div class="card-header">Logged in successfully!</div>

                <div class="card-body align-self-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                </div>
                <a class="mb-2 align-self-center " href="/"> <button>Ok</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
