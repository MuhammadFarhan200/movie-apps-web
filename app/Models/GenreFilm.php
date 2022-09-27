<?php

namespace App\Models;

use Alert;
use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    // use HasFactory;
    protected $fillable = [
        'kategori',
    ];
    public $timestamps = true;

    public function movie()
    {
        // model GemreFilm memiliki banyak data
        // dari model Movie melalui fk id_genre
        return $this->hasMany(Movie::class, 'id_genre');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($genre) {
            // Mengecek Apakah Genre Memiliki Movie
            if ($genre->movie->count() > 0) {
                Alert::html('Gagal Mengapus!', 'Tidak dapat menghapus genre <b>' . $genre->kategori . '</b>, masih ada movie dengan genre ini.', 'error')->autoClose(false);
                return false;
            }
            Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);
        });
    }
}
