@extends('layouts.main')

@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>User yang nunggu di Approve</h1>

    @if ($users->isEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Item</th>
                <th>Start Date</th>
                <th>End Date</th>
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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Item</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->logPinjaman as $loan)
                    @if ($loan->status == 'pending')
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $loan->item->name }}</td>
                        <td>{{ $loan->start_date }}</td>
                        <td>{{ $loan->end_date }}</td>

                        <td class="d-flex gap-2">
                            <!-- Tombol Approve -->
                            <form action="/approve-item-user/{{$loan->id}}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Approve</button>
                            </form>

                            <!-- Tombol Reject -->
                            <form action="/reject-item-user/{{$loan->id}}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-warning btn-sm">Reject</button>
                            </form>

                            <!-- Tombol Hapus -->
                            <form action="/log-pinjaman/{{$loan->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>

                    </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endif

</div>
@endsection
