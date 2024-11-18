<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Provider;
use Database\Seeders\DatabaseSeeder;

class ProviderTest extends TestCase
{
    use RefreshDatabase;
    public function testProviderList()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::where('is_admin', true)->first();

        $this->actingAs($user)->get('/providers')
            ->assertStatus(200);
    }

    public function testProviderCreate()
    {
        self::assertDatabaseEmpty('providers');

        Livewire::test('provider.ProviderCreate')
            ->set('name', 'New Provider')
            ->call('create');

        self::assertDatabaseHas('providers', [
            'name' => 'New Provider'
        ]);
    }

    public function testProviderUpdate()
    {
        $this->seed(DatabaseSeeder::class);
        self::assertDatabaseHas('providers', [
            'name' => 'Provider A'
        ]);

        $provider = Provider::where('name', 'Provider A')->first();

        Livewire::test('provider.ProviderUpdate', [$provider->id])
            ->set('providerName', 'Provider Updated')
            ->call('update');

        self::assertDatabaseHas('providers', [
            'name' => 'Provider Updated'
        ]);
    }

    public function testProviderDelete()
    {
        $this->seed(DatabaseSeeder::class);
        $admin = User::where('is_admin', true)->first();
        self::assertDatabaseHas('providers', [
            'name' => 'Provider A'
        ]);
        $provider = Provider::where('name', 'Provider A')->first();

        $this->actingAs($admin);
        Livewire::test('provider.ProviderList')
            ->call('delete', $provider->id);

        self::assertDatabaseMissing('providers', [
            'name' => 'Provider A'
        ]);
    }
}
