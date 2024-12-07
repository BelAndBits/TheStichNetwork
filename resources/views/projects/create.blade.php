@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-beige"> 
    <div class="p-6 w-full max-w-lg">
        <h1 class="text-xl font-bold text-center mb-4">Add a New Project</h1>
        <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col items-center"> 
                <label for="craft" class="block text-sm font-medium text-gray-700">Which craft?</label>
                <select id="craft" name="craft" class="mt-1 block w-64 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-salmon focus:border-salmon rounded-md">
                    <option value="sewing">Sewing</option>
                    <option value="knitting">Knitting</option>
                    <option value="crochet">Crochet</option>
                    <option value="embroidery">Embroidery</option>
                    <option value="cross_stitch">Cross Stitch</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="flex flex-col items-center"> 
                <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                <input type="text" id="project_name" name="project_name" required class="mt-1 block w-64 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-salmon focus:border-salmon rounded-md">
            </div>
            <div class="flex flex-col items-center"> 
                <label for="pattern" class="block text-sm font-medium text-gray-700">Do you use a pattern?</label>
                <select id="pattern" name="pattern" class="mt-1 block w-64 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-salmon focus:border-salmon rounded-md">
                    <option value="yes">I use a pattern</option>
                    <option value="no">I didn't use a pattern</option>
                    <option value="not_listed">The pattern is not listed on this site</option>
                </select>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="py-2 px-4 text-sm font-medium rounded-md text-white bg-salmon hover:bg-salmon-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-salmon">
                    Continue
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
