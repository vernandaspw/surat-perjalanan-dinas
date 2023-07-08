<?php

namespace App\Http\Livewire;

use App\Models\Arsip;
use App\Models\Bidang;
use App\Models\Kantor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArsipCreate extends Component
{

    use WithFileUploads;

    public $no, $tanggal, $perihal, $No_Rak, $foto, $kantor_id, $bidang_id;
    public $kantors = [], $bidangs = [];

    public function render()
    {
        $this->kantors = Kantor::latest()->get();
        if ($this->kantor_id) {
            $this->bidangs = Bidang::where('kantor_id', $this->kantor_id)->latest()->get();
        }

        return view('livewire.arsip-create')->extends('layouts.app')->section('content');
    }

    public function store()
    {
        if ($this->foto) {
            $file = $this->foto->store('file');
        }
        Arsip::create([
            'No' => $this->no,
            'Tanggal' => $this->tanggal,
            'Perihal'=> $this->perihal,
            'No_Rak' => $this->No_Rak,
            'Foto' => $file,
            'kantor_id' => $this->kantor_id,
            'bidang_id' => $this->bidang_id
        ]);

        $storage = Storage::disk('public');
        if ($storage) {
            foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
                $storage->delete($filePathname);
            }
        }

        session()->flash('success', 'berhasil menambahkan arsip');
    }
}
