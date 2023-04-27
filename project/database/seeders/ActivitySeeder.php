<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            'subject_id' => 1,
            'grade_id' => 1,
            'teacher_id'=>33,
            'day'=>'Poniedziałek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 2,
            'grade_id' => 1,
            'teacher_id'=>41,
            'day'=>'Poniedziałek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 3,
            'grade_id' => 1,
            'teacher_id'=>39,
            'day'=>'Poniedziałek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 1,
            'teacher_id'=>36,
            'day'=>'Poniedziałek',
            'hour'=>'10:45'
        ]);
        DB::table('activities')->insert([
            'subject_id' => 1,
            'grade_id' => 2,
            'teacher_id'=>32,
            'day'=>'Poniedziałek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 2,
            'grade_id' => 2,
            'teacher_id'=>34,
            'day'=>'Poniedziałek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 2,
            'teacher_id'=>43,
            'day'=>'Poniedziałek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 3,
            'grade_id' => 2,
            'teacher_id'=>37,
            'day'=>'Poniedziałek',
            'hour'=>'10:45'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 7,
            'grade_id' => 1,
            'teacher_id'=>35,
            'day'=>'Wtorek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 6,
            'grade_id' => 1,
            'teacher_id'=>42,
            'day'=>'Wtorek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 5,
            'grade_id' => 1,
            'teacher_id'=>44,
            'day'=>'Wtorek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 1,
            'teacher_id'=>36,
            'day'=>'Wtorek',
            'hour'=>'10:45'
        ]);
        DB::table('activities')->insert([
            'subject_id' => 6,
            'grade_id' => 2,
            'teacher_id'=>34,
            'day'=>'Wtorek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 7,
            'grade_id' => 2,
            'teacher_id'=>35,
            'day'=>'Wtorek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 2,
            'teacher_id'=>43,
            'day'=>'Wtorek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 5,
            'grade_id' => 2,
            'teacher_id'=>44,
            'day'=>'Wtorek',
            'hour'=>'10:45'
        ]);
        DB::table('activities')->insert([
            'subject_id' => 1,
            'grade_id' => 1,
            'teacher_id'=>33,
            'day'=>'Środa',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 2,
            'grade_id' => 1,
            'teacher_id'=>41,
            'day'=>'Środa',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 3,
            'grade_id' => 1,
            'teacher_id'=>39,
            'day'=>'Środa',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 1,
            'teacher_id'=>36,
            'day'=>'Środa',
            'hour'=>'10:45'
        ]);
        DB::table('activities')->insert([
            'subject_id' => 1,
            'grade_id' => 2,
            'teacher_id'=>32,
            'day'=>'Środa',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 2,
            'grade_id' => 2,
            'teacher_id'=>34,
            'day'=>'Środa',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 2,
            'teacher_id'=>43,
            'day'=>'Środa',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 3,
            'grade_id' => 2,
            'teacher_id'=>37,
            'day'=>'Środa',
            'hour'=>'10:45'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 6,
            'grade_id' => 1,
            'teacher_id'=>42,
            'day'=>'Czwartek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 7,
            'grade_id' => 1,
            'teacher_id'=>35,
            'day'=>'Czwartek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 1,
            'teacher_id'=>36,
            'day'=>'Czwartek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 5,
            'grade_id' => 1,
            'teacher_id'=>44,
            'day'=>'Czwartek',
            'hour'=>'10:45'
        ]);
        DB::table('activities')->insert([
            'subject_id' => 7,
            'grade_id' => 2,
            'teacher_id'=>35,
            'day'=>'Czwartek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 6,
            'grade_id' => 2,
            'teacher_id'=>42,
            'day'=>'Czwartek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 5,
            'grade_id' => 2,
            'teacher_id'=>44,
            'day'=>'Czwartek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 2,
            'teacher_id'=>43,
            'day'=>'Czwartek',
            'hour'=>'10:45'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 1,
            'grade_id' => 1,
            'teacher_id'=>33,
            'day'=>'Piątek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 2,
            'grade_id' => 1,
            'teacher_id'=>41,
            'day'=>'Piątek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 3,
            'grade_id' => 1,
            'teacher_id'=>39,
            'day'=>'Piątek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 1,
            'teacher_id'=>36,
            'day'=>'Piątek',
            'hour'=>'10:45'
        ]);
        DB::table('activities')->insert([
            'subject_id' => 1,
            'grade_id' => 2,
            'teacher_id'=>32,
            'day'=>'Piątek',
            'hour'=>'8:00'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 2,
            'grade_id' => 2,
            'teacher_id'=>34,
            'day'=>'Piątek',
            'hour'=>'8:55'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 3,
            'grade_id' => 2,
            'teacher_id'=>37,
            'day'=>'Piątek',
            'hour'=>'9:40'
        ]);

        DB::table('activities')->insert([
            'subject_id' => 4,
            'grade_id' => 2,
            'teacher_id'=>43,
            'day'=>'Piątek',
            'hour'=>'10:45'
        ]);
    }
}
