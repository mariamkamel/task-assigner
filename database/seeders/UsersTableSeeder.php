<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create 100 admin users
        User::factory()->admin()->count(100)->create();

        // Create 10000 admin users
        User::factory()->count(10000)->create();

    }
}
