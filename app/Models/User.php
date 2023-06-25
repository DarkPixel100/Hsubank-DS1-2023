<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'cpf',
        'fullname',
        'username',
        'email',
        'celular',
        'password'
    ];
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public $timestamps = false;

    public function contas() {
        return $this->hasOne(Conta::class, 'userID');
    }

    public function auditorias() {
        return $this->hasMany(Logs::class, 'userID');
    }
}
