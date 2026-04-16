@extends('master')

@section('content')
<div class="container mt-4">
    @if ($errors->any())
    <div class="allert allert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $errors}}</li>
            @endforeach
        </ul>
    </div>

@endif
    <div class="card shadow">

        <div class="card-body">

            <h4>Tambah Attraction</h4>

            <form action="{{ route('attractions.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                   <label for="destination_id" class="form-label">Destination</label>
                   <<select id="destination_id" name="destination_id" class="form-control @error ('destination_id') is-invalid @enderror" required>
                    <option value="">Select Destination</option>
                    @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}" {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                        {{$destination->name}}
                    </option>
                    @endforeach
                    @error('destination_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                </div>

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required value="{{old('nama')}}">
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control">{{old("description")}}</textarea>
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</div>
@endsection