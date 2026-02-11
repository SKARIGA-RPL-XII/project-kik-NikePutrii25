<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RekapSetoran;
use App\Models\Pembayaran;
use App\Models\SetoranSusu;
use App\Models\HargaSusu;
use App\Models\Peternak;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserRekapController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->get('bulan', now()->month);
        $tahun = $request->get('tahun', now()->year);

        $idPeternak = Peternak::where('id_user', auth()->user()->id_user)
            ->value('id_peternak');

        if (!$idPeternak) {
            return view('users.rekap', [
                'rekap'          => null,
                'rekapBulanLalu' => null,
                'rataKadarAir'   => 0,
                'grafik'         => collect(),
                'harga'          => null,
                'bulan'          => $bulan,
                'tahun'          => $tahun
            ]);
        }

        $rekap = RekapSetoran::with('pembayaran')
            ->where('id_peternak', $idPeternak)
            ->where('periode_bulan', $bulan)
            ->where('periode_tahun', $tahun)
            ->first();

        $bulanLalu = Carbon::create($tahun, $bulan, 1)->subMonth();

        $rekapBulanLalu = RekapSetoran::where('id_peternak', $idPeternak)
            ->where('periode_bulan', $bulanLalu->month)
            ->where('periode_tahun', $bulanLalu->year)
            ->first();

        $rataKadarAir = SetoranSusu::where('id_peternak', $idPeternak)
            ->whereMonth('tgl_setor', $bulan)
            ->whereYear('tgl_setor', $tahun)
            ->where('status_setor', 'diterima')
            ->avg('kadar_air');

        $grafik = SetoranSusu::selectRaw('DATE(tgl_setor) as tanggal, SUM(jumlah_setor) as total')
            ->where('id_peternak', $idPeternak)
            ->where('status_setor', 'diterima')
            ->whereBetween('tgl_setor', [
                now()->subDays(6)->startOfDay(),
                now()->endOfDay()
            ])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $harga = HargaSusu::first();

        return view('users.rekap', [
            'rekap'          => $rekap,
            'rekapBulanLalu' => $rekapBulanLalu,
            'rataKadarAir'   => $rataKadarAir,
            'grafik'         => $grafik,
            'harga'          => $harga,
            'bulan'          => $bulan,
            'tahun'          => $tahun
        ]);
    }
}
