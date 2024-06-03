<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'namapegawai',

        'id_pegawai',

        'alamat',
    ];
}
