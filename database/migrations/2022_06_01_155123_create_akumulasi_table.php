<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkumulasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akumulasi', function (Blueprint $table) {
            $table->id('id_akumulasi');
            $table->string('tahun_akademik');
            $table->string('jml_calon_mhs_baru_reguler');
            $table->string('jml_calon_mhs_baru_transfer');
            $table->string('jml_calon_mhs_aktif_reguler');
            $table->string('jml_calon_mhs_aktif_transfer');
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
        Schema::dropIfExists('akumulasi');
    }
}
