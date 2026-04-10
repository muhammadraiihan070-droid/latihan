@extends('master')


@section('content')
<div class="container">
    <a href="/destination/create" class="btn btn-success">Add Destination</a>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                
            @foreach ($destinations as $dest)
            <tr>
                <td>{{ $dest->id }}</td>
                <td>{{ $dest->name }}</td>
                <td>{{ $dest->description }}</td>
                <td>{{ $dest->location }}</td>
                <td>{{ $dest->ticket_price }}</td>
                <td>{{ $dest->working_hours }}</td>
                <td>{{ $dest->working_days }}</td>
                <td>
                    <a href="/destinations/{{$dest->id}}/edit" class="btn btn-warning">Edit</a>
                    <form action="/destination/{{ $dest->id }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{ $dest->name }}?')">
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