<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class SetoranSusu extends Model
{
    protected $table = 'setoran_susu';
    protected $primaryKey = 'id_setoran';

    public $timestamps = false;

    protected $fillable = [
        'id_peternak',
        'id_kelompok',
        'tgl_setor',
        'waktu_setor',
        'jumlah_setor',
        'kadar_air',
        'status_setor',
    ];
    public function peternak()
    {
        return $this->belongsTo(Peternak::class, 'id_peternak', 'id_peternak');
    }

    public function kelompok()
    {
        return $this->belongsTo(KelompokSusu::class, 'id_kelompok');
    }
}
