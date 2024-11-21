<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $providers = [
            ['name' => 'Provider A'],
            ['name' => 'Provider B'],
            ['name' => 'Provider C'],
            ['name' => 'Provider D'],
            ['name' => 'Provider E'],
            ['name' => 'Provider F'],
            ['name' => 'Provider G'],
            ['name' => 'Provider H'],
            ['name' => 'Provider I'],
            ['name' => 'Provider J'],
            ['name' => 'Provider K'],
            ['name' => 'Provider L'],
            ['name' => 'Provider M'],
            ['name' => 'Provider N'],
            ['name' => 'Provider O'],
            ['name' => 'Provider P'],
            ['name' => 'Provider Q'],
            ['name' => 'Provider R'],
            ['name' => 'Provider S'],
            ['name' => 'Provider T'],
        ];

        foreach ($providers as $provider) {
            Provider::create($provider);
        }
    }
}
