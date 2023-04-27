<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'adminski',
            'email' => 'admin@szkola.com',
            'email_verified_at' => '2023-01-05 20:19:06',
            'password' => bcrypt('admin'),
            'role' => User::ROLE_ADMIN
        ]);
        DB::table('users')->insert([
            'name' => 'Tom',
            'surname' => 'Riddle',
            'email_verified_at' => '2023-01-05 20:19:06',
            'email' => 'tom@szkola.com',
            'password' => bcrypt('tom'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Harry',
            'surname' => 'Potter',
            'email_verified_at' => '2023-01-05 20:19:06',
            'email' => 'harry@szkola.com',
            'password' => bcrypt('harry'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Ron',
            'surname' => 'Weasley',
            'email' => 'ron@szkola.com',
            'password' => bcrypt('ron'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Hermione',
            'surname' => 'Granger',
            'email' => 'hermione@szkola.com',
            'password' => bcrypt('hermione'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Viktor',
            'surname' => 'Krum',
            'email' => 'viktor@szkola.com',
            'password' => bcrypt('viktor'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Cedrik',
            'surname' => 'Diggory',
            'email' => 'cedrik@szkola.com',
            'password' => bcrypt('cedrik'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Parvati',
            'surname' => 'Patil',
            'email' => 'parvati@szkola.com',
            'password' => bcrypt('parvati'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Padma',
            'surname' => 'Patil',
            'email' => 'padma@szkola.com',
            'password' => bcrypt('padma'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Lavender',
            'surname' => 'Brown',
            'email' => 'lavender@szkola.com',
            'password' => bcrypt('lavender'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Katie',
            'surname' => 'Bell',
            'email' => 'katie@szkola.com',
            'password' => bcrypt('katie'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Colin',
            'surname' => 'Creevey',
            'email' => 'colin@szkola.com',
            'password' => bcrypt('colin'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Angelina',
            'surname' => 'Johnson',
            'email' => 'angelina@szkola.com',
            'password' => bcrypt('angelina'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Charlie',
            'surname' => 'Weasley',
            'email' => 'charlie@szkola.com',
            'password' => bcrypt('charlie'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Fleur',
            'surname' => 'Delacour',
            'email' => 'fleur@szkola.com',
            'password' => bcrypt('fleur'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Pansy',
            'surname' => 'Parkinson',
            'email' => 'pansy@szkola.com',
            'password' => bcrypt('pansy'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Fred',
            'surname' => 'Weasley',
            'email_verified_at' => '2023-01-05 20:19:06',
            'email' => 'fred@szkola.com',
            'password' => bcrypt('fred'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'George',
            'surname' => 'Weasley',
            'email_verified_at' => '2023-01-05 20:19:06',
            'email' => 'george@szkola.com',
            'password' => bcrypt('george'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Neville',
            'surname' => 'Longbottom',
            'email' => 'neville@szkola.com',
            'password' => bcrypt('neville'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Luna',
            'surname' => 'Lovegood',
            'email' => 'luna@szkola.com',
            'password' => bcrypt('luna'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Draco',
            'surname' => 'Malfoy',
            'email' => 'draco@szkola.com',
            'password' => bcrypt('draco'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Dobby',
            'surname' => 'Dobby',
            'email' => 'dobby@szkola.com',
            'password' => bcrypt('dobby'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Ginny',
            'surname' => 'Weasley',
            'email' => 'ginny@szkola.com',
            'password' => bcrypt('ginny'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Hedwig',
            'surname' => 'Hedwig',
            'email' => 'hedwig@szkola.com',
            'password' => bcrypt('hedwig'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Dudley',
            'surname' => 'Dursley',
            'email' => 'dudley@szkola.com',
            'password' => bcrypt('dudley'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Cho',
            'surname' => 'Chang',
            'email' => 'cho@szkola.com',
            'password' => bcrypt('cho'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Myrtle',
            'surname' => 'Moaning',
            'email' => 'myrtle@szkola.com',
            'password' => bcrypt('myrtle'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Dean',
            'surname' => 'Thomas',
            'email' => 'dean@szkola.com',
            'password' => bcrypt('dean'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Seamus',
            'surname' => 'Finnigan',
            'email' => 'seamus@szkola.com',
            'password' => bcrypt('seamus'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Vincent',
            'surname' => 'Crabbe',
            'email' => 'vincent@szkola.com',
            'password' => bcrypt('vincent'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Gregory',
            'surname' => 'Goyle',
            'email' => 'gregory@szkola.com',
            'password' => bcrypt('gregory'),
            'role' => User::ROLE_STUDENT
        ]);
        DB::table('users')->insert([
            'name' => 'Albus',
            'surname' => 'Dumbledore',
            'email' => 'albus@szkola.com',
            'password' => bcrypt('albus'),
            'email_verified_at' => '2023-01-05 20:19:06',
            'role' => User::ROLE_TEACHER
        ]);
        DB::table('users')->insert([
            'name' => 'Minerva',
            'surname' => 'McGonagall',
            'email_verified_at' => '2023-01-05 20:19:06',
            'email' => 'minerva@szkola.com',
            'password' => bcrypt('minerva'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Severus',
            'surname' => 'Snape',
            'email' => 'severus@szkola.com',
            'password' => bcrypt('severus'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Rubeus',
            'surname' => 'Hagrid',
            'email_verified_at' => '2023-01-05 20:19:06',
            'email' => 'rubeus@szkola.com',
            'password' => bcrypt('rubeus'),
            'role' => User::ROLE_TEACHER
        ]);
        DB::table('users')->insert([
            'name' => 'Sybilla',
            'surname' => 'Trelawney',
            'email' => 'sybilla@szkola.com',
            'password' => bcrypt('sybilla'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Remus',
            'surname' => 'Lupin',
            'email' => 'remus@szkola.com',
            'password' => bcrypt('remus'),
            'role' => User::ROLE_TEACHER
        ]);
        DB::table('users')->insert([
            'name' => 'Alastor',
            'surname' => 'Moody',
            'email' => 'alastor@szkola.com',
            'password' => bcrypt('alastor'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Gilderoy',
            'surname' => 'Lockhart',
            'email' => 'gilderoy@szkola.com',
            'password' => bcrypt('gilderoy'),
            'role' => User::ROLE_TEACHER
        ]);
        DB::table('users')->insert([
            'name' => 'Dolores',
            'surname' => 'Umbridge',
            'email' => 'dolores@szkola.com',
            'password' => bcrypt('dolores'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Horace',
            'surname' => 'Slughorn',
            'email' => 'horace@szkola.com',
            'password' => bcrypt('horace'),
            'role' => User::ROLE_TEACHER
        ]);
        DB::table('users')->insert([
            'name' => 'Pomona',
            'surname' => 'Sprout',
            'email' => 'pomona@szkola.com',
            'password' => bcrypt('pomona'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Firenzo',
            'surname' => 'Centauri',
            'email' => 'poppy@szkola.com',
            'password' => bcrypt('firenzo'),
            'role' => User::ROLE_TEACHER
        ]);
        DB::table('users')->insert([
            'name' => 'Rolanda',
            'surname' => 'Hooch',
            'email' => 'rolanda@szkola.com',
            'password' => bcrypt('rolanda'),
            'role' => User::ROLE_TEACHER
        ]);

        DB::table('users')->insert([
            'name' => 'Quirinus',
            'surname' => 'Quirrell',
            'email' => 'quirinus@szkola.com',
            'password' => bcrypt('quirinus'),
            'role' => User::ROLE_TEACHER
        ]);
    }
}
