@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Akun</li>
        </ol>
        <a href="{{ url('akun/create', []) }}" class="btn btn-primary mb-2">Buat akun baru</a>
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
                            <th>username</th>
                            <th>role</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $item)
                            <tr>
                                <td>{{$item->username}}</td>
                                <td>{{$item->role}}</td>
                                <td>{{$item->isaktif ? 'aktif' : 'nonaktif'}}</td>
                                <td>
                                   @if($item->isaktif == true)
                                   <a href="{{ url('akun/nonaktif', $item->id) }}" class="btn btn-danger mx-1">Nonaktifkan</a>
                                   @else
                                   <a href="{{ url('akun/aktif', $item->id) }}" class="btn btn-success mx-1">Aktifkan</a>

                                   @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
