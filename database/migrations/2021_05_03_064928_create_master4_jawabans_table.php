<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaster4JawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master4_jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('f1726b', 2)->nullable();
            $table->string('f1727', 2)->nullable();
            $table->string('f1728b', 2)->nullable();
            $table->string('f1729', 2)->nullable();
            $table->string('f1730b', 2)->nullable();
            $table->string('f1731', 2)->nullable();
            $table->string('f1732b', 2)->nullable();
            $table->string('f1733', 2)->nullable();
            $table->string('f1734b', 2)->nullable();
            $table->string('f1735', 2)->nullable();
            $table->string('f1736b', 2)->nullable();
            $table->string('f1737', 2)->nullable();
            $table->string('f1737a', 2)->nullable();
            $table->string('f1738', 2)->nullable();
            $table->string('f1738ba', 2)->nullable();
            $table->string('f1739', 2)->nullable();
            $table->string('f1740b', 2)->nullable();
            $table->string('f1741', 2)->nullable();
            $table->string('f1742b', 2)->nullable();
            $table->string('f1743', 2)->nullable();
            $table->string('f1744b', 2)->nullable();
            $table->string('f1745', 2)->nullable();
            $table->string('f1746b', 2)->nullable();
            $table->string('f1747', 2)->nullable();
            $table->string('f1748b', 2)->nullable();
            $table->string('f1749', 2)->nullable();
            $table->string('f1750b', 2)->nullable();
            $table->string('f1751', 2)->nullable();
            $table->string('f1752b', 2)->nullable();
            $table->string('f1753', 2)->nullable();
            $table->string('f1754b', 2)->nullable();
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
        Schema::dropIfExists('master4_jawabans');
    }
}
