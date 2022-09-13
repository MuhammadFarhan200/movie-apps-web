<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre_film = new \App\Models\GenreFilm();
        $genre_film->kategori = 'Action';
        $genre_film->save();

        $genre_film = new \App\Models\GenreFilm();
        $genre_film->kategori = 'Fantasy';
        $genre_film->save();

        $genre_film = new \App\Models\GenreFilm();
        $genre_film->kategori = 'Comedy';
        $genre_film->save();

        $genre_film = new \App\Models\GenreFilm();
        $genre_film->kategori = 'Sci-fi';
        $genre_film->save();

        $genre_film = new \App\Models\GenreFilm();
        $genre_film->kategori = 'Romance';
        $genre_film->save();

    }
}
