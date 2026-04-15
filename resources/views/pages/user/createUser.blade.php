@extends("master")

@section("content")

<form action="/user/store" method="post" class="form-floating">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name" ">
        <label for="floatingInput">Nama</label>
    </div>

    <div class="form-floating">
        <input name="email" id="" class="form-control" placeholder="Description">
        <label for="description">Email</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Pekanbaru" name="password" ">
        <label for="floatingInput">Password</label>
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection