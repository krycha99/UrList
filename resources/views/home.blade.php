@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="color: black;>
        <div class="col-md-8">
            <div class="card">
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
