<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kabkota extends Model
{
    use HasFactory;

    protected $table = "kabkota";
    
    protected $primaryKey = "Kode_kabKota";
    protected $keyType = 'string';

    protected $fillable = ["Nama_kabKota"];
    public $timestamps = true;
}
