<?php

namespace App\Models;
use App\Models\penilaian;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class Mahasiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */
    public $table = "mahasiswa";
    protected $fillable = [
        'name_mhs',
        'npm',
        'id_jurusan',
        'tahun_masuk',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    public function jurusan(){
        return $this->hasOne(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function penilaian(){
        return $this->hasOne(Penilaian::class, 'id_penilaian', 'id_penilaian');
    }

}
