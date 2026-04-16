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
            Edit User
        </div>

        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user->name }}" required value="{{old('nama')}}"
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $user->email }}" required value="{{old('email')}}"
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="/user" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection