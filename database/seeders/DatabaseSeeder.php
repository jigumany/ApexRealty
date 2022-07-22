<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Faker;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('seed_data.lead_status') as $value) {
            DB::table('lead_status')->insert([
                'name' => $value
            ]);
        }
        foreach (config('seed_data.task_statuses') as $value) {
            DB::table('task_status')->insert([
                'name' => $value
            ]);
        }
        foreach (config('seed_data.task_types') as $value) {
            DB::table('task_type')->insert([
                'name' => $value
            ]);
        }
        foreach (config('seed_data.document_types') as $value) {
            DB::table('document_type')->insert([
                'name' => $value
            ]);
        }
        
        $faker = Faker\Factory::create();

        $this->call([
            UsersTableSeeder::class
        ]);
        // Add Roles
        DB::table('roles')->insert([
            'name'  =>  'Super Admin',
        ]);
        DB::table('roles')->insert([
            'name'  =>  'Admin',
        ]);
        DB::table('roles')->insert([
            'name'  =>  'Agent',
        ]);

        $role_super = Role::where('name', 'Super Admin')->first();

        // Add Super User
        $user = User::create([
            'password' => bcrypt('walker25'), // password
            'remember_token' => Str::random(10),
            'name' => 'Dean',
            'email' => 'dean@web2web.co.za',
            'email_verified_at' => now(),
            'position_title' => 'Web2web Support',
            'password' => bcrypt('walker25'),
            'phone' => $faker->phoneNumber(),
            'image' => 'https://avatars.dicebear.com/api/adventurer/super-admin.svg',
            'is_super_admin' => 1,
            'is_admin' => 1,
            'is_active' => 1
        ]);
        $user->roles()->attach($role_super);
    }
}
