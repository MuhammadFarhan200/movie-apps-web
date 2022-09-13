<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    // use HasFactory;
    protected $fillable = [
        'nama_pemain',
        'foto',
        'jenis_kelamin',
        'tanggal_lahir',
    ];
}
