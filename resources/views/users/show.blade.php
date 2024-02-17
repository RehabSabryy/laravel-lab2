@extends('layouts.main')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <table class="table">
        <tbody>
            <tr>
                <h5>User ID = {{ $user->id }}</h5>
                <th>Name:</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Posts Count:</th>
                <td>{{ $user->posts()->count() }}</td>
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
                <li>
                    <a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a>
                    @if(auth()->check() && $post->user_id == auth()->user()->id)
                        <div class="d-flex">
                            <a class="btn btn-success me-1" href="{{ url('posts/' . $post->id . '/edit') }}">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @else
                        <div class="d-flex">
                            <a class="btn btn-primary me-1" href="{{ url('posts/' . $post->id) }}">View</a>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
