<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = 3;
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('walker25'), // password
                'remember_token' => Str::random(10),
            ]);
    
            $user->roles()->attach($role);
        }
    }
}
