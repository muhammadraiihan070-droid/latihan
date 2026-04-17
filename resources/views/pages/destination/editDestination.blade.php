@extends('master')

@section('content')
@if ($errors->any())
    <div class="allert allert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $errors}}</li>
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
            <form action="{{ route('destinations.update',$destination->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" placeholder="Image" name="image" value="{{ old('image') }}" accept=".jpg, .jpeg, .png">
                    <label for="floatingInput">Gambar Destinasi</label>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    <input type="text" name="working_days"
                           value="{{ $destination->working_days }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam Buka</label>
                    <input type="text" name="working_hours"
                           value="{{ $destination->working_hours }}"
                           class="form-control">
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