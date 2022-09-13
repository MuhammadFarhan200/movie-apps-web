<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviewers = new \App\Models\Reviewers();
        $reviewers->nama = 'Action';
        $reviewers->foto = 'assets/images/reviewers/blank.png';
        $reviewers->save();

        $reviewers = new \App\Models\Reviewers();
        $reviewers->nama = 'Fantasy';
        $reviewers->foto = 'assets/images/reviewers/blank.png';
        $reviewers->save();

        $reviewers = new \App\Models\Reviewers();
        $reviewers->nama = 'Comedy';
        $reviewers->foto = 'assets/images/reviewers/blank.png';
        $reviewers->save();

        $reviewers = new \App\Models\Reviewers();
        $reviewers->nama = 'Sci-fi';
        $reviewers->foto = 'assets/images/reviewers/blank.png';
        $reviewers->save();

        $reviewers = new \App\Models\Reviewers();
        $reviewers->nama = 'Romance';
        $reviewers->foto = 'assets/images/reviewers/blank.png';
        $reviewers->save();

    }
}
