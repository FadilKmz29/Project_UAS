@extends('layout.template')

@section('title', $motor ? $motor->nama : 'Detail Motor')

@section('content')
    @if ($motor)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title">{{ $motor->nama }}</h2>
                        <p class="card-text">{{ $motor->deskripsi }}</p>
                        <p class="card-text">Kategori :
                            {{ $motor->category ? $motor->category->nama_kategori : 'Tidak ada kategori' }}</p>
                        <p class="card-text">Tahun : {{ $motor->tahun }}</p>
                        <p class="card-text">Asal : {{ $motor->asal }}</p>
                        <a href="/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $motor->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data motor tidak ditemukan.</p>
    @endif
@endsection
