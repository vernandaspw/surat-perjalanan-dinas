<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\DataPegawai;
use App\Models\Kantor;
use App\Models\NotaPermintaanPerjalananDinas;
use App\Models\SuratPerintahPerjalananDinas;
use App\Models\SuratPerintahTugas;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $nppd = NotaPermintaanPerjalananDinas::get()->count();
        $spt = SuratPerintahTugas::get()->count();
        $sppd = SuratPerintahPerjalananDinas::get()->count();
        $pegawai = DataPegawai::get()->count();

        return view('home', compact('nppd', 'spt', 'sppd', 'pegawai'));
    }
}
