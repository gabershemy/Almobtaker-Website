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
        $user = User::firstOrCreate(
            ['email' => 'gabershemy@gmail.com'],
            [
                'name' => 'د. جابر الشيمي',
                'password' => Hash::make('admin123456'),
            ]
        );

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $user->assignRole($superAdminRole);
    }
}
