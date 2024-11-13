<?php

use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\User\UserList;
use App\Livewire\User\UserCreate;
use App\Livewire\Card\CardCreate;
use App\Livewire\Sale\SaleCreate;
use App\Livewire\Card\CardList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Livewire\Customer\CustomerList;
use App\Livewire\Provider\ProviderList;
use App\Livewire\Customer\CustomerCreate;
use App\Livewire\Provider\ProviderCreate;
use App\Livewire\Sale\SaleList;
use App\Livewire\User\UserUpdate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    //users
    Route::prefix('/users')->group(function () {
        Route::get('/', UserList::class)->name('user');
        Route::get('/create', UserCreate::class)->name('user.create');
        Route::get('/{id}/update', UserUpdate::class)->name('user.update');
    });

    //customers
    Route::prefix('/customers')->group(function () {
        Route::get('/', CustomerList::class)->name('customer');
        Route::get('/create', CustomerCreate::class)->name('customer.create');
    });

    //providers
    Route::prefix('/providers')->group(function () {
        Route::get('/', ProviderList::class)->name('provider');
        Route::get('/create', ProviderCreate::class)->name('provider.create');
    });

    //cards
    Route::prefix('cards')->group(function () {
        Route::get('/', CardList::class)->name('card');
        Route::get('/create', CardCreate::class)->name('card.create');
    });

    //sales
    Route::prefix('sales')->group(function () {
        Route::get('/', SaleList::class)->name('sale');
        Route::get('/create', SaleCreate::class)->name('sale.create');
    });


    //logout
    Route::post('/logout', function (): RedirectResponse {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

Route::get('/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);
