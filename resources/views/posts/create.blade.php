@extends('layouts.main')

@section('title', 'Add new post')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold">Add New Post</div>

                <div class="card-body">
                    <form action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea name="body" id="body" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                 
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Publish At</label>
                            <input type="date" name="published_at" id="published_at" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
