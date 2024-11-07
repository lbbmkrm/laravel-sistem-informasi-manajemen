<?php

use App\Livewire\Card;
use App\Livewire\Customer;
use App\Livewire\Dashboard;
use App\Livewire\Profile;
use App\Livewire\Provider;
use App\Livewire\Sale;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/users', Profile::class)->name('profile');
Route::get('/customers', Customer::class)->name('customer');
Route::get('/providers', Provider::class)->name('provider');
Route::get('/cards', Card::class)->name('card');
Route::get('/sales', Sale::class)->name('sale');
