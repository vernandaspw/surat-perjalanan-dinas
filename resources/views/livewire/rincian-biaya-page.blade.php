<div>
    <div class="container-fluid px-4 mt-2">
        <h1 class="mt-4">Rincian Biaya</h1>

   @if(auth()->user()->role == 'operator')
   <button type="button" wire:click='buatPageTrue' class="btn btn-primary mb-2">Tambah Rincian Biaya</button>

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
                    <h4>
                        Buat SPPD
                    </h4>
                    <form wire:submit.prevent='tambahRincian'>


                        <div class="mb-2">
                            <label class="mb-0">Keterangan</label>
                            <input required type="text" class="form-control" wire:model='keterangan'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">biaya</label>
                            <input required type="number" class="form-control" wire:model='biaya'>
                        </div>
                        <div class="mb-2">
                            <label class="mb-0">Struk</label>
                            <input type="file" class="form-control" wire:model='struk'>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </form>
                @else
                    <div class="mb-2">
                        <h4>
                            SPPD : {{ $no_sppd }}
                        </h4>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                                <th>Struk</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->biaya }}</td>
                                    <td>
                                        @if($item->struk)
                                        <a href="{{ Storage::url($item->struk) }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ Storage::url($item->struk) }}" width="60" alt="">
                                        </a>
                                        @else
                                        -
                                        @endif
                                    </td>

                                    <td>
                                        @if(auth()->user()->role == 'operator')
                                        <button wire:click="hapus('{{ $item->id }}')" class="btn btn-sm btn-danger">Hapus</button>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-2">
                        <h4>
                            Total Biaya : {{ $total }}
                        </h4>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
