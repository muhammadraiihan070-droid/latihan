@extends('master')

@section('content')
<div class="container mt-4">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data User</h4>

        <div class="d-flex gap-2">
            <form action="/user" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2"
                       placeholder="Cari user..."
                       value="{{ request('search') }}">
                <button class="btn btn-primary">Search</button>
            </form>

            <a href="/user/create" class="btn btn-success">+ Tambah</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        {{-- 🔒 disembunyikan --}}
                        <td class="text-center">***</td>

                        <td>{{ $user->created_at->format('d-m-Y') }}</td>

                        <td class="text-center">
                            <a href="{{ route('users.show',$user->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('users.destroy',$user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus user ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    Showing {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }}
                </div>
                <div>
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>

</div>
@endsection