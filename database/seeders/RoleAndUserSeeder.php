<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
    {
    
        // 1. Create all 5 Roles safely using firstOrCreate
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $schoolAdminRole = Role::firstOrCreate(['name' => 'School Admin']);
        $teacherRole     = Role::firstOrCreate(['name' => 'Teacher']);
        $accountantRole  = Role::firstOrCreate(['name' => 'Accountant']);
        $parentRole      = Role::firstOrCreate(['name' => 'Parent']);

        // Common password for all test accounts
        $defaultPassword = Hash::make('password123');

        // 2. Create and assign: Super Admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Super Admin User', 'password' => $defaultPassword]
        );
        $superAdmin->assignRole($superAdminRole);

        // 3. Create and assign: School Admin
        $schoolAdmin = User::firstOrCreate(
            ['email' => 'schooladmin@example.com'],
            ['name' => 'School Admin User', 'password' => $defaultPassword]
        );
        $schoolAdmin->assignRole($schoolAdminRole);

        // 4. Create and assign: Teacher
        $teacher = User::firstOrCreate(
            ['email' => 'teacher@example.com'],
            ['name' => 'Teacher User', 'password' => $defaultPassword]
        );
        $teacher->assignRole($teacherRole);

        // 5. Create and assign: Accountant
        $accountant = User::firstOrCreate(
            ['email' => 'accountant@example.com'],
            ['name' => 'Accountant User', 'password' => $defaultPassword]
        );
        $accountant->assignRole($accountantRole);

        // 6. Create and assign: Parent
        $parent = User::firstOrCreate(
            ['email' => 'parent@example.com'],
            ['name' => 'Parent User', 'password' => $defaultPassword]
        );
        $parent->assignRole($parentRole);
    
    }
}
