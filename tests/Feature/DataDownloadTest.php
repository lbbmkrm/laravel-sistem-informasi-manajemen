<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\CardSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\ProviderSeeder;
use Database\Seeders\SaleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataDownloadTest extends TestCase
{
    use RefreshDatabase;

    public function testCustomerDownload()
    {
        $this->seed([CustomerSeeder::class, UserSeeder::class]);
        $user = User::where('name', 'Admin User')->first();
        self::assertEquals('Admin User', $user->name);

        $this->actingAs($user)->get('/customers/download')
            ->assertDownload('customer-report.pdf');
    }

    public function testProviderDownload()
    {
        $this->seed([UserSeeder::class, ProviderSeeder::class]);
        $user = User::where('name', 'Admin User')->first();
        self::assertEquals('Admin User', $user->name);

        $this->actingAs($user)->get(route('data.provider'))
            ->assertDownload('provider-report.pdf');
    }

    public function testCardDownload()
    {
        $this->seed([UserSeeder::class, ProviderSeeder::class, CardSeeder::class]);
        $user = User::where('name', 'Admin User')->first();
        self::assertEquals('Admin User', $user->name);

        $this->actingAs($user)->get('/cards/download')
            ->assertDownload('card-report.pdf');
    }

    public function testSaleDownload()
    {
        $this->seed([
            UserSeeder::class,
            CustomerSeeder::class,
            ProviderSeeder::class,
            CardSeeder::class,
            SaleSeeder::class
        ]);
        $user = User::where('name', 'Admin User')->first();
        self::assertEquals('Admin User', $user->name);

        $this->actingAs($user)->get('/sales/download')
            ->assertDownload('sale-report.pdf');
    }
}
