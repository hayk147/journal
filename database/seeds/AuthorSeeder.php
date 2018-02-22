<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Jonson',
                'father_land' => 'Bob',
            ],
            [
                'first_name' => 'Sam',
                'last_name' => 'Anderson',
                'father_land' => 'Jack',
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Smith',
                'father_land' => 'Peter',
            ],
        ]);
    }
}
