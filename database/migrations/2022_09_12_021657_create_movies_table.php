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
            $table->unsignedBigInteger('id_tahun_rilis');
            $table->unsignedBigInteger('id_durasi_film');
            $table->timestamps();
            $table->foreign('id_tahun_rilis')->references('id')->on('tahun_rilis')->onDelete('cascade');
            $table->foreign('id_durasi_film')->references('id')->on('durasi_films')->onDelete('cascade');
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
