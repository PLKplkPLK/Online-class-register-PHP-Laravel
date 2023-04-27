<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'id' => 1,
            'sender_id' => 2,
            'receiver_id' => 4,
            'title' => "Olo",
            'message' => 'Alright, so here we are in front of the elephants. The cool thing about these guys is that...'
        ]);
    }
}
