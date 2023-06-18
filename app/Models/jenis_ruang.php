<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ruang extends Model
{
    use HasFactory;

    protected $table = "jenis_ruang";
    protected $fillable = ["Jenis_ruang"];
    protected $primaryKey = "Kode_jenis_ruang";
    public $timestamps = true;
}
