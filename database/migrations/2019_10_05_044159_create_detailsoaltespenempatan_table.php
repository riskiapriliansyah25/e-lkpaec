<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsoaltespenempatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailsoaltespenempatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('soal_id');
            $table->string('jenis');
            $table->text('soal');
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
        Schema::dropIfExists('detailsoaltespenempatan');
    }
}
