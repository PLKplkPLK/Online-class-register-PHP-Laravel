<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'user_id' => 32,
            'subject_id' => 1,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 33,
            'subject_id' => 1,
            'is_class_teacher' => true
        ]);

        DB::table('teachers')->insert([
            'user_id' => 34,
            'subject_id' => 2,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 35,
            'subject_id' => 7,
            'is_class_teacher' => true
        ]);
        DB::table('teachers')->insert([
            'user_id' => 36,
            'subject_id' => 4
        ]);

        DB::table('teachers')->insert([
            'user_id' => 37,
            'subject_id' => 3,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 38,
            'subject_id' => 3,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 39,
            'subject_id' => 3,
        ]);
        DB::table('teachers')->insert([
            'user_id' => 40,
            'subject_id' => 3,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 41,
            'subject_id' => 2,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 42,
            'subject_id' => 6,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 43,
            'subject_id' => 4,
        ]);
        DB::table('teachers')->insert([
            'user_id' => 44,
            'subject_id' => 5,
        ]);

        DB::table('teachers')->insert([
            'user_id' => 45,
            'subject_id' => 3,
        ]);
    }
}
