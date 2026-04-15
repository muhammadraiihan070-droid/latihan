@extends('master')

@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="/user/create" class="btn btn-success">Add User</a>
        <h2>User</h2>
    </div>

    <form action="/user" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="search..." name="search" value="{{ request('search')}}">
            <button class="btn btn-outline-secondary" type="submit">search</button>
        </div>
    </form>

    <div class="mt-3 d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/users/{{ $user->id }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure to delete {{ $user->name }}?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection