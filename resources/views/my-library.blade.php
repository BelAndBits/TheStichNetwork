@extends('layouts.app')

@section('content')
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
                    <option>Recently started</option>
                    <option>Favourites</option>
                    <option>Recently added</option>
                    <option>Name</option>
                </select>
            </div>
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


