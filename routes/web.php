<?php

use App\Livewire\CardComponent;
use App\Livewire\Customer;
use App\Livewire\Dashboard;
use App\Livewire\Profile;
use App\Livewire\ProviderComponent;
use App\Livewire\SaleComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/users', Profile::class)->name('profile');
Route::get('/customers', Customer::class)->name('customer');
Route::get('/providers', ProviderComponent::class)->name('provider');
Route::get('/cards', CardComponent::class)->name('card');
Route::get('/sales', SaleComponent::class)->name('sale');
