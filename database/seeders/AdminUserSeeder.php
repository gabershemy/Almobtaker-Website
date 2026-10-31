<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);

        // Account 1: Dr. Gaber Elshemy
        $user1 = User::updateOrCreate(
            ['email' => 'gabershemy@gmail.com'],
            [
                'name' => 'د. جابر الشيمي',
                'password' => Hash::make('password'),
            ]
        );
        if (method_exists($user1, 'assignRole')) {
            $user1->assignRole($superAdminRole);
        }

        // Account 2: Admin System Account
        $user2 = User::updateOrCreate(
            ['email' => 'newmobtaker@admin.com'],
            [
                'name' => 'إدارة المبتكر العربي',
                'password' => Hash::make('password'),
            ]
        );
        if (method_exists($user2, 'assignRole')) {
            $user2->assignRole($superAdminRole);
        }
    }
}
