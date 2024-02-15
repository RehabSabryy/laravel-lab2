{{-- resources/views/show.blade.php --}}
@extends('layouts.main')

@section('content')
<ul>
    <h2>
    <li>{{ $user->name }}</li>
    </h2>
    <li>{{ $user->email }}</li>
    <td>{{ $user->posts_count }}</td>

    <li>Created At:{{ $user->created_at }}</li>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
    <form action="{{url("users/>{$user->id}")}}">
        @csrf
        @method('delete')
        <input type="submit" value="delete">
    </form>

</ul>

@endsection