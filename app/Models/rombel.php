<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombel extends Model
{
    use HasFactory;

    protected $table = "rombel";

    protected $primaryKey = "Kode_rombel";
    protected $keyType = 'string';

    protected $fillable = [
        'Nama_rombel', 'Tingkat', 'Semester', 'Tahun_pelajaran', 'Kurikulum', 'Kode_ruang', 
        'ID_staff', 'Jurusan_SP_ID'
    ];
}
