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
        'limite',
        'chavePIX'
    ];

    public $timestamps = false;


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
