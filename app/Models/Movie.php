<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // use HasFactory;
    public $timestamps = true;

    public $fillable = [
        'judul',
        'sinopsis',
        'background',
        'cover',
        'durasi',
        'id_tahun_rilis',
        'id_genre',
        'id_reviewer',
    ];

    public function tahunRilis()
    {
        return $this->belongsTo(TahunRilis::class, 'id_tahun_rilis');
    }

    public function casting()
    {
        // Modelk Casting bisa memiliki banyak data (n to n)
        // dari model Movie melalui table pivot(bantuan)
        // yang bernama 'casting_movies' dengan masing-masing fk id_movie dan id_casting
        return $this->belongsToMany(Casting::class, 'casting_movies', 'id_casting', 'id_movie');
    }

    public function genreFilm()
    {
        return $this->belongsTo(GenreFilm::class, 'id_genre');
    }

    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class, 'id_reviewer');
    }

}
