<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int'; 
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'status_akun',
        'last_login',
        'id_kelompok'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;

    public function peternak()
    {
        return $this->hasOne(Peternak::class, 'id_user', 'id_user');
    }
}
