<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan_sp extends Model
{
    use HasFactory;
    protected $table = "jurusan_sp";

    protected $primaryKey = 'id';

    protected $fillable = ["NPSN", "kode_jurusan"];
    public $timestamps = true;
}
