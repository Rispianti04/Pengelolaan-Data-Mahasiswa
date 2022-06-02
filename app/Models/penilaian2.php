<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian2 extends Model
{  
    use HasFactory;
    public $table = "seleksi_mahasiswa2";
    
    public function Mhsasing(){
        return $this->belongsTo(Mhsasing::class,);
    }
    public function isAdmin()
    {
        return $this->admin;
    }
}
