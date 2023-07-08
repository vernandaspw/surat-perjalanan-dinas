<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterUserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_proses(Request $req)
    {
        $req->validate([
            'username' => 'required|min:3|max:50|exists:users,username',
            'password' => 'required|min:5|max:20',
        ]);

        $user = User::where('username', $req->username)->first();

        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                if ($user->isaktif) {
                    Auth::attempt(['username' => $req->username, 'password' => $req->password], true);
                    return redirect('/');
                } else {
                    session()->flash('error', 'Akun tidak aktif');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->flash('error', 'password salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->flash('error', 'username tidak ada');
            return redirect()->back()->withInput();
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_process(Request $r)
    {
        $r->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|min:5|max:50|email',
            'password' => 'required|min:6',
        ]);

        $insert = new User();
        $insert->name = $r->name;
        $insert->email = $r->email;
        $insert->password = Hash::make($r->password);
        $insert->save();

        $r->session()->flash('msg', 'Registration Successful.');

        return redirect('register');
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
