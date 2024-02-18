
@extends('layouts.main')

@section('title', 'Post List')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Posts List</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->published_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary me-1">View</a>
                                @if(auth()->check() && $post->user_id == auth()->user()->id)
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary me-1">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
