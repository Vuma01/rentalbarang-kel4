@extends('layouts.mainGuest')

@section('title', 'Halaman User')

@section('content')
<div class="container">
    <h1>Semua Items</h1>
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-4">
            <div class="card mb-3" style="width: 20rem">
                @if ($item->image != null)
                <img src="{{ asset('storage/' . $item->image) }}"
                     class="card-img-top"
                     alt="{{ $item->name }}"
                     style="height: 200px; object-fit: cover;">
                @else
                <img src="{{ asset('images/NotFound.jpg') }}"
                     class="card-img-top"
                     alt="{{ $item->name }}"
                     style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">Category: {{ $item->category->name }}</p>
                    <a href="/user-items/{{$item->slug}}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
