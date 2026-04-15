@extends('master')


@section('content')
<div class="container">
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Price</th>
                <th>Working Hours</th>
                <th>Working Days</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>{{ $destination->id }}</td>
                <td>{{ $destination->name }}</td>
                <td>{{ $destination->description }}</td>
                <td>{{ $destination->location }}</td>
                <td>{{ $destination->ticket_price }}</td>
                <td>{{ $destination->working_hours }}</td>
                <td>{{ $destination->working_days }}</td>
            </tr>
            
        </tbody>
    </table>
</div>
@endsection
            
    