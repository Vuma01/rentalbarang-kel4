@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>
    <div class="row">
        <!-- Kotak untuk jumlah User -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Jumlah User</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $userCount }}</h5>
                    <p class="card-text">Total pengguna yang terdaftar.</p>
                </div>
            </div>
        </div>

        <!-- Kotak untuk jumlah Barang -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Jumlah Barang</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $itemCount }}</h5>
                    <p class="card-text">Total barang yang tersedia.</p>
                </div>
            </div>
        </div>

        <!-- Kotak untuk jumlah Kategori -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Jumlah Kategori</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categoryCount }}</h5>
                    <p class="card-text">Total kategori barang.</p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
