<?php

namespace App\Http\Livewire;

use App\Models\RincianBiaya;
use App\Models\SuratPerintahPerjalananDinas;
use Livewire\Component;
use Livewire\WithFileUploads;

class RincianBiayaPage extends Component
{
    public function render()
    {
        $this->datas = RincianBiaya::where('sppd_id', $this->ID)->get();

        $this->total = $this->datas->sum('biaya');
        return view('livewire.rincian-biaya-page')->extends('layouts.app')->section('content');
    }

    use WithFileUploads;

    public function mount($id)
    {
        $this->ID = $id;
        $data = SuratPerintahPerjalananDinas::find($id);
        $this->no_sppd = $data->no;

        // dd($data->riwayat_biaya);
        // $this->total =
    }

    public $buatPage = false;
    public $ID;
    public $no_sppd;
    public $total;
    public $keterangan;
    public $biaya;
    public $struk;

    public function buatPageTrue()
    {
        $this->buatPage = true;
    }

    public function tambahRincian()
    {
        if ($this->struk) {
            $img = $this->struk->store('img');
        }else{
            $img = null;
        }

        $data = RincianBiaya::create([
            'sppd_id' => $this->ID,
            'keterangan' => $this->keterangan,
            'biaya' => $this->biaya,
            'struk' => $img,
        ]);

        session()->flash('success', 'berhasil buat');
        $this->buatPage = false;
        // $this->total = $total;
    }

    public function hapus($id)
    {
        RincianBiaya::find($id)->delete();
    }
}
