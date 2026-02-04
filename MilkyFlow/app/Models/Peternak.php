<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
    protected $table = 'peternak';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'alamat',
        'no_hp',
        'tanggal_gabung',
        'status_peternak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelompok()
    {
        return $this->belongsTo(KelompokSusu::class, 'id_kelompok');
    }

}