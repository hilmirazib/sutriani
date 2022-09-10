<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatDataNPengetahuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_n_pengetahuan', function (Blueprint $table) {
            $table->increments('id_penilaian');
            $table->integer('id_pelajaran');
            $table->integer('id_siswa');
            $table->integer('nilai_uh');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
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
        Schema::dropIfExists('data_n_pengetahuan');
    }
}
