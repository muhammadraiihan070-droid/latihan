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

            <h4>Tambah Review</h4>

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                   <label for="attraction_id" class="form-label">Destination</label>
                   <<select id="attraction_id" name="attraction_id" class="form-control @error ('attraction_id') is-invalid @enderror" required>
                    <option value="">Select Attraction</option>
                    @foreach ($attractions as $attraction)
                    <option value="{{ $attraction->id }}" {{ old('attraction_id') == $attraction->id ? 'selected' : '' }}>
                        {{$attraction->nama}}
                    </option>
                    @endforeach
                    @error('attraction_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                </div>

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="reviewer_name" class="form-control" required value="{{old('reviwer_name')}}">
                </div>

                <div class="mb-3">
                    <label>Comment</label>
                    <textarea name="comment" class="form-control">{{old("comment")}}</textarea>
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</div>
@endsection