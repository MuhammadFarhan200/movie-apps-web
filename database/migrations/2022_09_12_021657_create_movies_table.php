<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('judul_film');
            $table->string('background');
            $table->string('cover');
            $table->unsignedBigInteger('tahun_rilis');
            $table->unsignedBigInteger('durasi_film');
            $table->timestamps();
            $table->foreign('tahun_rilis')->references('id')->on('tahun_rilis');
            $table->foreign('durasi_film')->references('id')->on('durasi_films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
