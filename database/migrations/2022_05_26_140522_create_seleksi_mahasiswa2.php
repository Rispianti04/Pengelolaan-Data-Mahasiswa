<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiMahasiswa2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksi_mahasiswa2', function (Blueprint $table) {
            $table->increments('id_penilaian');
            $table->string('tahun_akademik');
            $table->string('jml_mhs_asing_aktif');
            $table->string('jml_mhs_asing_full');
            $table->string('jml_mhs_asing_part');
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
        Schema::dropIfExists('seleksi_mahasiswa2');
    }
}
