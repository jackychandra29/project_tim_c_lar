<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    use HasFactory;

    protected $table = "ruang";
    protected $fillable = ["Nama_ruang", "Panjang", "Lebar", "Lantai", "Kode_bangunan", "Kode_jenis_ruang"];
    protected $primaryKey = "Kode_ruang";
    public $timestamps = false;
}