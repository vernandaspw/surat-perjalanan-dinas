<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $datas = User::latest()->get();
        return view('akun.akun', compact('datas'));
    }

    public function create()
    {
        return view('akun.akun_create');
    }

    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        session()->flash('success', 'berhasil tambah akun');
        return redirect()->back();
    }

    public function nonaktif($id)
    {
        $d = User::find($id);
        $d->update([
            'isaktif' => false,
        ]);
        session()->flash('success', 'berhasil nonaktifkan');
        return redirect()->back();
    }
    public function aktif($id)
    {
        $d = User::find($id);
        $d->update([
            'isaktif' => true,
        ]);
        session()->flash('success', 'berhasil nonaktifkan');
        return redirect()->back();
    }
}
