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
            $table->BigIncrements('id');
            $table->string('no_soal_id', 15);
            $table->Biginteger('id_soal');
            $table->BigInteger('id_user');
            $table->BigInteger('id_kelas')->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('pilihan', 1);
            $table->decimal('score');
            $table->string('status', 1);
            $table->integer('revisi')->nullable();
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
