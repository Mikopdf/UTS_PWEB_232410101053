@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4 bg-blue-600 text-white px-4 py-2 rounded">User Profile</h2>

    @if(isset($username))
        <div class="mb-4">
            <strong>Username:</strong> <span>{{ $username }}</span>
        </div>
        <div class="mb-4">
            <strong>Password:</strong> <span>••••••••</span>
        </div>
        <div class="mb-4">
            <strong>Last Login:</strong> <span>{{ now()->format('d F Y H:i:s') }}</span>
        </div>
    @else
        <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded">
            No user data available. Please login first.
        </div>
    @endif
</div>
@endsection
