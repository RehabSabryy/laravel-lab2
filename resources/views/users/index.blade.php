{{-- resources/views/users/index.blade.php --}}
@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Users</h1>
    <ul>
        @foreach ($users as $user)
            <h3>
            <a href="{{url("/users/{$user->id}")}}">{{ $user->name }} </a>
            </h3>
        @endforeach
    </ul>
</div>
@endsection