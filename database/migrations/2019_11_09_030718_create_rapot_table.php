<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_siswa');
            $table->bigInteger('id_kriteria');
            $table->string('speaking', 1);
            $table->string('listening', 1);
            $table->string('reading', 1);
            $table->string('writing', 1);
            $table->string('vocabulary', 1);
            $table->text('remark');
            $table->bigInteger('id_user');
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
        Schema::dropIfExists('rapot');
    }
}
