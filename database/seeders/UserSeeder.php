<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menambahkan data dummy untuk user pertama (admin)
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true,
            'password' => Hash::make('password123'),
        ]);

        // Menambahkan data dummy untuk user kedua (bukan admin)
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'is_admin' => false,
            'password' => Hash::make('password123'),
        ]);

        // Menambahkan data dummy untuk user ketiga (bukan admin)
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'is_admin' => false,
            'password' => Hash::make('password123'),
        ]);

        // Menambahkan data dummy untuk user keempat (bukan admin)
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'is_admin' => false,
            'password' => Hash::make('password123'),
        ]);

        // Menambahkan data dummy untuk user kelima (admin)
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'is_admin' => true,
            'password' => Hash::make('superpassword123'),
        ]);
    }
}
