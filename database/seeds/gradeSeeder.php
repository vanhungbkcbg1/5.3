<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('grade')->insert([
            'name' => "Cap1"
        ]);

        DB::table('grade')->insert([
            'name' => "Cap2"
        ]);

        DB::table('grade')->insert([
            'name' => "Cap3"
        ]);
    }
}
