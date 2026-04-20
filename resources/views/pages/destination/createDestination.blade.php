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
        <div class="card-body">

            <h4 class="mb-4">Tambah Destinasi</h4>

            <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Gambar Destinasi</label>
                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png">
                </div>
                
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control" required value="{{ old('location') }}">
                </div>

                <div class="mb-3">
                    <label>Hari Buka</label>
                    <input type="text" name="working_days" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam Buka</label>
                    <input type="text" name="working_hours" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga Tiket</label>
                    <input type="number" name="ticket_price" class="form-control" required value="{{ old('ticket_price') }}">
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</div>

@endsection