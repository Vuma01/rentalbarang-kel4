@extends('layouts.mainGuest')

@section('content')
<div class="container">
    <h1>{{ $item->name }}</h1>
    <p>Category: {{ $item->category->name }}</p>
    <p>{{ $item->description }}</p>
    <p>Stock: {{ $item->stock }}</p>
    <form action="/user-items/{{$item->slug}}/pinjam" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Pinjam</button>
    </form>
</div>
@endsection
