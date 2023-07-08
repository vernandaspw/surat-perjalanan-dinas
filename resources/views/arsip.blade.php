@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 mt-2">
        <h1 class="mt-4">Arsip</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">arsip</li>
        </ol>
        <a href="{{ url('arsip/create', []) }}" class="btn btn-primary mb-2">Buat arsip baru</a>
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
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Perihal</th>
                            <th>No_Rak</th>
                            <th>Foto</th>
                            <th>Kantor</th>
                            <th>Bidang</th>
                            <th>ACT</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $item)
                            <tr>
                                <td>{{$item->No}}</td>
                                <td>{{$item->Tanggal}}</td>
                                <td>{{$item->Perihal}}</td>
                                <td>{{$item->No_Rak}}</td>
                                <td>
                                    <a href="{{ url('storage',$item->Foto) }}" target="_blank" rel="noopener noreferrer" class="btn btn-success">File</a>
                                </td>
                                <td>{{$item->kantor->Nama}}</td>
                                <td>{{$item->Bidang->Nama}}</td>
                                <td>
                                    <a href="{{ url('arsip/delete', $item->id) }}" class="btn btn-danger mx-1">Hapus</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
