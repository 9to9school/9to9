<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'avatar' => null,
            'dob' => '1990-01-01',
            'address' => 'Admin Address',
            'phone_number' => '1234567890',
            'password' => Hash::make('admin123'),
            'salt_password' => Str::random(2), // Random salt password
            'role' => 'super_admin',
            'email_verified' => 'true',
            'phone_verified' => 'true',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}