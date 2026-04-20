@extends('master')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning">
            Edit Destinasi
        </div>

        <div class="card-body">
            <form action="{{ route('destinations.update',$destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Gambar Destinasi</label>
                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png">
                </div>
                
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ $destination->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control">{{ $destination->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="location" value="{{ $destination->location }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Hari Buka</label>
                    <input type="text" name="working_days" value="{{ $destination->working_days }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam Buka</label>
                    <input type="text" name="working_hours" value="{{ $destination->working_hours }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="ticket_price" value="{{ $destination->ticket_price }}" class="form-control">
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection