@extends("master")

@section("content")

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
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <h4>Tambah User</h4>

            <form action="/user/store" method="post">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" required value="{{old('nama')}}"
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required value="{{old('email')}}"
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required="{{old('password')}}"
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="/user" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</div>
@endsection