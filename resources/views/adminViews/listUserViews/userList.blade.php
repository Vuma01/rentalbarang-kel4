@extends('layouts.main')

@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <h1>Daftar User yang belum pinjam</h1>
    <div class="text-end">
        <a href="/users-pending" class="btn btn-success">User Pending</a>
        <a href="/users/borrowing" class="btn btn-success">User borrowing</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->nim }}</td>
                <td>
                    @if ($user->email == null)
                    <span class="text-muted">N/A</span>
                    @else
                    {{ $user->email }}
                    @endif
                </td>
                <td>{{ ucfirst($user->role) }}</td>
                <td class="d-flex gap-2">
                    @if ($user->role != 'admin')
                    <form action="/users/{{$user->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                    </form>
                    @else
                    <button class="btn btn-danger btn-sm" disabled >Hapus</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

