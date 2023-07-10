<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'contas';

    protected $fillable = [
        'agencia',
        'userID',
        'saldo',
        'limite'
    ];

    public $timestamps = false;

    public function owner()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function chaves()
    {
        return $this->hasMany(ChavePix::class, 'contaID', 'id');
    }
}
