<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('journal_author')->insert([
            [
                'journal_id' => 1,
                'author_id' => 1,
            ],
            [
                'journal_id' => 1,
                'author_id' => 2,
            ],
            [
                'journal_id' => 2,
                'author_id' => 2,
            ],
            [
                'journal_id' => 3,
                'author_id' => 1,
            ],
            [
                'journal_id' => 3,
                'author_id' => 2,
            ],
            [
                'journal_id' => 3,
                'author_id' => 3,
            ],


        ]);
    }
}
