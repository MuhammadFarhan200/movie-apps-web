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
        return $this->belongsToMany(Casting::class, 'casting_movies', 'id_movie', 'id_casting');
    }

    public function genreFilm()
    {
        return $this->belongsTo(GenreFilm::class, 'id_genre');
    }

    public function reviewer()
    {
        return $this->hasMany(Reviewer::class, 'id_movie');
    }

    public function image()
    {
        if ($this->cover && file_exists(public_path('images/movies/'
            . $this->cover))) {
            return asset('images/movies/' . $this->cover);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // menghapus image(cover) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/movies/'
            . $this->cover))) {
            return unlink(public_path('images/movies/' . $this->cover));
        }
    }

    public function background()
    {
        if ($this->background && file_exists(public_path('images/movies/'
            . $this->background))) {
            return asset('images/movies/' . $this->background);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // menghapus image(background) di storage(penyimpanan) public
    public function deleteBackground()
    {
        if ($this->background && file_exists(public_path('images/movies/'
            . $this->background))) {
            return unlink(public_path('images/movies/' . $this->background));
        }
    }

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('sinopsis', 'like', '%' . $search . '%');
        });

    }

}
