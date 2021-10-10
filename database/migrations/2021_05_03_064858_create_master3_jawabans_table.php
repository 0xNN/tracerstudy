<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaster3JawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master3_jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('f1613', 2)->nullable();
            $table->string('f1614', 20)->nullable();
            $table->string('f1701', 2)->nullable();
            $table->string('f1702b', 2)->nullable();
            $table->string('f1703', 2)->nullable();
            $table->string('f1704b', 2)->nullable();
            $table->string('f1705', 2)->nullable();
            $table->string('f1705a', 2)->nullable();
            $table->string('f1706', 2)->nullable();
            $table->string('f1706ba', 2)->nullable();
            $table->string('f1707', 2)->nullable();
            $table->string('f1708b', 2)->nullable();
            $table->string('f1709', 2)->nullable();
            $table->string('f1710b', 2)->nullable();
            $table->string('f1711', 2)->nullable();
            $table->string('f1711a', 2)->nullable();
            $table->string('f1712b', 2)->nullable();
            $table->string('f1712a', 2)->nullable();
            $table->string('f1713', 2)->nullable();
            $table->string('f1714b', 2)->nullable();
            $table->string('f1715', 2)->nullable();
            $table->string('f1716b', 2)->nullable();
            $table->string('f1717', 2)->nullable();
            $table->string('f1718b', 2)->nullable();
            $table->string('f1719', 2)->nullable();
            $table->string('f1720b', 2)->nullable();
            $table->string('f1721', 2)->nullable();
            $table->string('f1722b', 2)->nullable();
            $table->string('f1723', 2)->nullable();
            $table->string('f1724b', 2)->nullable();
            $table->string('f1725', 2)->nullable();
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
        Schema::dropIfExists('master3_jawabans');
    }
}
