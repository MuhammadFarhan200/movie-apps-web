<?php

namespace App\Models;

use Alert;
use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    // use HasFactory;
    protected $fillable = [
        'nama',
        'foto',
        'jenis_kelamin',
        'tanggal_lahir',
    ];
    public $timestamps = true;

    public function movie()
    {
        // Modelk Casting bisa memiliki banyak data (n to n)
        // dari model Movie melalui table pivot(bantuan)
        // yang bernama 'casting_movies' dengan masing-masing fk id_movie dan id_casting
        return $this->belongsToMany(Movie::class, 'casting_movies', 'id_casting', 'id_movie');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($casting) {
            // Mengecek Apakah Casting Memiliki Movie
            if ($casting->movie->count() > 0) {
                Alert::html('Gagal Mengapus!', 'Tidak dapat menghapus cast <b>' . $casting->nama . '</b>, masih ada movie dengan cast ini.', 'error');
                return false;
            }
            Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);

        });
    }

    public function image()
    {
        if ($this->foto && file_exists(public_path('images/casting/' . $this->foto))) {
            return asset('images/casting/' . $this->foto);
        } else {
            return asset('images/casting/no_image.png');
        }
    }
    // menghapus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/casting/' . $this->foto))) {
            return unlink(public_path('images/casting/' . $this->foto));
        }
    }
}
