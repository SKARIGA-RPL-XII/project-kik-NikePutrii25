<?php

namespace App\Models;

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
}
