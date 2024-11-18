<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function testLogin()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::where('email', 'admin@example.com')->first();

        $this->actingAs($user)->get('/')
            ->assertStatus(200);
    }

    public function testNoLogin()
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/')
            ->assertRedirect('/login');
    }

    public function testLogout()
    {
        $this->seed(DatabaseSeeder::class);
        $user = User::where('email', 'admin@example.com')->first();
        $this->actingAs($user)->post('/logout')
            ->assertRedirect('/login');
    }
}
