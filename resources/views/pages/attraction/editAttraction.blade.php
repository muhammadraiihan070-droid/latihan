@extends("master")

@section("content")

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
            Edit Attraction
        </div>

        <div class="card-body">

            <form action="{{ route('attractions.update', $attraction->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NAME --}}
                <div class="mb-3">
                    <label>Nama Attraction</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('name', $attraction->nama) }}" required>
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" required>
{{ old('description', $attraction->description) }}
                    </textarea>
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection