<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HargaSusu;
use App\Models\KelompokSusu;

class HargaController extends Controller
{
    public function index()
    {
        $data = HargaSusu::with('kelompok')
            ->orderBy('tanggal_berlaku', 'desc')
            ->get();

        return view('admin.harga.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelompok_susu' => 'required',
            'harga_per_liter' => 'required|numeric',
            'tanggal_berlaku' => 'required|date',
        ]);

        $kelompok = KelompokSusu::firstOrCreate(
            ['nama_kelompok' => $request->kelompok_susu],
            ['keterangan' => '-']
        );

        $harga = str_replace(['.', ','], '', $request->harga_per_liter);

        HargaSusu::where('id_kelompok', $kelompok->id_kelompok)
            ->update(['status' => 'nonaktif']);

        HargaSusu::create([
            'id_kelompok' => $kelompok->id_kelompok,
            'harga_per_liter' => (int) $harga,
            'tanggal_berlaku' => $request->tanggal_berlaku,
            'status' => 'aktif',
        ]);

        return redirect()
            ->route('admin.harga')
            ->with('success', 'Data harga berhasil disimpan');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kelompok_susu' => 'required|string',
            'harga_per_liter' => 'required',
            'tanggal_berlaku' => 'required|date',
        ]);

        $harga = (int) str_replace(['.', ','], '', $request->harga_per_liter);

        $hargaSusu = HargaSusu::findOrFail($id);

        $kelompok = KelompokSusu::firstOrCreate(
            ['nama_kelompok' => $request->kelompok_susu],
            ['keterangan' => '-']
        );

        $hargaSusu->update([
            'id_kelompok' => $kelompok->id_kelompok,
            'harga_per_liter' => $harga,
            'tanggal_berlaku' => $request->tanggal_berlaku,
        ]);

        return redirect()->back()->with('success', 'Data harga berhasil diperbarui');
    }
    public function destroy($id)
    {
        HargaSusu::findOrFail($id)->delete();

        return redirect()
            ->route('admin.harga')
            ->with('success', 'Data harga berhasil dihapus');
    }
}
