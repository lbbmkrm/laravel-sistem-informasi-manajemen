<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Facades\Log;
use Database\Seeders\DatabaseSeeder;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function testUserList()
    {
        $this->seed(DatabaseSeeder::class);
        $user = User::where('email', 'admin@example.com')->first();
        $this->actingAs($user)->get('/users')
            ->assertStatus(200)
            ->assertSeeText('admin@example.com');
    }

    public function testUserCreate()
    {
        Livewire::test('user.user-create')
            ->set('name', 'Test')
            ->set('email', 'test@test.com')
            ->set('role', true)
            ->set('password', 'password123')
            ->call('create');

        $this->assertDatabaseHas('users', [
            'name' => 'Test',
            'email' => 'test@test.com',
        ])->assertDatabaseCount('users', 1);
    }


    public function testUserUpdate()
    {
        $this->seed(DatabaseSeeder::class);

        self::assertDatabaseHas('users', [
            'name' => 'Admin User'
        ]);

        $user = User::where('email', 'admin@example.com')->first();
        Log::info(json_encode($user));

        Livewire::test('user.user-update', ['id' => $user->id])
            ->set('name', 'Admin Updated')
            ->set('email', 'admin.update@example.com')
            ->call('update');

        $this->assertDatabaseHas('users', [
            'name' => 'Admin Updated',
            'email' => 'admin.update@example.com'
        ]);
    }

    public function testUserDelete()
    {
        $this->seed(DatabaseSeeder::class);
        self::assertDatabaseCount('users', 5);

        $adminUser = User::where('is_admin', true)->first();
        $this->actingAs($adminUser);
        $user = User::where('name', 'John Doe')->first();

        Livewire::test('user.UserList')
            ->call('delete', $user->id);

        self::assertDatabaseCount('users', 4);
    }
}
