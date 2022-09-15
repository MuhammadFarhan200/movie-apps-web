<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    // use HasFactory;
    public $timestamps = true;

    public $fillable = [
        'nama',
        'foto',
        'komentar',
    ];

    public function movie()
    {
        return $this->hasMany(Movie::class, 'id_reviewer');
    }

}
