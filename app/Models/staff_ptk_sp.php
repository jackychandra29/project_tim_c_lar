<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff_ptk_sp extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "staff_ptk_sp";
    protected $fillable = ["ID_staff", "Kode_PTK", "NPSN","Mulai_menjabat", "Akhir_menjabat", "Status"];
    protected $primaryKey = "ID";
    public $timestamps = false;
}
