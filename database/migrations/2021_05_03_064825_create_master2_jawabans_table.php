<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaster2JawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master2_jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('f7a', 2)->nullable();
            $table->string('f8', 2)->nullable();
            $table->string('f901', 2)->nullable();
            $table->string('f902', 2)->nullable();
            $table->string('f903', 2)->nullable();
            $table->string('f904', 2)->nullable();
            $table->string('f905', 2)->nullable();
            $table->string('f906', 20)->nullable();
            $table->string('f1001', 2)->nullable();
            $table->string('f1002', 20)->nullable();
            $table->string('f1101', 2)->nullable();
            $table->string('f1102', 20)->nullable();
            $table->string('f1201', 2)->nullable();
            $table->string('f1202', 2)->nullable();
            $table->integer('f1301')->nullable();
            $table->integer('f1302')->nullable();
            $table->integer('f1303')->nullable();
            $table->string('f14', 2)->nullable();
            $table->string('f15', 2)->nullable();
            $table->string('f1601', 2)->nullable();
            $table->string('f1602', 2)->nullable();
            $table->string('f1603', 2)->nullable();
            $table->string('f1604', 2)->nullable();
            $table->string('f1605', 2)->nullable();
            $table->string('f1606', 2)->nullable();
            $table->string('f1607', 2)->nullable();
            $table->string('f1608', 2)->nullable();
            $table->string('f1609', 2)->nullable();
            $table->string('f1610', 2)->nullable();
            $table->string('f1611', 2)->nullable();
            $table->string('f1612', 2)->nullable();
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
        Schema::dropIfExists('master2_jawabans');
    }
}
