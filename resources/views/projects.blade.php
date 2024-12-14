@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-6">All Projects</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($projects as $project)
            @foreach ($project->resources as $resource)
                @foreach ($resource->images as $image)
                    @if ($image->main_image)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto">
                            <img class="w-full h-48 object-cover" src="{{url($image->path) }}" alt="Project Image">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-center">{{ $project->name }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </div>
</div>
@endsection
