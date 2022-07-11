<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            "name" => "admin1",
            "email" => "test1@example.com",
            "password" => Hash::make("password"),
            "created_at" => "2022/07/11 11:11:11"
        ]);
    }
}
