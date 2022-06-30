<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // inserting document types
        foreach (config('seed_data.document_types') as $value) {
            DB::table('document_type')->insert([
                'name' => $value
            ]);
        }
        // insert task status
        foreach (config('seed_data.task_statuses') as $value) {
            DB::table('task_status')->insert([
                'name' => $value
            ]);
        }
        // insert task types
        foreach (config('seed_data.task_types') as $value) {
            DB::table('task_type')->insert([
                'name' => $value
            ]);
        }
        // insert contact status
        foreach (config('seed_data.lead_status') as $value) {
            DB::table('lead_status')->insert([
                'name' => $value
            ]);
        }
        // insert the system main email into settings table
        foreach (config('seed_data.settings') as $key => $value) {
            DB::table('setting')->insert([
                'setting_key' => $key,
                'setting_value' => $value
            ]);
        }
        // insert sample user as the system admin
        DB::table('users')->insert([
           'name' => 'Dean',
           'email' => 'dean@web2web.co.za',
           'position_title' => 'Web2web Support',
           'password' => bcrypt('walker25'),
           'is_super_admin' => 1,
           'is_admin' => 1,
           'is_active' => 1
        ]);
        // insert the initial permissions
        $permissions = [];
        foreach (config('seed_data.permissions') as $value) {
            $permissions[] = Permission::create(['name' => $value]);
        }
    }
}
