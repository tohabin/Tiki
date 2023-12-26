@extends('layouts.app')

@section('content')
    <h2>User Details</h2>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
    <p><strong>Position:</strong> {{ $user->position }}</p>

    <!-- Add other user details as needed -->

    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to User List</a>
@endsection