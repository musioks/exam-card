<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('terms')->insert([
        [
            'term' =>'Semester 1',
        ],
        [
            'term' =>'Semester 2',
        ]
             ]);
    }
}
