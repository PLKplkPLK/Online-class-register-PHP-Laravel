<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('grades')->insert([
            'year'=> 1,
            'letter' => 'a',
            'class_teacher_id' => 33
        ]);

        DB::table('grades')->insert([
            'year'=> 1,
            'letter' => 'b',
            'class_teacher_id' => 35
        ]);

        DB::table('grades')->insert([
            'year'=> 1,
            'letter' => 'c'
        ]);

        DB::table('grades')->insert([
            'year'=> 2,
            'letter' => 'a'
        ]);

        DB::table('grades')->insert([
            'year'=> 2,
            'letter' => 'b'
        ]);

        DB::table('grades')->insert([
            'year'=> 2,
            'letter' => 'c'
        ]);

        DB::table('grades')->insert([
            'year'=> 3,
            'letter' => 'a'
        ]);

        DB::table('grades')->insert([
            'year'=> 3,
            'letter' => 'b'
        ]);

        DB::table('grades')->insert([
            'year'=> 3,
            'letter' => 'c'
        ]);
    }
}
