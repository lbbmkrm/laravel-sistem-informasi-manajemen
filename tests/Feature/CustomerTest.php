<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Customer;
use Database\Seeders\UserSeeder;
use Database\Seeders\DatabaseSeeder;

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
        $customer = new Customer([
            'name' => 'John Doe',
            'phone' => "080808",
            'address' => 'Medan'
        ]);
        $customer->save();

        self::assertDatabaseHas('customers', [
            'name' => 'John Doe',
            'phone' => "080808",
            'address' => 'Medan'
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
