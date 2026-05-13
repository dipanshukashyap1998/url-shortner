<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create_short_url'],
            ['name' => 'edit_short_url'],
            ['name' => 'delete_short_url'],
            ['name' => 'view_short_url'],
            ['name' => 'manage_users'],
            ['name' => 'manage_roles'],
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::create($permission);
        }
    }
}
