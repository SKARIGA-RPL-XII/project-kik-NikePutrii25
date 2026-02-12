<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peternak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeternakController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'no_hp' => 'required|digits_between:10,12',
            'alamat' => 'required|string',
        ], [
            'nama.required' => 'Nama peternak wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'no_hp.required' => 'No HP wajib diisi',
            'no_hp.digits_between' => 'No HP harus 10–12 angka',
            'alamat.required' => 'Alamat wajib diisi',
        ]);


        DB::beginTransaction();

        try {
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'users',
                'status_akun' => 'aktif',
            ]);

            Peternak::create([
                'id_user' => $user->id_user,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'status_peternak' => 1,
                'tanggal_gabung' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 5);

        $peternaks = Peternak::with('user')
            ->paginate($perPage)
            ->withQueryString();

        $users = User::where('role', 'users')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.peternak.index', compact('peternaks', 'users'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $peternak = Peternak::with('user')->findOrFail($id);

            $peternak->user->delete();

            DB::commit();

            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $id)
    {
        $peternak = Peternak::findOrFail($id);
        $user = $peternak->user;

        $request->validate([
            'email' => 'nullable|email',
            'no_hp' => 'nullable|digits_between:10,12',
            'nama' => 'nullable|string',
            'alamat' => 'nullable|string',
        ], [
            'email.email' => 'Format email tidak valid',
            'no_hp.digits_between' => 'No HP harus 10–12 digit',
        ]);

        DB::beginTransaction();

        try {
            $user->nama = $request->nama;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            $peternak->update([
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);

            DB::commit();

            return response()->json(['success' => true]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
