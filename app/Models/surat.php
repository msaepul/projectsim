<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;
    protected $fillable = [
    'jenis_surat',
    'nama_surat',
    'berlaku',
    'cabang_id',
    'kode'
    ];
}
