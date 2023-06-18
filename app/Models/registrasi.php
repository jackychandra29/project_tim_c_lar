<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrasi extends Model
{
    use HasFactory;

    protected $table = "registrasi";
    protected $fillable = ["ID_siswa", "Kode_rombel"];
    protected $primaryKey = "";
    public $timestamps = true;
}
