<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kabkota extends Model
{
    use HasFactory;

    protected $table = "kabkota";
    protected $fillable = ["Nama_kabKota"];
    protected $primaryKey = "Kode_kabKota";
    public $timestamps = true;
}
