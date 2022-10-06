<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    // use HasFactory;
    public $timestamps = true;

    public $fillable = [
        'nama',
        'email',
        'komentar',
        'id_movie',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id_movie');
    }

    public function foto()
    {
        if ($this->foto && file_exists(public_path('images/reviewer/' . $this->foto))) {
            return asset('images/reviewer/' . $this->foto);
        } else {
            return asset('assets/images/no_image.png');
        }
    }
    // menghapus image(foto) di storage(penyimpanan) public
    public function deleteFoto()
    {
        if ($this->foto && file_exists(public_path('images/reviewer/' . $this->foto))) {
            return unlink(public_path('images/reviewer/' . $this->foto));
        }
    }

}
