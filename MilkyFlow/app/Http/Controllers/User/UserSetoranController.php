<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SetoranSusu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peternak;
use Carbon\Carbon;

class UserSetoranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tgl_setor' => 'required|date',
            'waktu_setor' => 'required|in:pagi,sore',
            'jumlah_setor' => 'required|numeric|min:0.1',
            'kadar_air' => 'nullable|numeric|min:0|max:100',
        ]);

        $idPeternak = Peternak::where('id_user', Auth::user()->id_user)->value('id_peternak');

        if (!$idPeternak) {
            return back()->withErrors([
                'peternak' => 'Akun Anda belum terdaftar sebagai peternak.'
            ]);
        }

        SetoranSusu::create([
            'id_peternak' => $idPeternak,
            'id_kelompok' => Auth::user()->id_kelompok,
            'tgl_setor' => $request->tgl_setor,
            'waktu_setor' => $request->waktu_setor,
            'jumlah_setor' => $request->jumlah_setor,
            'kadar_air' => $request->kadar_air,
            'status_setor' => 'menunggu',
        ]);


        return redirect()->route('users.dashboard')
            ->with('success', 'Setoran berhasil disimpan');
    }

    public function riwayat(Request $request)
    {
        $userId = auth()->user()->id_user;

        $idPeternak = Peternak::where('id_user', $userId)
            ->value('id_peternak');

        if (!$idPeternak) {
            return view('users.riwayat', [
                'riwayatSetoran' => collect(),
                'bulan' => null
            ]);
        }

        $query = SetoranSusu::where('id_peternak', $idPeternak);

        if ($request->filled('bulan')) {
            $bulan = Carbon::createFromFormat('Y-m', $request->bulan);
            $query->whereMonth('tgl_setor', $bulan->month)
                ->whereYear('tgl_setor', $bulan->year);
        }

        $riwayatSetoran = $query
            ->orderBy('tgl_setor', 'desc')
            ->get();

        return view('users.riwayat', [
            'riwayatSetoran' => $riwayatSetoran,
            'bulan' => $request->bulan
        ]);
    }

    public function update(Request $request, $id_setoran)
    {
        $request->validate([
            'tgl_setor' => 'required|date',
            'waktu_setor' => 'required|in:pagi,sore',
            'jumlah_setor' => 'required|numeric|min:0.1',
            'kadar_air' => 'nullable|numeric|min:0|max:100',
        ]);

        $idPeternak = Peternak::where('id_user', auth()->user()->id_user)
            ->value('id_peternak');

        $setoran = SetoranSusu::where('id_setoran', $id_setoran)
            ->where('id_peternak', $idPeternak)
            ->where('status_setor', 'menunggu')
            ->firstOrFail();

        $setoran->update([
            'tgl_setor' => $request->tgl_setor,
            'waktu_setor' => $request->waktu_setor,
            'jumlah_setor' => $request->jumlah_setor,
            'kadar_air' => $request->kadar_air,
        ]);

        return redirect()
            ->route('users.riwayat')
            ->with('success', 'Setoran berhasil diperbarui.');
    }
}
