@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/user/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')

        <div class="row " style="max-width:60%; margin:0 auto; height:80vh;">
            <div class="border border-gray-200  p-6 rounded  " style="margin:0 auto; height:400px;">
                <div class="col-8 offset-2 ">
                    
                    <div class="row mt-2 ">
                        <h1 class="font-bold mb-2 ">Edit Profile: </h1>
                    </div>

                    <div class="align-self-left " style="position: relative; right: 44%;">
                    <hr class="w-full mb-2 mt-1 " style="
                    border: 0;
                    width: 188%;
                    clear:both;         
                    background-color:white;
                    height: 1px;" ></div>
                    
                    <div class="form-group row ">
                        <label for="username" class="col-md-4 col-form-label">Username:</label>

                        <input id="username"
                            type="text"
                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                            name="username"
                            value="{{ old('username') ?? Auth::user()->username }}"
                            autocomplete="username" autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
        
                    <div class="row">
                        <label for="profileImg" class="col-md-6 col-form-label">Profile Image:</label>

                        <input type="file" class="form-control-file" id="profileImg" name="profileImg" text="tak">

                        @if ($errors->has('profileImg'))
                            <strong>{{ $errors->first('profileImg') }}</strong>
                        @endif
                    </div>

                    <div class="row pt-4 mb-2">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                
                </div>
            </div>
        </div>
    </form>
</div>
@endsection