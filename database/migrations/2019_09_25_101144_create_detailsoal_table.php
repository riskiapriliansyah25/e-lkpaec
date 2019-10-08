<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailsoal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('soal_id');
            $table->string('jenis');
            $table->text('soal');
            $table->string('audio', 255)->nullable();
            $table->text('pila');
            $table->text('pilb');
            $table->text('pilc');
            $table->text('pild');
            $table->string('kunci', 1);
            $table->decimal('score', 5,2);
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('detailsoal');
    }
}
