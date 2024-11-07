<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menambahkan beberapa data dummy untuk tabel providers
        Provider::create([
            'name' => 'Provider A',
        ]);

        Provider::create([
            'name' => 'Provider B',
        ]);

        Provider::create([
            'name' => 'Provider C',
        ]);

        Provider::create([
            'name' => 'Provider D',
        ]);

        Provider::create([
            'name' => 'Provider E',
        ]);
    }
}
