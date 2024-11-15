<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testCustomerList()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::where('is_admin', true)->first();

        $this->actingAs($user)->get('/customers')
            ->assertStatus(200);
    }

    public function testCustomerCreate()
    {
        $this->seed(UserSeeder::class);
        self::assertDatabaseEmpty('customers');

        Livewire::test('customer.CustomerCreate')
            ->set('name', 'Test')
            ->set('phone', '080808')
            ->set('address', 'Medan')
            ->call('create');

        self::assertDatabaseCount('customers', 1);
        self::assertDatabaseHas('customers', [
            'name' => 'Test',
            'phone' => '080808',
            'address' => 'Medan'
        ]);
    }

    public function testCustomerUpdate()
    {
        $this->seed(DatabaseSeeder::class);
        self::assertDatabaseHas('customers', [
            'name' => 'John Doe',
            'address' => 'Jl. Merdeka No. 12, Jakarta, Indonesia'
        ]);
        $customer = Customer::where('name', 'John Doe')->first();

        Livewire::test('customer.CustomerUpdate', [$customer->id])
            ->set('name', 'John Doe Update')
            ->set('phone', '08666')
            ->set('address', 'Medan')
            ->call('update');

        self::assertDatabaseHas('customers', [
            'name' => 'John Doe Update',
            'phone' => '08666',
            'address' => 'Medan'
        ]);
    }

    public function testCustomerDelete()
    {
        $this->seed(DatabaseSeeder::class);
        self::assertDatabaseHas('customers', [
            'name' => 'John Doe'
        ]);
        $user = User::where('is_admin', true)->first();
        $customer = Customer::where('name', 'John Doe')->first();

        $this->actingAs($user);

        Livewire::test('customer.CustomerList')
            ->call('delete', $customer->id);

        self::assertDatabaseMissing('customers', [
            'name' => 'John Doe'
        ]);
    }
}
