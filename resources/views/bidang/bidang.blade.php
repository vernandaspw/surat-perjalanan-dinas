@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 mt-2">
        <h1 class="mt-4">Bidang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Bidang</li>
        </ol>
        <a href="{{ url('bidang/create', []) }}" class="btn btn-primary mb-2">Buat bidang baru</a>
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
                            <th>NAME</th>
                            <th>KODE</th>
                            <th>KANTOR</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $item)
                            <tr>
                                <td>{{$item->Nama}}</td>
                                <td>{{$item->Kode}}</td>
                                <td>{{$item->kantor->Nama}}</td>
                                <td>
                                    <a href="{{ url('bidang/delete', $item->id) }}" class="btn btn-danger mx-1">Hapus</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
