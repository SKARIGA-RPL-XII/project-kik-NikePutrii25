<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peternak;
use App\Models\KelompokSusu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeternakController extends Controller
{
    public function index(Request $request)
    {

        $peternak = Peternak::with(['user', 'kelompok'])
            ->when($request->search_peternak, function ($q) use ($request) {
                $q->whereHas('user', function ($u) use ($request) {
                    $u->where('nama', 'like', '%' . $request->search_peternak . '%');
                });
            })
            ->get();

        $akun = User::where('role', 'users')
            ->when($request->search_akun, function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->search_akun . '%');
            })
            ->get();

        $kelompok = KelompokSusu::all();

        return view('admin.peternak.index', compact('peternak', 'akun', 'kelompok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:100',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6',
            'no_hp'       => 'required',
            'alamat'      => 'required',
            'id_kelompok' => 'required|exists:kelompok_susu,id_kelompok',
        ]);

        DB::transaction(function () use ($request) {

            $user = User::create([
                'nama'        => $request->nama,
                'email'       => $request->email,
                'password'    => Hash::make($request->password),
                'role'        => 'users',
                'status_akun' => 'aktif',
            ]);

            Peternak::create([
                'id_user'        => $user->id,
                'id_kelompok'    => $request->id_kelompok,
                'alamat'         => $request->alamat,
                'no_hp'          => $request->no_hp,
                'tanggal_gabung' => now(),
                'status_peternak'=> 1,
            ]);
        });

        return redirect()->back()->with('success', 'Peternak berhasil ditambahkan');
    }

    public function edit($id)
    {
        $peternak = Peternak::with(['user', 'kelompok'])->findOrFail($id);
        return response()->json($peternak);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'        => 'required',
            'email'       => 'required|email',
            'no_hp'       => 'required',
            'alamat'      => 'required',
            'id_kelompok' => 'required|exists:kelompok_susu,id_kelompok',
        ]);

        DB::transaction(function () use ($request, $id) {

            $peternak = Peternak::findOrFail($id);
            $user = $peternak->user;

            $user->update([
                'nama'  => $request->nama,
                'email' => $request->email,
            ]);

            $peternak->update([
                'no_hp'       => $request->no_hp,
                'alamat'      => $request->alamat,
                'id_kelompok' => $request->id_kelompok,
            ]);
        });

        return redirect()->back()->with('success', 'Data peternak berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $peternak = Peternak::findOrFail($id);
            $user = $peternak->user;

            $peternak->delete();
            $user->delete();
        });

        return redirect()->back()->with('success', 'Peternak berhasil dihapus');
    }

    public function toggleStatus(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->status_akun = $user->status_akun === 'aktif'
            ? 'nonaktif'
            : 'aktif';

        $user->save();

        return response()->json([
            'status' => $user->status_akun
        ]);
    }
}
