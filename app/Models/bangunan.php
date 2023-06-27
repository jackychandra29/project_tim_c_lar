<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bangunan extends Model
{
    use HasFactory;
    protected $table = "bangunan";

    protected $primaryKey = "Kode_bangunan";
    protected $keyType = 'string';

    protected $fillable = ["Kode_bangunan","Nama_bangunan", "NPSN"];
    public $timestamps = true;
}
