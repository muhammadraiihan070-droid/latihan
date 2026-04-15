@extends('master')


@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <div class="d-flex justify-content-between mb-3">
                <a href="{{route('attractions.create')}}" class="btn btn-success">Add Destination</a>
                <h2>List Destinasi</h2>
                <form action="/destinations" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="search..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">search</button>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $attractions->links('pagination::bootstrap-5') }}
                    </div>
                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($attractions as $dest)
                                <tr>
                                    <td>{{ $dest->id }}</td>
                                    <td>{{ $dest->name }}</td>
                                    <td>{{ $dest->description }}</td>
                                    
                                    <td>
                                        <a href="{{route("attractions.edit", $dest->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="/destination/{{ $dest->id }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete {{ $dest->name }}?')">
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

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const alertEl = document.querySelector('.alert');
                    if (!alertEl) return;
                    setTimeout(() => {
                        alertEl.style.transition = 'opacity 0.5s ease-out';
                        alertEl.style.opacity = '0';
                        setTimeout(() => alertEl.remove(), 500);
                    }, 3000);
                });
            </script>
        @endpush
