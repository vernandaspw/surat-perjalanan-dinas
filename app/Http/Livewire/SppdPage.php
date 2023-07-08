<?php

namespace App\Http\Livewire;

use App\Models\SuratPerintahPerjalananDinas;
use Livewire\Component;

class SppdPage extends Component
{
    public function render()
    {
        $this->datas = SuratPerintahPerjalananDinas::latest()->get();
        return view('livewire.sppd-page')->extends('layouts.app')->section('content');
    }

    public $ID;
    public $buatPage = false;

    public $cetakPage = false;
    public $dataC;
    public function cetakPageTrue($id)
    {
       $data = SuratPerintahPerjalananDinas::find($id);

       $this->dataC = $data;

       $this->cetakPage = true;

    }
}
