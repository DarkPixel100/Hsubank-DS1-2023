<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChavePix extends Model
{
    use HasFactory;

    protected $table = 'chavespix';

    protected $fillable = [
        'contaID',
        'chavePix'
    ];

    public $timestamps = false;

    public function ownerAcc()
    {
        return $this->belongsTo(Conta::class, 'contaID', 'id');
    }
}
