<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaSusu extends Model
{
    protected $table = 'harga_susu';
    protected $primaryKey = 'id_harga';
     public $timestamps = false;
    protected $fillable = [
        'id_kelompok',
        'harga_per_liter',
        'tanggal_berlaku',
        'status'
    ];

    public function kelompok()
    {
        return $this->belongsTo(KelompokSusu::class, 'id_kelompok');
    }
}
