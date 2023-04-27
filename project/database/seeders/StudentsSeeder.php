<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'user_id' => 2,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Astma, ma alergie na pszczoły',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);

        DB::table('students')->insert([
            'user_id' => 3,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Ma alergię na naukę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 4,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Ma alergię na naukę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 5,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 6,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Ma cukrzycę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 7,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 8,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Ma alergię na naukę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 9,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Ma ADHD',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 10,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 11,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 12,
            'class_id' => 1,
            'number_of_absences' => 0,
            'about' => 'Ma epilepsję',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 13,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 14,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 15,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 16,
            'class_id' => 1,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 17,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);

        DB::table('students')->insert([
            'user_id' => 18,
            'class_id' => 2,
            'number_of_absences' => 0,
            'about' => 'Ma alergię na naukę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 19,
            'class_id' => 2,
            'number_of_absences' => 0,
            'about' => 'Ma alergię na naukę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 20,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 21,
            'class_id' => 2,
            'number_of_absences' => 0,
            'about' => 'Ma cukrzycę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 22,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 23,
            'class_id' => 2,
            'number_of_absences' => 0,
            'about' => 'Ma alergię na naukę',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 24,
            'class_id' => 2,
            'number_of_absences' => 0,
            'about' => 'Ma ADHD',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 25,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 26,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 27,
            'class_id' => 2,
            'number_of_absences' => 0,
            'about' => 'Ma epilepsję',
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 28,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 29,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 30,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
        DB::table('students')->insert([
            'user_id' => 31,
            'class_id' => 2,
            'number_of_absences' => 0,
            'attendance' => serialize(array()),
            'uwagi' => serialize(array())
        ]);
    }
}
