<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GradeSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(MessageSeeder::class);
    }
}
