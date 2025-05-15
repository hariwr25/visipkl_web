<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'institusi',
        'alamat',
        'tanggal_kunjungan',
        'jumlah_peserta',
        'kontak_person',
    ];
}
