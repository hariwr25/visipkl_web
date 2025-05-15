<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'instansi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
