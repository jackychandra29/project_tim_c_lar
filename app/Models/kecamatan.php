<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $table = "kecamatan";

    protected $primaryKey = "Kode_kecamatan";
    protected $keyType = 'string';

    protected $fillable = ["Nama_kecamatan", "Kode_kabKota"];
    public $timestamps = true;
}
