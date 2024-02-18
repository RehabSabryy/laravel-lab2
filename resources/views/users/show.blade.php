@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-0">User Details</h5>
                    <hr>
                    <table class="table table-borderless">
                        <tr>
                            <th>User ID:</th>
                            <td>{{ $user->id }}</td>
                        </tr>
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
                            <td>{{ $user->posts()->count() }}</td>
                        </tr>
                        <tr>
                            <th>Joined:</th>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-0">Posts Owned by {{ $user->name }}</h5>
                    <hr>
                    @if($posts->isEmpty())
                        <p class="mb-0">{{ $user->name }} has no posts yet.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach($posts as $post)
                                <li class="list-group-item">
                                    <a href="{{ url('posts/' . $post->id) }}" class="text-decoration-none">{{ $post->title }}</a>
                                    @if(auth()->check() && $post->user_id == auth()->user()->id)
                                        <div class="d-flex justify-content-end mt-2">
                                            <a class="btn btn-sm btn-success me-1" href="{{ url('posts/' . $post->id . '/edit') }}">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
