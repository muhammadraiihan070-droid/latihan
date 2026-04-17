@extends('master')

@section('content')
<div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h4>Data Attraction-</h4>

            <div class="d-flex gap-2">
                <form action="{{ route('reviews.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary">Search</button>
                </form>

                <a href="{{ route('reviews.create') }}" class="btn btn-success">+ Tambah</a>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->reviewer_name }}</td>
                                <td>{{ $a->comment }}</td>
                                <td class="text-center">
                                    <a href="{{ route('reviews.show', $a->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('reviews.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('reviews.destroy', $a->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $reviews->links('pagination::bootstrap-5') }}

            </div>
        </div>

    </div>

@endsection