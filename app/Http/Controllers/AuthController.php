<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('authViews.authLogin');
    }

    public function register()
    {
        return view('authViews.authRegister');
    }

    public function store(Request $r)
{
    // Validasi input
    $validated = $r->validate([
        'name' => 'required|max:255',
        'phone' => 'nullable|max:255|unique:users',
        'password' => 'required|max:255',
        'address' => 'required|max:255',
    ]);

    // Hash password
    $validated['password'] = Hash::make($r->password);

    // Buat user baru
    User::create($validated);

    // Logout user jika masih login dan kembalikan pesan sukses
    Auth::logout();

    return redirect('/register')->with('status', 'success')->with('msg', 'Silahkan kembali ke halaman Login >//<');
}


    public function authenticate(Request $r)
{

   

    $credentials = $r->validate([
        'phone' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $r->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->intended('/dashboard');
        } else {
            return redirect('/user-items');
        }
    }

    // Simpan pesan di session menggunakan kunci 'status'
    return redirect('/login')->with('status', 'Username atau Password salah');
}



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
