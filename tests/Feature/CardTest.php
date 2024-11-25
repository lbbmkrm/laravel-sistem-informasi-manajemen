<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Card;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Provider;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ProviderSeeder;
use Illuminate\Support\Facades\Log;

class CardTest extends TestCase
{
    use RefreshDatabase;
    public function testCardList()
    {
        $this->seed(DatabaseSeeder::class);
        $user = User::where('is_admin', true)->first();

        $this->actingAs($user)->get('/cards')
            ->assertStatus(200);
    }

    public function testCardCreate()
    {
        self::assertDatabaseEmpty('cards');

        $this->seed(ProviderSeeder::class);
        $provider = Provider::where('name', 'Provider A')->first();

        Livewire::test('card.CardCreate')
            ->set('name', 'Card A')
            ->set('provider', $provider->id)
            ->set('stock', 10)
            ->set('price', 10000)
            ->call('create');

        self::assertDatabaseHas('cards', [
            'name' => 'Card A',
            'provider_id' => $provider->id,
            'stock' => 10,
            'price' => 10000
        ]);
    }

    public function testUpdate()
    {
        $provider = new Provider([
            'name' => 'Provider Ex'
        ]);
        $provider->save();
        self::assertDatabaseHas('providers', [
            'name' => 'Provider Ex'
        ]);
        $card = new Card([
            'name' => 'Test Card',
            'provider_id' => $provider->id,
            'stock' => 666,
            'price' => 100_000
        ]);
        $card->save();
        self::assertDatabaseHas('cards', [
            'name' => 'Test Card',
            'stock' => 666,
            'price' => 100_000
        ]);

        $provider2 = new Provider([
            'name' => 'Provider Ex'
        ]);
        $provider2->save();

        Livewire::test('card.CardUpdate', [$card->id])
            ->set('name', 'Card Updated')
            ->set('provider', $provider2->id)
            ->set('price', 123)
            ->set('stock', 123)
            ->call('update');

        self::assertDatabaseHas('cards', [
            'name' => 'Card Updated',
            'stock' => 123,
            'price' => 123
        ]);
        Log::info(json_encode(Card::all()));
    }

    public function testDelete()
    {
        $this->seed(DatabaseSeeder::class);
        self::assertDatabaseHas('cards', [
            'name' => 'Provider A Card 1'
        ]);
        $card = Card::where('name', 'Provider A Card 1')->first();

        $admin = User::where('is_admin', true)->first();

        $this->actingAs($admin);
        Livewire::test('card.CardList')
            ->call('delete', $card->id);

        self::assertDatabaseMissing('cards', [
            'name' => 'Provider A Card 1'
        ]);
    }
}
