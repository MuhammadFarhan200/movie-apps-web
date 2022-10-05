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

}
