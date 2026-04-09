<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // VALIDASI INPUT
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // CEK USER BERDASARKAN EMAIL
        $user = User::where('email', $request->email)->first();

        // ❌ EMAIL TIDAK DITEMUKAN
        if (!$user) {
            return back()->with('error', 'Email salah');
        }

        // ❌ PASSWORD SALAH
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        // ❌ EMAIL & PASSWORD SALAH (fallback tambahan)
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Email dan password anda salah');
        }

        // ✅ LOGIN BERHASIL
        $request->session()->regenerate();

        // AMBIL ROLE (AMAN)
        if (!$user->role) {
            Auth::logout();
            return back()->with('error', 'Role tidak ditemukan');
        }

        $role = strtolower($user->role->name);

        // 🔥 REDIRECT BERDASARKAN ROLE
        switch ($role) {
            case 'admin':
                return redirect()->route('welcome');

            case 'karyawan':
                return redirect()->route('barang.index');

            case 'kasir':
                return redirect()->route('kasir.index');

            default:
                Auth::logout();
                return back()->with('error', 'Role tidak dikenali');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}