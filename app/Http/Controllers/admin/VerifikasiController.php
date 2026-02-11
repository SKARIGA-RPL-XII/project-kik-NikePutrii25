<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetoranSusu;
use App\Models\KelompokSusu;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = SetoranSusu::with('peternak')
            ->orderBy('tgl_setor', 'desc')
            ->get();

        $kelompok = KelompokSusu::all();

        return view(
            'admin.verifikasi.index',
            compact('data', 'kelompok')
        );
    }

    public function verifikasi(Request $request, $id)
    {
        $setoran = SetoranSusu::findOrFail($id);

        $setoran->update([
            'status_setor' => $request->status_setor,
            'id_kelompok' => $request->status_setor == 'diterima'
                ? $request->id_kelompok
                : null,
        ]);

        return redirect()->back()->with('success', 'Setoran berhasil diverifikasi');
    }
}
