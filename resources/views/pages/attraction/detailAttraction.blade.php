@extends('master')


@section('content')
<div class="container">
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>{{ $destination->id }}</td>
                <td>{{ $destination->name }}</td>
                <td>{{ $destination->description }}</td>
                
            </tr>
            
        </tbody>
    </table>
</div>
@endsection