@extends('master')

@section('content')

<div class="container mt-4">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            {{-- HEADER + SEARCH --}}
            <div class="d-flex justify-content-between mb-3">
                <h4>Data Destinasi</h4>

                <div class="d-flex gap-2">
                    <form action="{{ route('destinations.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2"
                               placeholder="Cari nama..."
                               value="{{ request('search') }}">
                        <button class="btn btn-primary">Search</button>
                    </form>

                    <a href="{{ route('destinations.create') }}" class="btn btn-success">
                        + Tambah
                    </a>
                </div>
            </div>

            {{-- TABLE --}}
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="60px">ID</th>
                        <th>Nama</th>
                        <th width="220px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destination as $d)
                    <tr>
                        <td class="text-center">{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('destinations.show',$d->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('destinations.edit',$d->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('destinations.delete',$d->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Data tidak ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            <div class="d-flex justify-content-between">
                <div>
                    Showing {{ $destination->firstItem() }} to {{ $destination->lastItem() }} of {{ $destination->total() }} results
                </div>
                <div>
                    {{ $destination->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>

</div>

@endsection