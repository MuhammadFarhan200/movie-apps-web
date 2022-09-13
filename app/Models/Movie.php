<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // use HasFactory;
    protected $fillable = [
        'judul_film',
        'background',
        'cover',
        'id_tahun_rilis',
        'id_durasi_film',
    ];
    public $timestamps = true;

    public function tahun_rilis()
    {
        return $this->belongsTo(TahunRilis::class, 'id_tahun_rilis');
    }

    public function durasi_film()
    {
        return $this->belongsTo(DurasiFilm::class, 'id_durasi_film');
    }
}
