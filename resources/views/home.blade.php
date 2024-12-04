<!-- Home page -->
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-hero-image bg-cover bg-center bg-[#544343] text-[#F8F3E6] py-16">
    <!-- Overlay for better text readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <!-- Main Title -->
        <h1 class="text-4xl font-extrabold mb-6">The Stitch Network is your creative journey companion</h1>
        <!-- Subtitle -->
        <p class="text-lg mb-8">Find your sewing, embroidery, crochet, and knitting resources all in one place.</p>
        <!-- Main Button -->
        <a href="/patterns" 
           class="bg-[#A8C3A5] text-white font-bold py-3 px-6 rounded-full shadow hover:bg-[#F5D5A4] transition">
            Explore All Patterns
        </a>
    </div>
</section>



<!-- Features Section -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">What We Offer</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1: Sewing -->
            <div class="text-center p-6 bg-[#F8F3E6] rounded-lg shadow">
                <img src="{{ asset('images/sewing-icon.png') }}" alt="Sewing" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Sewing</h3>
                <p class="text-sm">Patterns and resources for your sewing projects.</p>
            </div>
            <!-- Card 2: Knitting -->
            <div class="text-center p-6 bg-[#F8F3E6] rounded-lg shadow">
                <img src="{{ asset('images/knitting-icon.png') }}" alt="Knitting" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Knitting</h3>
                <p class="text-sm">Discover unique patterns for knitting.</p>
            </div>
            <!-- Card 3: Crochet -->
            <div class="text-center p-6 bg-[#F8F3E6] rounded-lg shadow">
                <img src="{{ asset('images/crochet-icon.png') }}" alt="Crochet" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Crochet</h3>
                <p class="text-sm">Access a variety of crochet patterns.</p>
            </div>
            <!-- Card 4: Embroidery -->
            <div class="text-center p-6 bg-[#F8F3E6] rounded-lg shadow">
                <img src="{{ asset('images/embroidery-icon.png') }}" alt="Embroidery" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Embroidery</h3>
                <p class="text-sm">Beautiful designs to enhance your embroidery skills.</p>
            </div>
            <!-- Card 5: Cross Stitch -->
            <div class="text-center p-6 bg-[#F8F3E6] rounded-lg shadow">
                <img src="{{ asset('images/cross-stitch-icon.png') }}" alt="Cross Stitch" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-bold mb-2">Cross Stitch</h3>
                <p class="text-sm">Master the art of cross-stitching with ease.</p>
            </div>
        </div>
    </div>
</section>
@endsection
