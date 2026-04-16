<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetoranSusu;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? now()->month;
        $tahun = $request->tahun ?? now()->year;

        $query = SetoranSusu::with('peternak.user')
            ->select(
                'id_peternak',
                'waktu_setor',
                DB::raw('DATE(tgl_setor) as tanggal'),
                DB::raw('SUM(jumlah_setor) as total_liter'),
                DB::raw('COUNT(*) as jumlah_setoran')
            )
            ->where('status_setor','diterima')
            ->whereMonth('tgl_setor',$bulan)
            ->whereYear('tgl_setor',$tahun)
            ->groupBy('id_peternak','waktu_setor','tanggal');

        if ($request->filled('search')) {
            $query->whereHas('peternak.user', function ($q) use ($request) {
                $q->where('nama','like','%'.$request->search.'%');
            });
        }

        if ($request->filled('waktu')) {
            $query->where('waktu_setor',$request->waktu);
        }

        $data = $query
            ->orderBy('tanggal','desc')
            ->get();

        return view('admin.rekap.index', compact('data','bulan','tahun'));
    }
}