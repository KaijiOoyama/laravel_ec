<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                "name" => "owner1",
                "email" => "test1@owner.com",
                "password" => Hash::make("password"),
                "created_at" => "2022/07/11 11:11:11"
            ],
            [
                "name" => "owner2",
                "email" => "test2@owner.com",
                "password" => Hash::make("password"),
                "created_at" => "2022/07/11 11:11:11"
            ],
            [
                "name" => "owner3",
                "email" => "test3@owner.com",
                "password" => Hash::make("password"),
                "created_at" => "2022/07/11 11:11:11"
            ],
            [
                "name" => "owner4",
                "email" => "test4@owner.com",
                "password" => Hash::make("password"),
                "created_at" => "2022/07/11 11:11:11"
            ],
            [
                "name" => "owner5",
                "email" => "test5@owner.com",
                "password" => Hash::make("password"),
                "created_at" => "2022/07/11 11:11:11"
            ],
            [
                "name" => "owner6",
                "email" => "test6@owner.com",
                "password" => Hash::make("password"),
                "created_at" => "2022/07/11 11:11:11"
            ]
        ]);
    }
}
