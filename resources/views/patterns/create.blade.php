@extends('layouts.app')

@section('content')
<div id="projects-creation" class="content-section">
    <h1 class="text-2xl font-bold text-center mt-5 text-maroon">Upload your Pattern</h1>
    <hr class="border-b-2 border-gray-300 my-4">
    <div class="max-w-2xl mx-auto p-5 bg-light-yellow shadow-md rounded">
        <form action="{{ route('patterns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-maroon">Name:</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-maroon focus:border-maroon">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-maroon">Description:</label>
                <textarea id="description" name="description" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-maroon focus:border-maroon"></textarea>
            </div>

            <!-- Materials -->
            <div>
                <label for="materials" class="block text-sm font-medium text-maroon">Materials:</label>
                <input type="text" id="materials" name="materials" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-maroon focus:border-maroon">
            </div>

            <!-- Base Price -->
            <div>
                <label for="base_price" class="block text-sm font-medium text-maroon">Base Price:</label>
                <input type="number" id="base_price" name="base_price" step="0.01" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-maroon focus:border-maroon">
            </div>

            <!-- Images -->
            <div>
                <label for="images" class="block text-sm font-medium text-maroon">Images:</label>
                <input type="file" id="images" name="images[]" accept="image/*" multiple required class="mt-1 block w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-salmon hover:file:bg-salmon-700" onchange="updateMainImageOptions(this)">
                <p class="text-sm font-medium text-maroon mb-4">Select one image as main.</p>
            </div>
            <div id="main-image-selection" class="mt-4 hidden">
            <p class="text-sm font-medium text-maroon mb-4">Select the main image:</p>
                <!-- Radio buttons will be appended here by JavaScript -->
            </div>


            <!-- PDF File -->
            <div>
                <label for="pdf_file" class="block text-sm font-medium text-maroon">PDF File:</label>
                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required class="mt-1 block w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-salmon hover:file:bg-salmon-700">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-maroon hover:bg-maroon-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-maroon-500">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
