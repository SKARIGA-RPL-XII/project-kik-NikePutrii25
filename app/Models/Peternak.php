<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
    protected $table = 'peternak';
    protected $primaryKey = 'id_peternak';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'no_hp',
        'alamat',
        'status_peternak',
        'tanggal_gabung'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
