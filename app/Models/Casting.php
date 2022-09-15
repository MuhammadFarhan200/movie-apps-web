<?php

namespace App\Models;

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
        return $this->belongsToMany(Movie::class, 'casting_movies', 'id_movie', 'id_casting');
    }
}
