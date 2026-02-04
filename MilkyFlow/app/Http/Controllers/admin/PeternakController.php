<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peternak;
use App\Models\KelompokSusu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PeternakController extends Controller
{
    // ===============================
    // LIST DATA + SEARCH
    // ===============================
    public function index(Request $request)
    {
        $peternak = Peternak::with('user', 'kelompok')
            ->when($request->search, function ($q) use ($request) {
                $q->whereHas('user', function ($u) use ($request) {
                    $u->where('nama', 'like', '%' . $request->search . '%');
                });
            })
            ->get();

        $kelompok = KelompokSusu::all();

        return view('admin.peternak.index', compact('peternak', 'kelompok'));
    }

    public function search(Request $request)
    {
        return redirect()->route('admin.peternak', [
            'search' => $request->search
        ]);
    }

    // ===============================
    // TAMBAH PETERNAK (MODAL SIMPAN)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'alamat' => 'required',
            'id_kelompok' => 'required',
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
                'id_user' => $user->id,
                'id_kelompok' => $request->id_kelompok,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'tanggal_gabung' => now(),
                'status_peternak' => 1,
            ]);
        });

        return redirect()->back()
            ->with('success', 'Data peternak berhasil ditambahkan');
    }

    // ===============================
    // FORM EDIT (MODAL EDIT)
    // ===============================
    public function edit($id)
    {
        $peternak = Peternak::with('user')->findOrFail($id);
        return response()->json($peternak);
    }

    // ===============================
    // UPDATE DATA
    // ===============================
    public function update(Request $request, $id)
    {
        $peternak = Peternak::findOrFail($id);
        $user = $peternak->user;

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        $peternak->update([
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()
            ->with('success', 'Data peternak berhasil diperbarui');
    }

    // ===============================
    // HAPUS DATA (MODAL KONFIRMASI)
    // ===============================
    public function destroy($id)
    {
        $peternak = Peternak::findOrFail($id);
        $user = $peternak->user;

        $peternak->delete();
        $user->delete();

        return redirect()->back()
            ->with('success', 'Data peternak berhasil dihapus');
    }
}
