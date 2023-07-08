<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $datas = Arsip::latest()->get();
        return view('arsip', compact('datas'));
    }

    public function delete($id)
    {
       $d = Arsip::find($id);
        Storage::delete($d->Foto);
        $d->delete();
        session()->flash('success', 'berhasil hapus');
        return redirect()->back();
    }
}
