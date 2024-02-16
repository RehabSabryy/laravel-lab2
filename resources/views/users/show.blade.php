@extends('layouts.main')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <table class="table">
        <tbody>
            <tr>
                <th>Name:</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Posts Count:</th>
                <td>{{ $user->posts_count }}</td>
            </tr>
            <tr>
                <th>Created At:</th>
                <td>{{ $user->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Posts Owned by {{ $user->name }}</h2>
    @if($posts->isEmpty())
        <p>{{ $user->name }} has no posts yet.</p>
    @else
        <ul>
            @foreach($posts as $post)
                <li><a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    @endif

    <div class="d-flex">
        <a class="btn btn-success me-1" href="{{ url('users/' . $user->id . '/edit') }}">Edit</a>
        <form action="{{ url('users/' . $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection