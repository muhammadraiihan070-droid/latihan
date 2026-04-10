@extends('master')

@section('content')
<div class="container py-5">

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">

            {{-- Gambar + Gallery --}}
            <div class="col-md-6 p-3">

                {{-- Gambar utama --}}
                @php
                $destinasi['image'] = "https://bankraya.co.id/uploads/insights/jO3TRUmMuBAuyilKHgu9Ovjfs3nFoubWiSSjB3Pn.jpg";
                    $images = $destinasi['galeri'] ?? [$destinasi['image']];

                @endphp

                <div class="mb-3">
                    <img id="mainImage"
                         src="{{ $images[0] ?? '' }}"
                         class="w-100 rounded-3 shadow-sm"
                         style="height: 350px; object-fit: cover;">
                </div>

                {{-- Thumbnail --}}
                <div class="d-flex gap-2 overflow-auto">
                    @foreach ($images as $img)
                        <img src="{{ $img }}"
                             class="rounded-3 border thumb-img"
                             style="width: 80px; height: 80px; object-fit: cover; cursor:pointer;"
                             onclick="changeImage(this)">
                    @endforeach
                </div>

            </div>

            {{-- Detail --}}
            <div class="col-md-6">
                <div class="p-4 p-md-5">

                    <h3 class="fw-bold mb-1">{{ $destinasi['nama'] }}</h3>
                    <span class="badge bg-success mb-3">
                        ⭐ {{ number_format($destinasi['rating'],1) }}
                    </span>

                    <h5 class="fw-bold mb-4">Detail Perjalanan</h5>

                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="text-muted">Harga</span>
                        <span class="fw-semibold text-primary">
                            Rp {{ number_format($destinasi['harga'] ?? 0, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="text-muted">Durasi</span>
                        <span>{{ $destinasi['durasi'] ?? '-' }}</span>
                    </div>

                    <div class="mb-3 d-flex justify-content-between border-bottom pb-2">
                        <span class="text-muted">Transportasi</span>
                        <span>{{ $destinasi['transportasi'] ?? '-' }}</span>
                    </div>

                    <div class="mb-4 d-flex justify-content-between border-bottom pb-2">
                        <span class="text-muted">Hotel</span>
                        <span>{{ $destinasi['hotel'] ?? '-' }}</span>
                    </div>

                    {{-- Fasilitas --}}
                    <h5 class="fw-bold mb-3">Fasilitas</h5>
<div class="d-flex flex-wrap gap-2 mb-4">
    @foreach (($destinasi['fasilitas'] ?? []) as $fasilitas)
        <span class="badge bg-info border rounded-pill px-3 py-2">
            ✓ {{ $fasilitas }}
        </span>
    @endforeach
</div>

                    {{-- Button --}}
                    <div class="d-flex gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4">
                            ← Kembali
                        </a>
                        <button class="btn btn-dark px-4">
                            Pesan Sekarang
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

{{-- Script ganti gambar --}}
<script>
function changeImage(element) {
    document.getElementById('mainImage').src = element.src;
}
</script>

@endsection