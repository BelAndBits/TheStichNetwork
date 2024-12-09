@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success" role="alert" id="successMessage">
        {{ session('success') }}
    </div>
    <script>
        document.getElementById('successMessage').focus(); //Implementation for better accesibility
    </script>
@endif

<div id="my-library-page" class="container mx-auto px-4 sm:px-8 lg:px-16 mt-4">
    <nav class="bg-green p-3 rounded shadow-md text-center mt-16">
        <ul class="flex justify-center space-x-4">
            <li><a href="#projects" class="text-white hover:text-dark-maroon">Projects</a></li>
            <li><a href="#patterns" class="text-white hover:text-dark-maroon">Patterns</a></li>
            <li><a href="#stash" class="text-white hover:text-dark-maroon">Stash</a></li>
        </ul>
    </nav>

    <div id="projects" class="content-section">
        <h1 class="text-3xl font-bold text-center mt-5">My Projects</h1>
        <hr class="border-b-2 border-gray-300 my-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            
            <a href="{{ route('projects.create', ['username' => Auth::user()->username]) }}" class="flex items-center bg-salmon hover:bg-dark-maroon text-white font-bold py-2 px-4 rounded inline-block">
                <i class="fas fa-plus mr-2"></i> Add a Project
            </a>

            <div class="relative w-full md:w-1/3 mt-4 md:mt-0">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <i class="fas fa-search text-gray-500"></i>
                </span>
                <input type="search" class="py-2 pl-10 pr-4 rounded border-2 border-gray-300 w-full" placeholder="Search projects">
            </div>

            <div class="mt-4 md:mt-0">
                <label for="sort-projects" class="mr-2 font-medium">Sort projects by:</label>
                <select id="sort-projects" class="border-2 border-gray-300 rounded py-2 px-4">
                    <option>Recently added</option>
                    <option>Name</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
            @foreach ($projects as $project)
                @foreach ($project->resources as $resource)
                    @if ($resource->mainImage)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <div class="px-6 py-4 bg-white">
                                <h3 class="font-bold text-xl mb-2">{{ $project->name }}</h3>
                            </div>
                            <img class="w-full" src="{{ Storage::url($resource->Image->path) }}" alt="Main Project Image">
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

    </div>

    <div id="patterns" class="content-section" style="display: none;">
        <h1 class="text-3xl font-bold text-center mt-5">My Patterns</h1>
        <hr class="border-b-2 border-gray-300 my-4">
    </div>
    <div id="stash" class="content-section" style="display: none;">
        <h1 class="text-3xl font-bold text-center mt-5">My Stash</h1>
        <hr class="border-b-2 border-gray-300 my-4">
    </div>
</div>
@endsection


