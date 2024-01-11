@extends('layout.template')

@section('title', 'Homepage')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Motor </h1>
    <div class="row">
        @foreach ($motors as $motor)
            <div class="col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $motor['nama'] }}</h5>
                                <p class="card-text">{{ $motor['deskripsi'] }}</p>
                                <a href="/motor/{{ $motor['id'] }}" class="btn btn-dark">Lihat Selengkapnya</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/images/{{ $motor['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $motors->links() }}
        </div>
    </div>
@endsection
