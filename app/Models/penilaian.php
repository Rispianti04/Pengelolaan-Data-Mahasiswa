<?php

namespace App\Models;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    public $table = "seleksi_mahasiswa";

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function isAdmin()
    {
        return $this->admin;
    }
}
