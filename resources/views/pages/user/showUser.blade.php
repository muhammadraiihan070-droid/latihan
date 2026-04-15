@extends('master')

@section('content')
<div class="container">
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                
            </tr>
            
        </tbody>
    </table>
</div>
@endsection