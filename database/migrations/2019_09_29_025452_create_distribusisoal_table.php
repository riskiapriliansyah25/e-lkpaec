<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribusisoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusisoal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('soal_id');
            $table->bigInteger('kelas_id')->nullable();
            $table->bigInteger('siswa_id')->nullable();
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
        Schema::dropIfExists('distribusisoal');
    }
}
