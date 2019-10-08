<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('no_soal_id');
            $table->bigInteger('soal_id');
            $table->bigInteger('user_id');
            $table->bigInteger('kelas_id');
            $table->string('nama');
            $table->string('pilihan', 1);
            $table->decimal('score', 8,2);
            $table->string('status', 1);
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
        Schema::dropIfExists('jawab');
    }
}
