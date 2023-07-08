<div>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buat Arsip</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">buat arsip</li>
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
                    <form wire:submit.prevent='store'>
                        <div class="mb-2">
                            <label for="">No</label>
                            <input required wire:model='no' maxlength="10" type="text" name="no" id="no"
                                class="form-control @error('no')is-invalid @enderror" placeholder="no">
                            @error('no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Tanggal</label>
                            <input required wire:model='tanggal' type="date" name="tanggal" id="tanggal"
                                class="form-control @error('tanggal')is-invalid @enderror" placeholder="tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Perihal</label>
                            <input required maxlength="5" wire:model='perihal' type="text" name="perihal"
                                id="perihal" class="form-control @error('perihal')is-invalid @enderror"
                                placeholder="perihal">
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="">No Rak</label>
                            <input required wire:model='No_Rak' maxlength="5" type="text" name="No_Rak"
                                id="No_Rak" class="form-control @error('No_Rak')is-invalid @enderror"
                                placeholder="No_Rak">
                            @error('No_Rak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">

                            <label for="">File / Foto</label>
                            <input required wire:model='foto' type="file" class="form-control">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Kantor</label>
                            <select required wire:model='kantor_id' class="form-control" name="kantor_id">
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
                        <div class="mb-2">
                            <label for="">Bidang</label>
                            <select required wire:model='bidang_id' class="form-control" name="bidang_id">
                                <option value="">Pilih</option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->Nama }}</option>
                                @endforeach
                            </select>
                            @error('bidang_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success me-2">Simpan</button>
                        <a href="{{ url('arsip', []) }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
