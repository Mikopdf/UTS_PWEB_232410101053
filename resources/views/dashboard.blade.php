@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Welcome to Dashboard!</h2>
    @if(isset($username))
        <p class="mb-4">Hello, <strong>{{ $username }}</strong>! You're logged in.</p>
    @else
        <p class="mb-4">Hello, Guest! Please login for full access.</p>
    @endif

    <div class="grid md:grid-cols-2 gap-6 mt-6">
        <div class="bg-gray-100 p-4 rounded shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold mb-2">Pengelolaan Data Boss</h3>
            <p class="mb-4">View boss data items in the system.</p>
            <a href="{{ route('pengelolaan') }}" class="text-blue-600 hover:underline">Go to Pengelolaan</a>
        </div>
        <div class="bg-gray-100 p-4 rounded shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold mb-2">User Profile</h3>
            <p class="mb-4">View your profile information.</p>
            <a href="{{ route('profile') }}" class="text-blue-600 hover:underline">Go to Profile</a>
        </div>
    </div>
</div>
@endsection
