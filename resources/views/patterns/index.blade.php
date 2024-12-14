@extends('layouts.app')

@section('content')
<div id="my-patterns-page" class="container mx-auto px-4 sm:px-10 lg:px-16 mt-10">
    <div id="patterns" class="content-section">
        <h1 class="text-3xl font-bold text-center mt-10">Patterns</h1>
        <hr class="border-b-2 border-gray-300 my-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 mt-10">
            
            <a href="{{ route('patterns.create')}}" class="flex items-center bg-salmon hover:bg-dark-maroon text-white font-bold py-2 px-4 rounded inline-block">
                <i class="fas fa-plus mr-2"></i> Add a Pattern
            </a>

            <div class="relative w-full md:w-1/3 mt-4 md:mt-0">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <i class="fas fa-search text-gray-500"></i>
                </span>
                <input type="search" class="py-2 pl-10 pr-4 rounded border-2 border-gray-300 w-full" placeholder="Search patterns">
            </div>

            <div class="mt-4 md:mt-0">
                <label for="sort-patterns" class="mr-2 font-medium">Sort patterns by:</label>
                <select id="sort-patterns" class="border-2 border-gray-300 rounded py-2 px-4">
                    <option>Recently added</option>
                    <option>Name</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($patterns as $pattern)
                @foreach ($pattern->resources as $resource)
                    @foreach ($resource->images as $image)
                        @if ($image->main_image)
                        <a href="{{ route('patterns.show', ['pattern' => $pattern->pattern_id]) }}" class="block">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto" style="width: 100%; max-width: 300px;">
                                    <div style="height: 300px; overflow: hidden;">
                                        <img class="w-full h-full object-cover object-center" src="{{ Storage::url($image->path) }}" alt="Pattern Image">
                                    </div>
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2 text-center">{{ $pattern->name }}</div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection
