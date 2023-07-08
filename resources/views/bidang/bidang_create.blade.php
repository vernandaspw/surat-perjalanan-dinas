@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buat Bidang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">buat Bidang</li>
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
                    <form action="{{ url('bidang/create', []) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="">Nama</label>
                            <input required type="text" name="nama" id="nama"
                                class="form-control @error('nama')is-invalid @enderror" placeholder="nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">kode</label>
                            <input required type="text" name="kode" maxlength="6" id="kode"
                                class="form-control @error('kode')is-invalid @enderror" placeholder="kode">
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Kantor</label>
                            <select required class="form-control" name="kantor_id">
                                <option value="">Pilih</option>
                                @foreach ($kantors as $kantor)
                                    <option value="{{ $kantor->id }}">{{ $kantor->Nama }}</option>
                                @endforeach
                            </select>
                            @error('kantor_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success me-2">Simpan</button>
                        <a href="{{ url('bidang', []) }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
