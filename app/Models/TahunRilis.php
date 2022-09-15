<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunRilis extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun',
    ];
    public $timestamps = true;

    public function movie()
    {
        return $this->hasMany(Movie::class, 'id_tahun_rilis');
    }
}
