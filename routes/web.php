<?php

use App\Livewire\Admin\CustomerCreate;
use App\Livewire\Admin\ProfileCreate;
use App\Livewire\Auth\Login;
use App\Livewire\CardComponent;
use App\Livewire\Customer;
use App\Livewire\Dashboard;
use App\Livewire\Profile;
use App\Livewire\ProviderComponent;
use App\Livewire\SaleComponent;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/users', Profile::class)->name('profile');
    Route::get('/customers', Customer::class)->name('customer');
    Route::get('/providers', ProviderComponent::class)->name('provider');
    Route::get('/cards', CardComponent::class)->name('card');
    Route::get('/sales', SaleComponent::class)->name('sale');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

Route::get('/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);

Route::get('/users/create', ProfileCreate::class)->name('profile.create');
Route::get('/customers/create', CustomerCreate::class)->name('customer.create');
