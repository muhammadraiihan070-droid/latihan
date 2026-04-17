@extends('master')

@section('content')
<div class="container mt-4">

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-warning">
            Edit Review
        </div>

        <div class="card-body">

            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                   <label for="attraction_id" class="form-label">Destination</label>
                   <<select id="attraction_id" name="attraction_id" class="form-control @error ('attraction_id') is-invalid @enderror" required>
                    <option value="">Select Attraction</option>
                    @foreach ($attractions as $attraction)
                    <option value="{{ $attraction->id }}" {{ old('attraction_id')|| $attraction->id  == $attraction->id ? 'selected' : '' }}>
                        {{$attraction->nama}}
                    </option>
                    @endforeach
                    @error('attraction_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NAME --}}
                <div class="mb-3">
                    <label>Nama Attraction</label>
                    <input type="text" name="reviewer_name" class="form-control"
                           value="{{ old('name', $review->reviewer_name) }}" required>
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label>Comment</label>
                    <textarea name="comment" class="form-control" required>
{{ old('description', $review->comment) }}
                    </textarea>
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>


@endsection