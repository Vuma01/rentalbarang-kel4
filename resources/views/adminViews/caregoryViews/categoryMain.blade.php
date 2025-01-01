@extends('layouts.main')

@section('title', 'Categories')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <div class=" text-end">
        <a href="/add-category" class="btn btn-primary mb-3 text-center">Tambah Kategori</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($categories->isEmpty())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class=" text-center">No items available.</td>
            </tr>
        </tbody>
    </table>
    @else

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="/edit-category/{{$category->slug}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/delete-category/{{$category->slug}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


</div>
@endsection
