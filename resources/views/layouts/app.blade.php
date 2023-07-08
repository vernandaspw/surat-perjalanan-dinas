<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('img/LOGO-RRI.png') }}" type="image/x-icon">
    <title>Radio Republik Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('sbadmin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @livewireStyles
    @stack('styles')
</head>

<body class="sb-nav-fixed">
    @if (auth()->check())
        <nav class="sb-topnav d-print-none navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">SPD RRI</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                        aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                            class="fas fa-search"></i></button>
                </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li> --}}
                        <li><a class="dropdown-item" href="{{ url('logout', []) }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav d-print-none accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url('/', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            {{-- @if (auth()->user()->role == 'pegawai' || auth()->user()->role == 'pimpinan')
                                <a class="nav-link" href="{{ url('arsip', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Arsip
                                </a>
                            @endif --}}
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url('nppd', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Permintaan Perjalanan Dinas
                            </a>
                            <a class="nav-link" href="{{ url('spt', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Surat Perjalanan Dinas
                            </a>
                            <a class="nav-link" href="{{ url('sppd', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Surat Perintah Perjalanan Dinas
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="{{ url('data-pegawai', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Pegawai
                            </a>
                            @if (auth()->user()->role == 'admin')
                                {{-- <div class="sb-sidenav-menu-heading">Master</div>
                                <a class="nav-link" href="{{ url('kantor', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Kantor
                                </a>
                                <a class="nav-link" href="{{ url('bidang', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Bidang
                                </a> --}}
                                <a class="nav-link" href="{{ url('akun', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Kelola Akun
                                </a>
                            @endif


                            <div class="sb-sidenav-menu-heading">Lainnya</div>
                            <a class="nav-link" href="{{ url('logout', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ auth()->user()->username }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="bg-primary"></div>
                    @yield('content')
                </main>
                <footer class="py-4 d-print-none bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Pengolahan Data Arsip Dokumen Kantor RRI Palembang
                                2023</div>
                            {{-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> --}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    @else
        <div>
            @yield('content')
        </div>
    @endif

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('sbadmin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('sbadmin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sbadmin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('sbadmin/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
