<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SetoranSusu;
use App\Models\HargaSusu;
use App\Models\Peternak;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id_user;

        $idPeternak = Peternak::where('id_user', $userId)
            ->value('id_peternak');

        if (!$idPeternak) {

            return view('users.dashboard', [
                'hariIni' => 0,
                'bulanIni' => 0,
                'rataKadarAir' => 0,
                'estimasiPendapatan' => 0,
                'riwayatSetoran' => collect()
            ]);
        }

        $hariIni = SetoranSusu::where('id_peternak', $idPeternak)
            ->whereDate('tgl_setor', Carbon::today())
            ->sum('jumlah_setor');

        $bulanIni = SetoranSusu::where('id_peternak', $idPeternak)
            ->whereMonth('tgl_setor', Carbon::now()->month)
            ->whereYear('tgl_setor', Carbon::now()->year)
            ->sum('jumlah_setor');

        $rataKadarAir = SetoranSusu::where('id_peternak', $idPeternak)
            ->whereMonth('tgl_setor', Carbon::now()->month)
            ->whereNotNull('kadar_air')
            ->avg('kadar_air');

        $harga = HargaSusu::where('status', 'aktif')->first();
        $estimasiPendapatan = $bulanIni * ($harga->harga_per_liter ?? 0);

        $riwayatSetoran = SetoranSusu::where('id_peternak', $idPeternak)
            ->whereDate('tgl_setor', '>=', Carbon::now()->subDays(7))
            ->orderBy('tgl_setor', 'desc')
            ->get();

        return view('users.dashboard', compact(
            'hariIni',
            'bulanIni',
            'rataKadarAir',
            'estimasiPendapatan',
            'riwayatSetoran'
        ));
    }
}
