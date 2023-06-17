<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";
    protected $fillable = ["NISN", "NIK", "Nama_lengkap", "Jenis_kelamin", "Tanggal_lahir", "Nama_ibuKandung", "NPSN"];
    protected $primaryKey = "id";
    public $timestamps = false;
}
