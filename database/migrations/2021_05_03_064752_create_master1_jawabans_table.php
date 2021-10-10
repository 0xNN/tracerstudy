<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaster1JawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master1_jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('f21', 2)->nullable();
            $table->string('f22', 2)->nullable();
            $table->string('f23', 2)->nullable();
            $table->string('f24', 2)->nullable();
            $table->string('f25', 2)->nullable();
            $table->string('f26', 2)->nullable();
            $table->string('f27', 2)->nullable();
            $table->string('f301', 2)->nullable();
            $table->string('f302', 2)->nullable();
            $table->string('f303', 2)->nullable();
            $table->string('f401', 2)->nullable();
            $table->string('f402', 2)->nullable();
            $table->string('f403', 2)->nullable();
            $table->string('f404', 2)->nullable();
            $table->string('f405', 2)->nullable();
            $table->string('f406', 2)->nullable();
            $table->string('f407', 2)->nullable();
            $table->string('f408', 2)->nullable();
            $table->string('f409', 2)->nullable();
            $table->string('f410', 2)->nullable();
            $table->string('f411', 2)->nullable();
            $table->string('f412', 2)->nullable();
            $table->string('f413', 2)->nullable();
            $table->string('f414', 2)->nullable();
            $table->string('f415', 2)->nullable();
            $table->string('f416', 20)->nullable();
            $table->string('f6', 2)->nullable();
            $table->string('f501', 2)->nullable();
            $table->string('f502', 2)->nullable();
            $table->string('f503', 2)->nullable();
            $table->string('f7', 2)->nullable();
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
        Schema::dropIfExists('master1_jawabans');
    }
}
