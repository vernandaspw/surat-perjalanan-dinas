<div>
    <div class="container-fluid px-4 mt-2">
        <h1 class="mt-4">Data Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Pegawai</li>
        </ol>
        @if (auth()->user()->role == 'admin')
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
                            <label class="mb-0">Foto</label>
                            <input type="file" class="form-control" wire:model='img'>
                        </div>

                        <div class="mb-2">
                            <label class="mb-0">Nama</label>
                            <input required type="text" class="form-control" wire:model='nama'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">nip</label>
                            <input required type="text" class="form-control" wire:model='nip'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">jenis kelamin</label>
                            <select required class="form-control" wire:model='jk'>
                                <option value="">pilih</option>
                                <option value="l">laki laki</option>
                                <option value="p">perempuan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">No hp</label>
                            <input required type="text" class="form-control" wire:model='no_hp'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">email</label>
                            <input required type="text" class="form-control" wire:model='email'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">jabatan</label>
                            <input required type="text" class="form-control" wire:model='jabatan'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">bidang</label>
                            <input required type="text" class="form-control" wire:model='bidang'>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </form>
                @else
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Foto</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>JenisKelamin</th>
                                <th>NoHP</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Bidang</th>
                                <th>ACT</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($item->img) }}" width="50" alt="">
                                    </td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk == 'l' ? 'laki laki' : 'perempuan' }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->bidang }}</td>
                                    <td>
                                        @if (auth()->user()->role == 'admin')
                                        <button class="btn btn-sm btn-danger" wire:click="hapus('{{ $item->id }}')">Hapus</button>
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
