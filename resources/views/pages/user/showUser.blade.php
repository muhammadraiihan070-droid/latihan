@extends('master')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            Detail User
        </div>

        <div class="card-body">
            <p><b>ID:</b> {{ $user->id }}</p>
            <p><b>Nama:</b> {{ $user->name }}</p>
            <p><b>Email:</b> {{ $user->email }}</p>

            <a href="/user" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection