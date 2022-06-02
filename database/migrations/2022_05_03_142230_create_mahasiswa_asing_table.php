<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaAsingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_asing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_mhs');
            $table->string('npm_mhs')->unique();
            $table->foreignId('id_jurusan');
            $table->foreignId('id_penilaian');
            $table->string('keterangan');
            $table->string('kelas');
            $table->string('nama_univ');
            $table->string('jenis_kelamin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_asing');
    }
}
