<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'transaksi_pembayaran';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_rekap',
        'potongan',
        'total_bersih',
        'tanggal_pembayaran'
    ];

    public function rekap()
    {
        return $this->belongsTo(RekapSetoran::class, 'id_rekap');
    }
}
