<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'kategori',
        'nomor_surat',
        'tanggal_surat',
        'perihal',
        'pengirim',
        'keterangan',
        'file_path',
        'nama_anda',
        'nim_anda'
    ];

    protected $casts = [
        'tanggal_surat' => 'date'
    ];
}
