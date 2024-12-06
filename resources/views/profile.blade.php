@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap">
        <!-- User Avatar and Name Section -->
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
            <div class="flex flex-col items-center text-center">
                <div class="bg-white p-1 rounded-full">
                    <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" alt="Profile Avatar" class="rounded-full h-32 w-32">
                </div>                
                <h2 class="mt-2 text-lg font-bold">{{ Auth::user()->username }}</h2>
                
                <a href="/edit-profile" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Profile</a>
            </div>
        </div>
        <!-- Summary Section -->
        <div class="w-full md:w-2/3 px-4">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold border-b pb-2">Summary</h3>
                <div class="mt-4">
                    <p>Projects: {{ $projectsCount ?? 0 }}</p>
                    @if($projectsCount == 0)
                        <p>You have no projects yet! <a href="/projects/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upload your first project</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
