<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users=[
            [
                'name' => 'SuperAdmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            $createdUser = \App\Models\User::firstOrCreate(['email' => $user['email']], $user);
        }

        $superadminRoleId = DB::table('roles')->where('name', 'superadmin')->value('id');

        if (isset($createdUser) && $superadminRoleId) {
            DB::table('role_user')->updateOrInsert([
                'user_id' => $createdUser->id,
                'role_id' => $superadminRoleId,
            ]);
        }
    }
}
