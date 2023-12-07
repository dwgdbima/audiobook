<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
            'phone' => '08123728382',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $superAdmin->assignRole('super_admin');


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '08123728382',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole('admin');

        $userTest = User::create([
            'name' => 'user test',
            'email' => 'user@example.com',
            'phone' => '028392392732',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $userTest->assignRole('customer');

        $userDemo = User::create([
            'name' => 'user demo',
            'email' => 'user@demo.com',
            'phone' => '0823927392',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $userDemo->assignRole('customer');

        User::factory()->count(10)->create();
    }
}
