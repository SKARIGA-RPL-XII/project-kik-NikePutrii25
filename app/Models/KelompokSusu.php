<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokSusu extends Model
{
    protected $table = 'kelompok_susu';
    protected $primaryKey = 'id_kelompok';
    public $timestamps = false;

    protected $fillable = ['nama_kelompok', 'keterangan'];

    public function harga()
    {
        return $this->hasMany(HargaSusu::class, 'id_kelompok');
    }
}
