<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Barang | @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>


    <div class="main d-flex justify-content-between flex-column">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

          </nav>

          <div class="bodyContent h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 bg-dark text-white collapse d-lg-block" id="navbarSupportedContent">




                    {{-- @if (Auth::user()->role_id == 1)
                    <a href="/barangs" @if ( request()->route()->uri == 'barangs') class="nav-link p-3 link-active" @endif class="nav-link p-3">Barangs</a>
                    <a href="/kategori" @if ( request()->route()->uri == 'kategori' || request()->route()->uri == 'add-kategori' || request()->route()->uri == 'edit-kategori/{category}') class="nav-link p-3 link-active" @endif class="nav-link p-3">Kategori</a>
                    <a href="/users" @if ( request()->route()->uri == 'users' || request()->route()->uri == 'aktifasi-user') class="nav-link p-3 link-active" @endif class="nav-link p-3">Users</a>
                    <a href="/" @if ( request()->route()->uri == '/') class="nav-link p-3 link-active" @endif class="nav-link p-3">List Barang</a>
                    <a href="/rental-barang" @if ( request()->route()->uri == 'rental-barang') class="nav-link p-3 link-active" @endif class="nav-link p-3">Rental Barang</a>
                    <a href="/dashboard" @if ( request()->route()->uri == 'dashboard') class="nav-link p-3 link-active" @endif class="nav-link p-3">Dasborad</a>
                    <a href="/logrental" @if ( request()->route()->uri == 'logrental') class="nav-link p-3 link-active" @endif class="nav-link p-3">Log Rental</a>
                    <a href="/logout"class="nav-link p-3">LogOut</a>
                        @else
                    <a href="/profile" @if ( request()->route()->uri == 'kategori') class="nav-link p-3 link-active" @endif class="nav-link p-3">Profile</a>
                    <a href="/logout"class="nav-link p-3">LogOut</a>
                        @endif --}}


                    <a href="/dashboard" class="nav-link p-3">Beranda</a>
                    <a href="/categories" class="nav-link p-3">Kategori</a>
                    <a href="/items" class="nav-link p-3">Barang</a>
                    <a href="/users" class="nav-link p-3">List User</a>
                    <a href="/logout" class="nav-link p-3">LogOut</a>


                </div>


                <div class=" container content col-lg-10">
                    @yield('content')
                </div>
            </div>
          </div>
    </div>


<script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
