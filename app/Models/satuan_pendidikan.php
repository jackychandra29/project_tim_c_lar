<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan_pendidikan extends Model
{
    use HasFactory;

    protected $table = "satuan_pendidikan";

    protected $primaryKey = "NPSN";
    protected $keyType = 'string';
    
    protected $fillable = ["Nama_SP", "Bentuk_pendidikan", "Status_sekolah", "Kode_kecamatan", "Kode_kabKota"];
    public $timestamps = false;
}
