@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            Detail Attraction
        </div>

        <div class="card-body">
            <p><b>Nama:</b> {{ $attraction->name }}</p>
            <p><b>Deskripsi:</b> {{ $attraction->description }}</p>

            <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection