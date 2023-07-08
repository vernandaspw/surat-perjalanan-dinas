@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buat Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">buat Akun</li>
        </ol>
        @if (session('success'))
            <div class="my-2">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('akun/create', []) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="">Username</label>
                            <input required type="text" name="username" id="username"
                                class="form-control @error('username')is-invalid @enderror" placeholder="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Password</label>
                            <input required type="text" name="password" id="password"
                                class="form-control @error('password')is-invalid @enderror" placeholder="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Role</label>
                            <select class="form-control" name="role" id="">
                                <option value="">Pilih</option>
                                <option value="admin">admin</option>
                                <option value="pimpinan">pimpinan</option>
                                <option value="pegawai">pegawai</option>
                            </select>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-success me-2">Simpan</button>
                        <a href="{{ url('akun', []) }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
