<div>
    @if ($cetakPage)
        <div class="container-lg mx-4">
            <div class="d-print-none pt-2 mb-2">
                <button type="button" class="btn btn-warning" onclick="window.print()">
                    Cetak
                </button>
            </div>
            <div class="d-print-block">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="{{ asset('img/LOGO-RRI.png') }}" width="120" height="120" alt="">
                    </div>
                    <div class="ms-2">
                        <h4>Radio Republik Indonesia Palembang</h4>
                        <p>
                            Jln. Radio No. 2 Rt. 27 KM 4 Kelurahan 20 Ilir D IV Kecamatan Ilir Timur 1 Palembang
                        </p>
                    </div>
                </div>
                <hr style="height:2px;border-width:0;color:black;background-color:black">
                <center>
                    <h4>SURAT PERINTAH TUGAS</h4>
                    <b>{{ $dataC->no }}</b>
                </center>
                <div class="mt-3">
                    @foreach ($dataC->nppd->nppd_pegawai as $pegawai)
                        <div class="row">
                            <div class="">
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-1">
                                        Nama
                                    </div>
                                    <div class="col-11">
                                        : {{ $pegawai->data_pegawai->nama }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        NIP
                                    </div>
                                    <div class="col-11">
                                        : {{ $pegawai->data_pegawai->nip }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        Jabatan
                                    </div>
                                    <div class="col-11">
                                        : {{ $pegawai->data_pegawai->jabatan }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        Bidang
                                    </div>
                                    <div class="col-11">
                                        : {{ $pegawai->data_pegawai->bidang }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-2">
                    <div class="row">
                        <div class="col-3">
                            Perihal
                        </div>
                        <div class="col-9">
                            : {{ $dataC->nppd->perihal }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Tempat
                        </div>
                        <div class="col-9">
                            : {{ $dataC->nppd->tempat_tujuan }}
                        </div>
                    </div>

                </div>
                <div class="mt-2">
                    Demikian Surat Tugas yang diberikan agar dapat dipergunakan dan dilaksanakan sebagaimana semestinya
                </div>

                <div class="mt-5 me-5 d-flex justify-content-end">
                    <div class="me-5"><b>Pimpinan,</b></div>
                </div>
            </div>
        </div>
    @else
        <div class="d-print-none">
            <div class="container-fluid px-4 mt-2">
                <h1 class="mt-4">Surat Perintah Tugas</h1>


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

                        @if ($buatPage)
                            <h4>
                                Buat SPPD
                            </h4>
                            <form wire:submit.prevent='buatSPPD'>
                                <div class="mb-2">
                                    <label class="mb-0">Nama Pejabat pemberi perintah</label>
                                    <input required type="text" class="form-control" wire:model='pejabat'>
                                </div>
                                <div class="mb-2">
                                    <label class="mb-0">Tanggal berangkat</label>
                                    <input required type="date" class="form-control" wire:model='tgl_berangkat'>
                                </div>
                                <div class="mb-2">
                                    <label class="mb-0">Tanggal kembali</label>
                                    <input required type="date" class="form-control" wire:model='tgl_kembali'>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-0">Keterangan</label>
                                    <input type="text" class="form-control" wire:model='keterangan'>
                                </div>
                                <button type="submit" class="btn btn-primary form-control">Simpan</button>
                            </form>
                        @else
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SPT</th>
                                        <th>Nama</th>
                                        <th>Perihal</th>
                                        <th>Tempat Tujuan</th>
                                        {{-- <th>Print</th> --}}
                                        <th>SPPD</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($datas as $item)
                                        <tr>
                                            <td>{{ $item->no }}</td>
                                            <td>
                                                @foreach ($item->nppd->nppd_pegawai as $subitem)
                                                    <li>
                                                        {{ $subitem->data_pegawai->nama }}
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>{{ $item->nppd->perihal }}</td>
                                            <td>{{ $item->nppd->tempat_tujuan }}</td>


                                            <td>
                                                @if (auth()->user()->role == 'operator')
                                                    @if ($item->sppd->count() > 0)
                                                        @foreach ($item->sppd as $c)
                                                            <li>
                                                                {{ $c->no }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-success"
                                                            wire:click="buatSPPDPage('{{ $item->id }}')">
                                                            Buat SPPD
                                                        </button>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-info"
                                                    wire:click="cetakPageTrue('{{ $item->id }}')">
                                                    Cetak
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
