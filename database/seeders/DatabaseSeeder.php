<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class
        ]);
        DB::table('users')->insert([
            'name' => 'Dean',
            'email' => 'dean@web2web.co.za',
            'position_title' => 'Web2web Support',
            'password' => bcrypt('walker25'),
            'is_super_admin' => 1,
            'is_admin' => 1,
            'is_active' => 1
        ]);
        DB::table('roles')->insert([
            'name'  =>  'Super Admin',
        ]);
        DB::table('roles')->insert([
            'name'  =>  'Admin',
        ]);
        DB::table('roles')->insert([
            'name'  =>  'Agent',
        ]);
    }
}
