<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ptk extends Model
{
    use HasFactory;

    protected $table = "ptk";

    protected $primaryKey = "Kode_PTK";
    protected $keyType = 'string';

    protected $fillable = ["Jenis_PTK"];
    
    public $timestamps = true;
}
