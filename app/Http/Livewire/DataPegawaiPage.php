<?php

namespace App\Http\Livewire;

use App\Models\DataPegawai;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataPegawaiPage extends Component
{
    public function render()
    {
        $this->datas = DataPegawai::latest()->get();

        return view('livewire.data-pegawai-page')->extends('layouts.app')->section('content');
    }

    use WithFileUploads;

    public $buatPage = false;

    public function buatPageTrue()
    {
        $this->buatPage = true;
    }

    public $img;
    public $nama;
    public $nip;
    public $jk;
    public $no_hp;
    public $email;
    public $alamat;
    public $jabatan;
    public $bidang;

    public function buat()
    {
        if ($this->img) {
            $image = $this->img->store('img');
        }else{
            $image = null;
        }

        DataPegawai::create([
            'img' => $image,
            'nama' => $this->nama,
            'nip' => $this->nip,
            'jk' => $this->jk,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'jabatan' => $this->jabatan,
            'bidang' => $this->bidang,
        ]);

        session()->flash('success', 'berhasil tambah');
        $this->buatPage = false;
    }

    public function hapus($id)
    {
        DataPegawai::find($id)->delete();
    session()->flash('success', 'berhasil hapus');
    }
}
