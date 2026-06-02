<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil.');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            session([
                'role' => 'user'
            ]);

            return redirect('/events');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'prodi_code' => 'required',
            'admin_password' => 'required'
        ]);

        $adminPassword = 'adminsaweumipa';

        if ($request->admin_password !== $adminPassword) {
            return back()->with('error', 'Password admin salah.');
        }

        $prodiMap = [
            '10' => 'Matematika',
            '20' => 'Fisika',
            '30' => 'Kimia',
            '40' => 'Biologi',
            '50' => 'Manajemen Informatika',
            '70' => 'Informatika',
            '80' => 'Statistika',
            '90' => 'Farmasi',
            '00' => 'BEM MIPA',
        ];

        $kode = $request->prodi_code;

        if (!array_key_exists($kode, $prodiMap)) {
            return back()->with('error', 'Kode prodi tidak valid.');
        }

        session([
            'role' => 'admin',
            'admin_code' => $kode,
            'admin_prodi' => $prodiMap[$kode]
        ]);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}