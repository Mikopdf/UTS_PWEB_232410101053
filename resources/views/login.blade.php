@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h4 class="text-xl font-semibold">ELDEN RING BOSS GUIDE</h4>
            </div>
            <div class="p-6">
                @if($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Username</label>
                        <input type="text" name="username" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
