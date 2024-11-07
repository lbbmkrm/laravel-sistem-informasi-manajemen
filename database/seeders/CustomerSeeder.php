<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menambahkan beberapa data dummy untuk tabel customers
        Customer::create([
            'name' => 'John Doe',
            'address' => 'Jl. Merdeka No. 12, Jakarta, Indonesia',
            'phone' => '081234567890',
        ]);

        Customer::create([
            'name' => 'Jane Smith',
            'address' => 'Jl. Sudirman No. 34, Bandung, Indonesia',
            'phone' => '082345678901',
        ]);

        Customer::create([
            'name' => 'Robert Johnson',
            'address' => 'Jl. Gatot Subroto No. 56, Surabaya, Indonesia',
            'phone' => '083456789012',
        ]);

        Customer::create([
            'name' => 'Emily Davis',
            'address' => 'Jl. Thamrin No. 78, Yogyakarta, Indonesia',
            'phone' => '084567890123',
        ]);

        Customer::create([
            'name' => 'Michael Brown',
            'address' => 'Jl. Diponegoro No. 90, Bali, Indonesia',
            'phone' => '085678901234',
        ]);
    }
}
