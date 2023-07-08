<div>
    @if ($cetakPage)
        <div class="container-lg mx-5">
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
                    <div class="mb-3">
                        Nomor : {{ $dataC->no }}
                    </div>
                    <h4>SURAT PERINTAH PERJALANAN DINAS</h4>
                    <b>(SPPD)</b>
                </center>
                <div class="mt-3 me-5 pe-3">
                    <table class="table table-bordered border-dark">
                        <tbody>
                            <tr>
                                <td>
                                    1.
                                </td>
                                <td>
                                    Pejabat yang memerintah
                                </td>
                                <td>
                                    {{ $dataC->pejabat_pemberi_perintah }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2.
                                </td>
                                <td>
                                    Nama dan NIP yang diperintah
                                </td>
                                <td>
                                    {{ $dataC->pegawai->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3.
                                </td>
                                <td>
                                    Jabatan
                                </td>
                                <td>
                                    {{ $dataC->pegawai->jabatan }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4.
                                </td>
                                <td>
                                    Bidang
                                </td>
                                <td>
                                    {{ $dataC->pegawai->bidang }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5.
                                </td>
                                <td>
                                    Perihal
                                </td>
                                <td>
                                    {{ $dataC->spt->nppd->perihal }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6.
                                </td>
                                <td>
                                    <div class="">
                                        a. Tempat tujuan
                                    </div>
                                    <div class="">
                                        b. tanggal berangkat
                                    </div>
                                    <div class="">
                                        b. tanggal kembali
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        a. {{ $dataC->spt->nppd->tempat_tujuan }}
                                    </div>
                                    <div class="">
                                        b. {{$dataC->tgl_berangkat}}
                                    </div>
                                    <div class="">
                                        c. {{$dataC->tgl_kembali}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    7.
                                </td>
                                <td>
                                  Keterangan
                                </td>
                                <td>
                                    {{ $dataC->keterangan }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>




                <div class="mt-5 me-5 d-flex justify-content-end">
                    Palembang, {{ \Carbon\Carbon::parse($dataC->created_at)->isoFormat('D MMMM Y') }}
                </div>
                <div class="mt-0 me-5 d-flex justify-content-end">
                    <div class="me-5"><b>Pimpinan,</b></div>
                </div>
            </div>
        </div>
    @else
        <div class="d-print-none">
            <div class="container-fluid px-4 mt-2">
                <h1 class="mt-4">Surat Perintah Perjalanan Dinas</h1>


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
                                        <th>SPPD</th>
                                        <th>Nama</th>
                                        <th>Rincian Biaya</th>
                                        <th>Total Biaya</th>
                                        <th>ACT</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($datas as $item)
                                        <tr>
                                            <td>{{ $item->no }}</td>
                                            <td>{{ $item->pegawai->nama }}</td>

                                            <td>
                                                <a href="{{ url('rincian-biaya', $item->id) }}"
                                                    class="btn btn-sm btn-info">Rincian Biaya</a>
                                            </td>
                                            <td>
                                                {{ $item->riwayat_biaya->sum('biaya') }}
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
