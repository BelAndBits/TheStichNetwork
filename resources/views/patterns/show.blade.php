@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10 mt-10"> 
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Left column for images -->
        <div class="md:col-span-1 flex-1">
            @php
                // Obtaining all images and sorting them so the main image comes first
                $sortedImages = $pattern->resources->first()->images->sortByDesc('main_image');
            @endphp
            @foreach ($sortedImages as $image)
                <img src="{{ Storage::url($image->path) }}" alt="Pattern Image" class="w-full md:w-64 md:h-64 lg:w-80 lg:h-80 object-cover rounded-lg shadow-lg mt-2">
            @endforeach
        </div>

        <!-- Center column for pattern information -->
        <div class="flex-1 md:flex-3 p-4">
            <!-- Pattern name in large, bold font -->
            <h2 class="text-4xl font-bold">{{ $pattern->name }}</h2>
            <!-- Display 'by' followed by the username -->
            <h3 class="my-4 text-green-600">by {{ $pattern->user->username }}</h3>
            <hr class="border-t-4 border-green">
            <!-- Materials heading -->
            <h3 class="p-4 font-bold">Materials</h3>
            <!-- List of materials used in the pattern -->
            <p class="p-4">{{ $pattern->materials }}</p>
            <hr class="border-t-4 border-green">
            <!-- Description of the pattern -->
            <p class="text-gray-700 p-4">{{ $pattern->description }}</p>
        </div>

        <!-- Right column for pricing and add-to-cart button -->
        <div class="flex-1 p-4">
            <div class="p-4 border-4 rounded-lg text-center border-green">
                <!-- Display price in Euros -->
                <p class="text-xl font-bold">{{ $pattern->base_price }} €</p>
                <!-- Button to add the pattern to the cart -->
                <button class="mt-4 bg-maroon hover:bg-salmon text-white font-bold py-2 px-4 rounded">
                    Add to cart
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

