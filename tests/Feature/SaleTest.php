<?php

namespace Tests\Feature;

use App\Livewire\Sale\SaleList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Card;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Customer;
use App\Models\Provider;
use App\Models\Sale;
use Database\Seeders\CardSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Log;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ProviderSeeder;

class SaleTest extends TestCase
{
    use RefreshDatabase;
    public function testSaleList()
    {
        $this->seed(DatabaseSeeder::class);
        $admin = User::where('is_admin', true)->first();

        $this->actingAs($admin)->get('/sales')
            ->assertStatus(200);
    }

    public function testSaleCreate()
    {
        $this->seed([
            UserSeeder::class,
            CustomerSeeder::class,
            ProviderSeeder::class,
            CardSeeder::class
        ]);

        $user = User::where('name', 'Admin User')->first();
        Log::info($user);
        $card = Card::where('price', 100000)->first();
        $customer = Customer::where('name', 'John Doe')->first();

        self::assertDatabaseEmpty('sales');
        $this->actingAs($user);
        Livewire::test('sale.SaleCreate')
            ->set('customerName', $customer->name)
            ->set('card', $card->id)
            ->set('customer', $customer->name)
            ->set('user', $user)
            ->set('amount', 5)
            ->call('create');

        self::assertDatabaseHas('sales', [
            'user_id' => $user->id,
            'card_id' => $card->id,
            'customer_id' => $customer->id,
            'amount' => 5,
            'total' => 500_000
        ]);
        self::assertDatabaseCount('sales', 1);
    }

    public function testSaleUpdate()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        $customer = Customer::create([
            'name' => 'John Doe',
            'phone' => '08123456789',
            'address' => 'Jl. Merdeka No. 12',
        ]);

        $provider = Provider::create([
            'name' => 'provider A'
        ]);

        $card = Card::create([
            'name' => 'Card A',
            'provider_id' => $provider->id,
            'stock' => 10,
            'price' => 10000,
        ]);

        $sale = Sale::create([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'card_id' => $card->id,
            'amount' => 5,
            'total' => 50000,
        ]);
        self::assertDatabaseHas('sales', [
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'card_id' => $card->id,
            'amount' => 5,
            'total' => 50000
        ]);


        Livewire::actingAs($user)
            ->test('sale.saleUpdate', [$sale->id])
            ->set('amount', 666)
            ->call('update');

        self::assertDatabaseHas('sales', [
            'amount' => 666
        ]);
    }

    public function testSaleDelete()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        $customer = Customer::create([
            'name' => 'John Doe',
            'phone' => '08123456789',
            'address' => 'Jl. Merdeka No. 12',
        ]);

        $provider = Provider::create([
            'name' => 'provider A'
        ]);

        $card = Card::create([
            'name' => 'Card A',
            'provider_id' => $provider->id,
            'stock' => 10,
            'price' => 10000,
        ]);

        $sale = Sale::create([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'card_id' => $card->id,
            'amount' => 5,
            'total' => 50000,
        ]);
        self::assertDatabaseHas('sales', [
            'id' => $sale->id,
            'amount' => 5,
            'total' => 50000
        ]);

        Livewire::actingAs($user)
            ->test('sale.saleList')
            ->call('delete', $sale->id);

        self::assertDatabaseMissing('sales', [
            'id' => $sale->id
        ]);
    }
}
