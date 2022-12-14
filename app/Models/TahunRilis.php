<?php

namespace App\Models;

use Alert;
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

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($tahun) {
            // Mengecek Apakah Tahun Rilis Memiliki Movie
            if ($tahun->movie->count() > 0) {
                Alert::html('Gagal Mengapus!', 'Tidak dapat menghapus tahun rilis <b>' . $tahun->tahun . '</b>, masih ada movie dengan tahun rilis ini.', 'error')->autoClose(false);
                return false;
            }
            Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose();

        });
    }
}
