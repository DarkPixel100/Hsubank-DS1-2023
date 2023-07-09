<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = [
        'userID',
        'loginTime',
        'logoutTime',
    ];

    protected $casts = [
        'loginTime' => 'datetime',
        'logoutTime' => 'datetime',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
