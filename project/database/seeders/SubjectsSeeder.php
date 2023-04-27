<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            'name'=> 'Transmutacja'
        ]);

        DB::table('subjects')->insert([
            'name'=> 'Eliksiry'
        ]);

        DB::table('subjects')->insert([
            'name'=> 'Obrona przed czarną magią'
        ]);

        DB::table('subjects')->insert([
            'name'=> 'Wróżbiarstwo'
        ]);

        DB::table('subjects')->insert([
            'name'=> 'Quidditch'
        ]);

        DB::table('subjects')->insert([
            'name'=> 'Zielarstwo'
        ]);

        DB::table('subjects')->insert([
            'name'=> 'Opieka nad magicznymi stworzeniami'
        ]);
    }
}
