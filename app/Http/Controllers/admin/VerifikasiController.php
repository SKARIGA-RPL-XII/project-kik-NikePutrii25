<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetoranSusu;
use App\Models\KelompokSusu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = SetoranSusu::with(['peternak.user', 'kelompok'])
            ->orderBy('tgl_setor', 'desc');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {

                $q->whereHas('peternak.user', function ($sub) use ($request) {
                    $sub->where('nama', 'like', '%' . $request->search . '%');
                });

                $q->orWhere('tgl_setor', 'like', '%' . $request->search . '%');
                $q->orWhere('status_setor', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tgl_setor', $request->tanggal);
        }

        if ($request->filled('status')) {
            $query->where('status_setor', $request->status);
        }

        if ($request->filled('waktu')) {
            $query->where('waktu_setor', $request->waktu);
        }

        $perPage = $request->input('per_page', 5);

        $data = $query
            ->paginate($perPage)
            ->appends($request->query());

        $kelompok = KelompokSusu::all();

        return view('admin.verifikasi.index', compact('data', 'kelompok'));
    }

    public function verifikasi(Request $request, $id)
    {
        $setoran = SetoranSusu::findOrFail($id);

        if ($setoran->status_setor !== 'menunggu') {
            return response()->json([
                'success' => false,
                'message' => 'Setoran sudah diverifikasi.'
            ], 400);
        }

        $request->validate([
            'status_setor' => 'required|in:diterima,ditolak',
            'id_kelompok' => 'required_if:status_setor,diterima',
            'keterangan' => 'required_if:status_setor,ditolak',
        ]);

        DB::beginTransaction();

        try {

            $setoran->status_setor = $request->status_setor;

            if ($request->status_setor === 'diterima') {
                $setoran->id_kelompok = $request->id_kelompok;
                $setoran->keterangan = $request->keterangan ?? null;
            } else {
                $setoran->id_kelompok = null;
                $setoran->keterangan = $request->keterangan;
            }

            $setoran->verified_at = now();
            $setoran->save();

            DB::table('verifikasi_setoran')->insert([
                'id_setoran' => $setoran->id_setoran,
                'id_user' => Auth::id(),
                'status_verif' => $request->status_setor,
                'tgl_verif' => now(),
                'catatan' => $request->keterangan,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'status' => $request->status_setor
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
