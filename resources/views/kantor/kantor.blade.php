@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kantor</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kantor</li>
        </ol>
        <a href="{{ url('kantor/create', []) }}" class="btn btn-primary mb-2">Buat kantor baru</a>
        @if (session('success'))
            <div class="my-2">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->Nama }}</td>
                                <td>{{ $data->Telp }}</td>
                                <td>{{ $data->Alamat }}</td>
                                <td>
                                    <a href="{{ url('kantor/delete', $data->id) }}" class="btn btn-danger mx-1">Hapus</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
