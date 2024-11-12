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
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/users', UserList::class)->name('user');
    Route::get('/customers', CustomerList::class)->name('customer');
    Route::get('/providers', ProviderList::class)->name('provider');
    Route::get('/cards', CardList::class)->name('card');
    Route::get('/sales', SaleList::class)->name('sale');
    Route::post('/logout', function (): RedirectResponse {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

Route::get('/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);

Route::get('/users/create', UserCreate::class)->name('user.create');
Route::get('/customers/create', CustomerCreate::class)->name('customer.create');
Route::get('/providers/create', ProviderCreate::class)->name('provider.create');
Route::get('/cards/create', CardCreate::class)->name('card.create');
Route::get('/sales/create', SaleCreate::class)->name('sale.create');
