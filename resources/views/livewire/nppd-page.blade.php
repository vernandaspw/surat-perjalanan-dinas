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
                    <h4>NOTA PERMINTAAN PERJALANAN DINAS</h4>
                </center>
                <div class="mt-3">
                    @foreach ($dataC->nppd_pegawai as $pegawai)
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
                    Mohon diberikan Surat Perintah Tugas dan Surat Perintah Perjalanan Dinas

                </div>
                <div class="mt-2">
                    <div class="row">
                        <div class="col-3">
                            Tempat Tujuan
                        </div>
                        <div class="col-9">
                            : {{ $dataC->tempat_tujuan }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Perihal
                        </div>
                        <div class="col-9">
                            : {{ $dataC->perihal }}
                        </div>
                    </div>

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
                <h1 class="mt-4">Nota Permintaan Perjalanan Dinas</h1>

                @if (auth()->user()->role == 'operator')
                    <button type="button" wire:click='buatPageTrue' class="btn btn-primary mb-2">Buat baru</button>
                @endif
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
                            <form wire:submit.prevent='buat'>


                                <div class="mb-2">
                                    <label class="mb-0">tempat tujuan</label>
                                    <input required type="text" class="form-control" wire:model='tempat_tujuan'>
                                </div>
                                <div class="mb-2">
                                    <label class="mb-0">perihal</label>
                                    <input required type="text" class="form-control" wire:model='perihal'>
                                </div>
                                <div class="mb-2">

                                    <label class="mb-0">Pegawai</label>
                                    <select required wire:model='pegawai' class="form-select" multiple
                                        aria-label="multiple select example">
                                        @foreach ($pegawais as $pegawaiItem)
                                            <option value="{{ $pegawaiItem->id }}">{{ $pegawaiItem->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary form-control">Simpan</button>
                            </form>
                        @else
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Tempat Tujuam</th>
                                        <th>Perihal</th>
                                        <th>Pegawai</th>
                                        <th>Status</th>
                                        <th>SPT</th>
                                        <th>ACT</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($datas as $item)
                                        <tr>
                                            <td>{{ $item->tempat_tujuan }}</td>
                                            <td>{{ $item->perihal }}</td>
                                            <td>
                                                @foreach ($item->nppd_pegawai as $subitem)
                                                    <li>
                                                        {{ $subitem->data_pegawai->nama }}
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                @if ($item->status == 'disetujui')
                                                    @if ($item->spt)
                                                        {{ $item->spt->no }}
                                                    @else
                                                        @if (auth()->user()->role == 'operator')
                                                            <button type="button"
                                                                wire:click="buatSPT('{{ $item->id }}')"
                                                                class="btn btn-sm btn-success">
                                                                Buat SPT
                                                            </button>
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if (auth()->user()->role == 'pimpinan')
                                                    @if ($item->status == 'menunggu')
                                                        <button type="button" class="btn btn-sm btn-success"
                                                            wire:click="sejutui('{{ $item->id }}')">
                                                            Setujui
                                                        </button>
                                                    @endif
                                                @endif
                                                @if ($item->status == 'disetujui')
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        wire:click="cetakPageTrue('{{ $item->id }}')">
                                                        Cetak
                                                    </button>
                                                @endif
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
