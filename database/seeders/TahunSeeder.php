<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2010;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2011;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2012;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2013;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2014;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2015;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2016;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2017;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2018;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2019;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2020;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2021;
        $tahun->save();

        $tahun = new \App\Models\TahunRilis();
        $tahun->tahun = 2022;
        $tahun->save();
    }
}
