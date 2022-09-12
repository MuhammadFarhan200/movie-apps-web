<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DurasiFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $durasi_film = new \App\Models\DurasiFilm();
        $durasi_film->durasi = 140;
        $durasi_film->save();

        $durasi_film = new \App\Models\DurasiFilm();
        $durasi_film->durasi = 200;
        $durasi_film->save();

        $durasi_film = new \App\Models\DurasiFilm();
        $durasi_film->durasi = 180;
        $durasi_film->save();

        $durasi_film = new \App\Models\DurasiFilm();
        $durasi_film->durasi = 60;
        $durasi_film->save();

        $durasi_film = new \App\Models\DurasiFilm();
        $durasi_film->durasi = 120;
        $durasi_film->save();

    }
}
