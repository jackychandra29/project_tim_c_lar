<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ptk extends Model
{
    use HasFactory;

    protected $table = "ptk";
    protected $fillable = ["Jenis_PTK"];
    protected $primaryKey = "Kode_PTK";
    public $timestamps = true;
}
