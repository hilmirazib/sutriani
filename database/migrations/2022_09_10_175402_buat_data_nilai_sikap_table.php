<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatDataNilaiSikapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_nilai_sikap', function (Blueprint $table) {
            $table->increments('id_n_sikap');
            $table->integer('id_siswa');
            $table->string('jujur');
            $table->string('disiplin');
            $table->string('t_jawab');
            $table->string('s_santun');
            $table->string('g_royong');
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
        Schema::dropIfExists('data_nilai_sikap');
    }
}
