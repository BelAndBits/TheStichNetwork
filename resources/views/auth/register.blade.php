@extends('layouts.app')

@section('content')

<div class="pt-40 flex items-center justify-center ">
    <div class="w-full max-w-md p-6  bg-light-yellow rounded shadow-md">
        @if ($errors->any())
            <div class="p-3 mb-4 text-red-500 text-center font-bold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="email" class="block font-bold mb-2">Correo electrónico:</label>
                <input id="email" type="email" name="email" required class="w-full p-3 border rounded">
            </div>
            <div class="mt-4">
                <label for="username" class="block font-bold mb-2">Nombre de usuario:</label>
                <input id="username" type="text" name="username" required minlength="3" class="w-full p-3 border rounded">
            </div>
            <div class="mt-4">
                <label for="password" class="block font-bold mb-2">Contraseña:</label>
                <input id="password" type="password" name="password" required minlength="7" class="w-full p-3 border rounded">
            </div>
            <div class="mt-4">
                <button type="submit" class="w-full bg-maroon text-white py-3 rounded hover:bg-blue-700">Crear cuenta</button>
            </div>
        </form>
    </div>
</div>
@endsection
