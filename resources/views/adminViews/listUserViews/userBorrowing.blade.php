@extends('layouts.')

@section('content')
<div class="container">
    <h1>User yang pinjam barang</h1>

    @if ($users->isEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Item</th>
                <th>Start Date</th>
                <th>End Date</th>
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
                <th>Phone</th>
                <th>Item</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->logPinjaman as $loan)
                    @if ($loan->status == 'approved')
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $loan->item->name }}</td>
                        <td>{{ $loan->start_date }}</td>
                        <td>{{ $loan->end_date }}</td>
                    </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endif

</div>
@endsection
