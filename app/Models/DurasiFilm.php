<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DurasiFilm extends Model
{
    // use HasFactory;
    protected $fillable = [
        'durasi',
    ];
    public $timestamps = true;

    public function movie()
    {
        return $this->hasMany(Movie::class, 'id_durasi_film');
    }
}
