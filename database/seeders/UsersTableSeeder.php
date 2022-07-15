<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $role = 3;
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email(),
                'email_verified_at' => now(),
                'password' => bcrypt('walker25'), // password
                'remember_token' => Str::random(10),
                'position_title' => $faker->jobTitle(),
                'phone' => $faker->phoneNumber(),
                'image' => "https://avatars.dicebear.com/api/adventurer/" . $faker->name . ".svg"
            ]);
            $user->roles()->attach($role);
        }
    }
}
