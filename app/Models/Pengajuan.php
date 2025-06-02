<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_acara',
        'apa_barang',
        'tanggal_pengajuan',
        'nominal_uang',
        'status', 
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'status' => 'string',
    ];
}