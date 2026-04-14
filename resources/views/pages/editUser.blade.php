<?php
// contoh: $user diambil dari database sebelumnya
// $user = mysqli_fetch_assoc(...);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="bootstrap.css"> <!-- opsional -->
</head>
<body>

<form action="/users/{{$user->id}}/update" method="post" class="form-floating">
@csrf
@method('PUT')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nama User" 
               name="name" value="{{$user->name}}">
        <label for="floatingInput">Nama </label>
    </div>

    <div class="form-floating">
        <input name="email" class="form-control" placeholder="email" value="{{$user->email}}">
        <label for="email">Email</label>
    </div>

   

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

</body>
</html>