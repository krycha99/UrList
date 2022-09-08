@extends('layouts.app')

@section('content')

<div class="container" >
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Add movie or series</h2>
        <p class="mb-4">Add movie or series to check your progress</p>
    </header>

    <div class="row justify-content-center" style="color: black; background-color: white;">   

        <form method="POST" action="/movies" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                value="{{old('title')}}" />

            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <label for="type" class="inline-block text-lg mb-2">Type</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="type"
                placeholder="Example: Senior Laravel Developer" value="{{old('type')}}" />

            @error('type')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <label for="year" class="inline-block text-lg mb-2">Year</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year"
                placeholder="Example: Remote, Boston MA, etc" value="{{old('year')}}" />

            @error('year')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <label for="episodes" class="inline-block text-lg mb-2">
                Episodes
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="episodes" value="{{old('episodes')}}" />

            @error('episodes')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <label for="categories" class="inline-block text-lg mb-2">
                Categories (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="categories"
                placeholder="Example: Laravel, Backend, Postgres, etc" value="{{old('categories')}}" />

            @error('categories')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <label for="poster" class="inline-block text-lg mb-2">
               Poster
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="poster" />

            @error('poster')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Description
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                placeholder="Include tasks, requirements, salary, etc">{{old('description')}}</textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Add
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>   
</div>    
@endsection