@extends('master')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            Detail Destinasi
        </div>

        <div class="card-body">
            <p><b>Nama:</b> {{ $destination->name }}</p>
            <p><b>Deskripsi:</b> {{ $destination->description }}</p>
<p><b>Lokasi:</b> {{ $destination->location }}</p>
<p><b>Hari:</b> {{ $destination->working_days }}</p>
<p><b>Jam:</b> {{ $destination->working_hours }}</p>
<p><b>Harga:</b> Rp {{ number_format($destination->ticket_price) }}</p>

            <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection