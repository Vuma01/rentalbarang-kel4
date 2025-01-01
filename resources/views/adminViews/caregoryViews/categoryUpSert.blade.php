@extends('layouts.main')

@section('title', 'Add Category')

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <p class="mb-0 text-center">{{ $error }}</p>
                @endforeach
            </ul>
        </div>

    @endif

@if (request()->route()->uri == 'add-category')
<div class="container">
    <h1>Add Category</h1>

    <form action="/add-category" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/categories" class="btn btn-secondary">Back</a>
    </form>
</div>
@else
<h1>Update Category</h1>
<form action="/edit-category/{{$category->slug}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/categories" class="btn btn-secondary">Back</a>
</form>

@endif



@endsection
