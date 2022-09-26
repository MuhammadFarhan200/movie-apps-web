<?php

namespace Database\Seeders;

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
        $tom_holland = new \App\Models\Casting();
        $tom_holland->nama = 'Tom Holland';
        $tom_holland->foto = 'tom_holland.jpg';
        $tom_holland->jenis_kelamin = 'Laki-laki';
        $tom_holland->tanggal_lahir = '1996-06-01';
        $tom_holland->save();

        $iqbaal = new \App\Models\Casting();
        $iqbaal->nama = 'Iqbaal Ramadhan';
        $iqbaal->foto = 'iqbaal_ramadhan.jpg';
        $iqbaal->jenis_kelamin = 'Laki-laki';
        $iqbaal->tanggal_lahir = '1999-12-28';
        $iqbaal->save();

        $zendaya = new \App\Models\Casting();
        $zendaya->nama = 'Zandaya';
        $zendaya->foto = 'zandaya.jpg';
        $zendaya->jenis_kelamin = 'Perempuan';
        $zendaya->tanggal_lahir = '1996-09-01';
        $zendaya->save();

        $joe_taslim = new \App\Models\Casting();
        $joe_taslim->nama = 'Joe Taslim';
        $joe_taslim->foto = 'joe_taslim.jpg';
        $joe_taslim->jenis_kelamin = 'Laki-laki';
        $joe_taslim->tanggal_lahir = '1981-06-23';
        $joe_taslim->save();

    }
}
