@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            Detail Attraction
        </div>

        <div class="card-body">
            <p><b>Nama:</b> {{ $review->reviewer_name }}</p>
            <p><b>Comment:</b> {{ $review->comment }}</p>
            <p class="card-text">Attraction: {{ $review->attraction->nama ?? 'No Attraction available.' }}</p>
            

            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection