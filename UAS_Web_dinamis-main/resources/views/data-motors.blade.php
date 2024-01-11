@extends('layout.template')

@section('title', 'Data Galeri Motor Klasik dan Ikonik')

@section('content')

    <h1>Data Koleksi Motor Terkenal</h1>
    <a href="/motors/create" class="btn btn-primary">Input Motor</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun</th>
                <th scope="col">asal</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($motors as $motor)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $motor->nama }}</td>
                    <td>{{ $motor->category->nama_kategori }}</td>
                    <td>{{ $motor->tahun }}</td>
                    <td>{{ $motor->asal }}</td>
                    <td class="text-nowrap">
                        <a href="/motor/{{ $motor['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/motor/delete/{{ $motor->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $motors->links() }}
    </div>
@endsection
