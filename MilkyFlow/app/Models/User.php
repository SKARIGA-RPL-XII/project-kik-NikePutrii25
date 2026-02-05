<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $primaryKey = 'id_user'; // SESUAI DB
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'status_akun',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
    public function peternak()
    {
        return $this->hasOne(Peternak::class, 'id_user');
    }

}
