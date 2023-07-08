@extends('layouts.app')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" background-repeat: no-repeat;
            background-position: center;
            background-size: fill;>

                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset('img/Logo.jpg') }}" width="120" height="120" alt="">


                                    </div>
                                    <h3 class="text-center font-weight-light my-4"><span class="bg-white px-2 py-2 rounded">Login</span></h3>
                                </div>
                                <div class="card-body">
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <form action="{{ url('login', []) }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input autocomplete="" value="{{ old('username') }}" type="text" name="username"
                                                id="username" class="form-control @error('username')is-invalid @enderror"
                                                placeholder="Type your username">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password')is-invalid @enderror"
                                                placeholder="Type your password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input checked class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <button type="submit" class="btn btn-primary form-control">Login</button>

                                        </div>
                                    </form>
                                </div>
                                {{-- <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection
@push('styles')
  <style>
        .card-header {
            background-image: url('{{ asset('img/LOGO-RRI.png') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
@endpush
