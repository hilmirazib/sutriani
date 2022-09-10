<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatDataNKeterampilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_n_keterampilan', function (Blueprint $table) {
            $table->increments('id_keterampilan');
            $table->integer('id_siswa');
            $table->integer('nilai_praktik');
            $table->integer('nilai_proyek');
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
        Schema::dropIfExists('data_n_keterampilan');
    }
}
