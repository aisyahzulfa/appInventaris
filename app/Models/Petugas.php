<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $primarykey = 'idpetugas';

    protected $fillable = [
        'namapetugas',
        'password',
        'namapetugas',
        'idlevel'
    ];

    public function levels()
    {
        return $this->belongsTo(level::class);
    }

  
}