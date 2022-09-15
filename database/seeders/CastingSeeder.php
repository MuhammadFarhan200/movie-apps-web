<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CastingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $castings = new \App\Models\Casting();
        $castings->nama = 'Tom Holland';
        $castings->foto = 'tom_holland.jpg';
        $castings->jenis_kelamin = 'Laki-laki';
        $castings->tanggal_lahir = '1996-06-01';
        $castings->save();

        // $casting = new \App\Models\Casting();
        // $casting->nama = 'Fantasy';
        // $casting->foto = 'Fantasy';
        // $casting->jenis_kelamin = 'Fantasy';
        // $casting->tanggal_lahir = 'Fantasy';
        // $casting->save();

        // $casting = new \App\Models\Casting();
        // $casting->nama = 'Comedy';
        // $casting->foto = 'Comedy';
        // $casting->jenis_kelamin = 'Comedy';
        // $casting->tanggal_lahir = 'Comedy';
        // $casting->save();

        // $casting = new \App\Models\Casting();
        // $casting->nama = 'Sci-fi';
        // $casting->foto = 'Sci-fi';
        // $casting->jenis_kelamin = 'Sci-fi';
        // $casting->tanggal_lahir = 'Sci-fi';
        // $casting->save();

        // $casting = new \App\Models\Casting();
        // $casting->nama = 'Romance';
        // $casting->foto = 'Romance';
        // $casting->jenis_kelamin = 'Romance';
        // $casting->tanggal_lahir = 'Romance';
        // $casting->save();
    }
}
