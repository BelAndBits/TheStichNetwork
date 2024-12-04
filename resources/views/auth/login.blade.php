@extends('layouts.app')

@section('content')
<div class="pt-40 max-w-md mx-auto">
    <h2 class="text-2xl mb-4">Sign In</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email" class="block">Email Address</label>
            <input type="email" name="email" id="email" required class="border rounded w-full p-2">
        </div>
        <div class="mt-4">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" id="password" required class="border rounded w-full p-2">
        </div>
        
        <button type="submit" class="mt-4 bg-maroon text-white py-2 px-4 rounded">Sign In</button>  
        <a href="{{ route('register') }}" class="text-maroon hover:text-blue-700 px-4">Don’t have an account? Register here</a>
    </form>
</div>
@endsection
