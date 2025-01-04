@extends('layouts.main')

@section('title', 'Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Items</h1>
    <a href="/add-item" class="btn btn-primary">Add Item</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($items->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No items available.</td>
            </tr>
        @else
            @foreach($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? 'No Category' }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->name }}" width="50" class="img-thumbnail"
                                style="cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageModal-{{ $item->id }}">
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        <a href="/edit-item/{{$item->slug}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/delete-item/{{$item->slug}}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="imageModal-{{ $item->id }}" tabindex="-1" aria-labelledby="imageModalLabel-{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
