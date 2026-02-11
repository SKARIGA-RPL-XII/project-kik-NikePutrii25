<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapSetoran extends Model
{
    protected $table = 'rekap_setoran';
    protected $primaryKey = 'id_rekap';

    public $timestamps = false; 

    protected $fillable = [
        'id_peternak',
        'periode_bulan',
        'periode_tahun',
        'total_liter',
        'total_nilai',
        'created_at'
    ];

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_rekap', 'id_rekap');
    }
}
