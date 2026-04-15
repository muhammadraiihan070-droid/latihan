@extends('master')

@section('content')
<div class="container">
    <h1>Create Destination</h1>
    <form action="/destination" method="POST">
       @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Istana Maimun" name="name">
            <label for="floatingInput">Nama Destinasi</label>
        </div>
        <div class="form-floating">
            <textarea name="description" id="floatingTextarea" class="form-control" placeholder="Description"></textarea>
            <label for="floatingPassword">Description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Medan" name="location">
            <label for="floatingInput">Lokasi</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="100000" name="ticket_price">
            <label for="floatingInput">Harga Tiket</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="8 am - 5 pm" name="working_hours">
            <label for="floatingInput">Jam Operasional</label>"
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Minggu" name="working_days">
            <label for="floatingInput">Hari Operasional</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Destination</button>
    </form>
</div>
@endsection