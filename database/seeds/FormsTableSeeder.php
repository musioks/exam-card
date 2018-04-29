<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               DB::table('forms')->insert([
        [
            'form' =>'First Yr',
        ],
        [
            'form' =>'Second Yr',
        ],
        [
            'form' =>'Third Yr',
        ],
        [
            'form' =>'Fourth Yr',
        ]
               ]);
    }
}
