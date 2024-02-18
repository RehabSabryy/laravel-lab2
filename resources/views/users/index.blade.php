
@extends('layouts.main')
@section('title', 'Users')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Users</h1>
    <div class="row">
        @foreach ($users as $user)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/150" class="rounded-circle me-3" alt="Profile Image" width="50">
                        <div>
                            <h5 class="mb-0"><a href="{{ route('users.show', $user->id) }}" class="text-decoration-none">{{ $user->name }}</a></h5>
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <p class="card-text">Posts: {{ $user->posts_count }}</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        @if(auth()->user()->id == $user->id)
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center mt-4">{{ $users->links() }}</div>
@endsection
