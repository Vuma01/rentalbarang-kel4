@extends('layouts.mainGuest')

@section('content')
<div class="container">
    <h1>Status Peminjaman</h1>

    <h3>Barang yang Sedang Dipinjam</h3>
    <div class="row">
        @foreach ($approved as $loan)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                   <div class="d-flex justify-content-around align-items-center ">
                    <h5 class="card-title">{{ $loan->item->name }}</h5>
                    <p>@if ($loan->item->image != null)
                        <img src="{{ asset('storage/' . $loan->item->image) }}"
                             alt="{{ $loan->item->name }}"
                             class="card-img-top"
                             style="width: 50px; height: 50px; object-fit: cover; cursor: pointer; "
                             data-bs-toggle="modal"
                             data-bs-target="#imageModal-{{ $loan->item->id }}">
                        @else
                        <img src="{{ asset('images/NotFound.jpg') }}"
                             alt="{{ $loan->item->name }}"
                             class="card-img-top"
                             style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
                             data-bs-toggle="modal"
                             data-bs-target="#imageModal-{{ $loan->item->id }}">
                        @endif</p>
                    </div>
                    <p>Peminjam: {{ $loan->user->name }}</p>
                    <p>Category: {{ $loan->item->category->name }}</p>
                    <p>Phone: @if ($loan->user->phone != null)
                        {{ $loan->user->phone }}
                    @else
                        No phone number provided
                    @endif</p>
                    <p>Address: {{ $loan->user->address }}</p>
                    <p>Email: {{$loan->user->email}}</p>
                    <p>Start Date: {{ $loan->start_date }}</p>
                    <p>End Date: {{ $loan->end_date }}</p>
                </div>
            </div>
        </div>

        <!-- Modal for Image -->
        <div class="modal fade" id="imageModal-{{ $loan->item->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        @if ($loan->item->image != null)
                    <img src="{{ asset('storage/' . $loan->item->image) }}"
                    alt="{{ $loan->item->name }}"
                    class="img-fluid">
                    @else
                    <img src="{{ asset('images/NotFound.jpg') }}"
                    alt="{{ $loan->item->name }}"
                    class="img-fluid">
                    @endif
                        <p class="mt-2">{{ $loan->item->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h3>Barang yang Menunggu Persetujuan</h3>
    <ul>
        @foreach ($pending as $loan)
        <li>
            @if ($loan->item->image != null)
    <img src="{{ asset('storage/' . $loan->item->image) }}"
         alt="{{ $loan->item->name }}"
         style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
         data-bs-toggle="modal"
         data-bs-target="#imageModal-{{ $loan->item->id }}">
    @else
    <img src="{{ asset('images/NotFound.jpg') }}"
         alt="{{ $loan->item->name }}"
         style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
         data-bs-toggle="modal"
         data-bs-target="#imageModal-{{ $loan->item->id }}">
    @endif

            {{ $loan->item->name }}
        </li>

    </li>

    <!-- Modal for Image -->
    <div class="modal fade" id="imageModal-{{ $loan->item->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    @if ($loan->item->image != null)
                    <img src="{{ asset('storage/' . $loan->item->image) }}"
                    alt="{{ $loan->item->name }}"
                    class="img-fluid">
                    @else
                    <img src="{{ asset('images/NotFound.jpg') }}"
                    alt="{{ $loan->item->name }}"
                    class="img-fluid">
                    @endif

                    <p class="mt-2">{{ $loan->item->name }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        @endforeach
    </ul>

    <h3>Barang yang Ditolak</h3>
    <ul>
        @foreach ($rejected as $loan)
        <li>
            <img src="{{ asset('storage/' . $loan->item->image) }}"
                 alt="{{ $loan->item->name }}"
                 style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
                 data-bs-toggle="modal"
                 data-bs-target="#imageModal-{{ $loan->item->id }}">
            {{ $loan->item->name }}
        </li>
        @endforeach
    </ul>
</div>
@endsection
