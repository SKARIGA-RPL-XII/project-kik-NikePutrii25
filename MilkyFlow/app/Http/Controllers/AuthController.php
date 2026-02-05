<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peternak;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email belum terdaftar'
            ])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah'
            ])->withInput();
        }

        if ($user->status_akun !== 'aktif') {
            return back()->withErrors([
                'email' => 'Akun Anda tidak aktif'
            ]);
        }

        Auth::login($user, $request->has('remember'));

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'users') {
            return redirect()->route('users.dashboard');
        }

        Auth::logout();
        return redirect('/login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::transaction(function () use ($request) {

            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'users',
                'status_akun' => 'aktif',
            ]);

            Peternak::create([
                'id_user' => $user->id_user, // ✅ BUKAN $user->id
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'tanggal_gabung' => now(),
                'status_peternak' => 1,
            ]);
        });

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }
}
