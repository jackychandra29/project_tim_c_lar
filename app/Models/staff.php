<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    protected $table = "staff";

    protected $primaryKey = "ID_staff";
    protected $keyType = 'string';
    
    protected $fillable = ["NUPTK", "Nama_lengkap", "NIK","NIP", "Jenis_kelamin", "Tanggal_lahir","Induk"];
    public $timestamps = false;
}
