<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kantor;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        $datas = Bidang::latest()->get();
        return view('bidang.bidang', compact('datas'));
    }

    public function create()
    {
        $kantors = Kantor::latest()->get();
        return view('bidang.bidang_create', compact('kantors'));
    }

    public function store(Request $request)
    {
        Bidang::create([
            'Nama' => $request->nama,
            'Kode' => $request->kode,
            'kantor_id' => $request->kantor_id
        ]);
        session()->flash('success', 'berhasil tambah bidang');
        return redirect()->back();
    }

    public function delete($id)
    {
        Bidang::find($id)->delete();
        session()->flash('success', 'berhasil hapus');
        return redirect()->back();
    }
}
