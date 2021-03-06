<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AuthorSeeder::class);
         $this->call(JournalSeeder::class);
         $this->call(JournalAuthorSeeder::class);

    }
}
