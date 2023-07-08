<?php

namespace App\Http\Livewire;

use App\Models\DataPegawai;
use App\Models\NotaPermintaanPerjalananDinas;
use App\Models\NppdPegawai;
use App\Models\SuratPerintahTugas;
use Livewire\Component;

class NppdPage extends Component
{
    public function render()
    {
        $this->pegawais = DataPegawai::get();
        $this->datas = NotaPermintaanPerjalananDinas::latest()->get();
        return view('livewire.nppd-page')->extends('layouts.app')->section('content');
    }
    public $buatPage = false;

    public function buatPageTrue()
    {
        $this->buatPage = true;
    }

    public $tempat_tujuan;
    public $perihal;

    public $pegawai = [];

    public function buat()
    {

        $nppd = NotaPermintaanPerjalananDinas::create([
            'tempat_tujuan' => $this->tempat_tujuan,
            'perihal' => $this->perihal,
            'status' => 'menunggu',
        ]);

        if ($this->pegawai) {
            foreach ($this->pegawai as $key => $value) {
                NppdPegawai::create([
                    'nppd_id' => $nppd->id,
                    'data_pegawai_id' => $value,
                ]);
            }
        }

        session()->flash('success', 'berhasil buat');
        $this->buatPage = false;
    }

    public $ID;

    public function sejutui($id)
    {
        NotaPermintaanPerjalananDinas::find($id)->update([
            'status' => 'disetujui'
        ]);
        session()->flash('success', 'berhasil disetujui');
    }

    public function buatSPT($id)
    {
        $nppd = NotaPermintaanPerjalananDinas::find($id);

        $no = SuratPerintahTugas::generateNomorSurat();
        SuratPerintahTugas::create([
            'no' => $no,
            'nppd_id' => $nppd->id
        ]);

        session()->flash('success', 'berhasil buat SPT');


    }

    public $cetakPage = false;
    public $dataC;
    public function cetakPageTrue($id)
    {
       $data = NotaPermintaanPerjalananDinas::find($id);

       $this->dataC = $data;

       $this->cetakPage = true;

    }
}
