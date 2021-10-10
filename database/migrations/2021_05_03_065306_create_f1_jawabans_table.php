<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateF1JawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f1_jawabans', function (Blueprint $table) {
            $table->id();
            $table->integer('f1_id');
            $table->integer('master1_jawaban_id');
            $table->integer('master2_jawaban_id');
            $table->integer('master3_jawaban_id');
            $table->integer('master4_jawaban_id');
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
        Schema::dropIfExists('f1_jawabans');
    }
}
