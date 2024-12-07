@extends('layouts.app')

@section('content')
<div class="pt-40 max-w-md mx-auto">
    <h2 class="text-2xl mb-4">Sign In</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email" class="block">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="border rounded w-full p-2">
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" id="password" required class="border rounded w-full p-2">
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        @if(session('error'))
            <p class="text-red-500 text-xs mt-2">{{ session('error') }}</p>
        @endif
        
        <button type="submit" class="mt-4 bg-maroon text-white py-2 px-4 rounded">Sign In</button>  
        <a href="{{ route('register') }}" class="text-maroon hover:text-blue-700 px-4">Don’t have an account? Register here</a>
    </form>
</div>
@endsection
