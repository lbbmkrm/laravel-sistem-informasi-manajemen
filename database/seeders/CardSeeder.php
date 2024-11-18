<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Mendapatkan semua provider yang ada
        $providers = \App\Models\Provider::all();

        // Menambahkan beberapa data dummy untuk tabel cards
        foreach ($providers as $provider) {
            Card::create([
                'provider_id' => $provider->id,  // Menghubungkan dengan provider_id
                'name' => $provider->name . ' Card 1', // Nama card berdasarkan provider
                'stock' => rand(10, 100),  // Stock acak antara 10 dan 100
                'price' => 100_000,  // Harga acak antara 5.000 dan 100.000
            ]);

            Card::create([
                'provider_id' => $provider->id,
                'name' => $provider->name . ' Card 2',
                'stock' => rand(10, 100),
                'price' => rand(5000, 100000),
            ]);

            Card::create([
                'provider_id' => $provider->id,
                'name' => $provider->name . ' Card 3',
                'stock' => rand(10, 100),
                'price' => rand(5000, 100000),
            ]);
        }
    }
}
