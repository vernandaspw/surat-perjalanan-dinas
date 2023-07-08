<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index()
    {
        $datas = Kantor::latest()->get();
        return view('kantor.kantor', compact('datas'));
    }

    public function create()
    {
        return view('kantor.kantor_create');
    }

    public function store(Request $request)
    {
        Kantor::create([
            'Nama' => $request->nama,
            'Telp' => $request->telp,
            'Alamat' => $request->alamat
        ]);
        session()->flash('success', 'berhasil tambah kantor');
        return redirect()->back();
    }

    public function delete($id)
    {
        Kantor::find($id)->delete();
        session()->flash('success', 'berhasil hapus');
        return redirect()->back();
    }
}
