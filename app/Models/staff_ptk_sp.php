<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff_ptk_sp extends Model
{
    use HasFactory;
    protected $table = "staff_ptk_sp";

    protected $primaryKey = "ID";

    protected $fillable = ["ID_staff", "Kode_PTK", "NPSN","Mulai_menjabat", "Akhir_menjabat", "Status"];
    public $timestamps = false;
}