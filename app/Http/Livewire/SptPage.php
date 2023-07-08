<?php

namespace App\Http\Livewire;

use App\Models\SuratPerintahPerjalananDinas;
use App\Models\SuratPerintahTugas;
use Livewire\Component;

class SptPage extends Component
{
    public function render()
    {
        $this->datas = SuratPerintahTugas::latest()->get();

        return view('livewire.spt-page')->extends('layouts.app')->section('content');
    }

    public $ID;
    public $buatPage = false;
    public $pejabat;
    public $tgl_berangkat;
    public $tgl_kembali;
    public $keterangan;


    public function buatSPPDPage($id)
    {
        $this->ID  = $id;
        $this->buatPage = true;
    }
    public function buatSPPD()
    {
        $spt = SuratPerintahTugas::find($this->ID);
        // dd($spt->nppd->nppd_pegawai);
        foreach ($spt->nppd->nppd_pegawai as  $value) {
            SuratPerintahPerjalananDinas::create([
                'no' => SuratPerintahPerjalananDinas::generateNomorSurat(),
                'data_pegawai_id' => $value->data_pegawai_id,
                'spt_id' => $spt->id,
                'pejabat_pemberi_perintah' => $this->pejabat,
                'tgl_berangkat' => $this->tgl_berangkat,
                'tgl_kembali' => $this->tgl_kembali,
                'keterangan' => $this->keterangan
            ]);

        }

        $this->buatPage = false;
    }

    public $cetakPage = false;
    public $dataC;
    public function cetakPageTrue($id)
    {
       $data = SuratPerintahTugas::find($id);

       $this->dataC = $data;

       $this->cetakPage = true;

    }
}
