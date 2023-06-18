<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombel extends Model
{
    use HasFactory;

    protected $fillable = [
        'Kode_rombel', 'Nama_rombel', 'Tingkat', 'Semester', 'Tahun_pelajaran', 'Kurikulum'
    ];
}
