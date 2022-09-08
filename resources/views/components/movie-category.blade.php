@props(['categoriesCsv'])

@php
    $categories = explode(',', $categoriesCsv);
@endphp
<ul class="flex">
    @foreach ($categories as $category)
        
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" >
        <a href="/?category={{ $category }}">{{ $category }}</a>
    </li>
    @endforeach
</ul>