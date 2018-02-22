<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('journals')->insert([
            [
                'name' => 'Design',
                'image' => 'Design-1.jpg',
                'description' => 'best journal',
                'created_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Sport',
                'image' => 'Sport-2.jpg',
                'description' => 'journal for all',
                'created_date' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Politic',
                'image' => 'Politic-3.jpg',
                'description' => 'newest journal in the city',
                'created_date' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
