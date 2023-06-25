<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'agencia',
        'userID',
        'saldo',
        'limite',
        'chavePIX'
    ];

    public $timestamps = false;
}
