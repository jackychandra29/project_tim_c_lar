<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $table = "kecamatan";
    protected $fillable = ["Nama_kecamatan", "Kode_kabKota"];
    protected $primaryKey = "Kode_kecamatan";
    public $timestamps = true;
}
