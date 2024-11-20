<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Sale;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $cards = Card::all();
        $customers = Customer::all();

        foreach (range(1, 50) as $index) {
            Sale::create([
                'user_id' => $users->random()->id,
                'card_id' => $cards->random()->id,
                'customer_id' => $customers->random()->id,
                'amount' => rand(1, 5),
                'total' => rand(5000, 50000),
            ]);
        }
    }
}
