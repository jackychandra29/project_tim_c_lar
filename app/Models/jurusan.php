<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";

    protected $primaryKey = 'Kode_jurusan';
    protected $keyType = 'string';

    protected $fillable = ["Nama_jurusan"];
    public $timestamps = false;
}
