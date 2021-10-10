<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_pertanyaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deskripsi_pertanyaan');
            $table->string('id_pertanyaan');
            $table->timestamps();
        });

        Schema::create('f1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nim_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('tahun_lulus');
            $table->string('no_hp');
            $table->integer('kode_pt')->default('021019');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deskripsi_pertanyaan');
            $table->timestamps();
        });

        Schema::create('jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deskripsi_jawaban');
            $table->integer('id_pertanyaan');
            $table->timestamps();
        });

        Schema::create('sub_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deskripsi_jawaban');
            $table->integer('id_jawaban');
            $table->timestamps();
        });

        Schema::create('master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_f1');
            $table->string('id_pertanyaan');
            $table->string('id_jawaban');
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
        //
    }
}
