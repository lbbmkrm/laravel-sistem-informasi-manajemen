<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

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

        // Menambahkan 10 data tambahan
        Customer::create([
            'name' => 'Chris Lee',
            'address' => 'Jl. Kebon Jeruk No. 23, Jakarta, Indonesia',
            'phone' => '086789012345',
        ]);

        Customer::create([
            'name' => 'Sarah Taylor',
            'address' => 'Jl. Pahlawan No. 67, Medan, Indonesia',
            'phone' => '087890123456',
        ]);

        Customer::create([
            'name' => 'David Wilson',
            'address' => 'Jl. Alun-Alun No. 45, Malang, Indonesia',
            'phone' => '088901234567',
        ]);

        Customer::create([
            'name' => 'Jessica Moore',
            'address' => 'Jl. Raya No. 89, Solo, Indonesia',
            'phone' => '089012345678',
        ]);

        Customer::create([
            'name' => 'Daniel Lee',
            'address' => 'Jl. Bukit No. 101, Makassar, Indonesia',
            'phone' => '090123456789',
        ]);

        Customer::create([
            'name' => 'Sophia Taylor',
            'address' => 'Jl. Merpati No. 22, Semarang, Indonesia',
            'phone' => '091234567890',
        ]);

        Customer::create([
            'name' => 'William Moore',
            'address' => 'Jl. Cendana No. 53, Surakarta, Indonesia',
            'phone' => '092345678901',
        ]);

        Customer::create([
            'name' => 'Mason Clark',
            'address' => 'Jl. Mangga No. 72, Palembang, Indonesia',
            'phone' => '093456789012',
        ]);

        Customer::create([
            'name' => 'Ava Harris',
            'address' => 'Jl. Kembang No. 111, Bekasi, Indonesia',
            'phone' => '094567890123',
        ]);

        Customer::create([
            'name' => 'Lucas Allen',
            'address' => 'Jl. Teratai No. 33, Jakarta, Indonesia',
            'phone' => '095678901234',
        ]);
    }
}
