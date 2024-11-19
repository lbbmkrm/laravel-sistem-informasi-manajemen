<?php

use App\Http\Controllers\DataController;
use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\User\UserList;
use App\Livewire\User\UserCreate;
use App\Livewire\Card\CardCreate;
use App\Livewire\Sale\SaleCreate;
use App\Livewire\Card\CardList;
use App\Livewire\Card\CardUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Livewire\Customer\CustomerList;
use App\Livewire\Provider\ProviderList;
use App\Livewire\Customer\CustomerCreate;
use App\Livewire\Customer\CustomerUpdate;
use App\Livewire\Provider\ProviderCreate;
use App\Livewire\Provider\ProviderUpdate;
use App\Livewire\Sale\SaleList;
use App\Livewire\Sale\SaleUpdate;
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
        Route::get('/{id}/update', CustomerUpdate::class)->name('customer.update');
    });

    //providers
    Route::prefix('/providers')->group(function () {
        Route::get('/', ProviderList::class)->name('provider');
        Route::get('/create', ProviderCreate::class)->name('provider.create');
        Route::get('/{id}/update', ProviderUpdate::class)->name('provider.update');
    });

    //cards
    Route::prefix('cards')->group(function () {
        Route::get('/', CardList::class)->name('card');
        Route::get('/create', CardCreate::class)->name('card.create');
        Route::get('/{id}/update', CardUpdate::class)->name('card.update');
    });

    //sales
    Route::prefix('sales')->group(function () {
        Route::get('/', SaleList::class)->name('sale');
        Route::get('/create', SaleCreate::class)->name('sale.create');
        Route::get('/{id}/update', SaleUpdate::class)->name('sale.update');
    });

    //data download
    Route::controller(DataController::class)->group(function () {
        Route::get('/sales/download', 'saleDownload')->name('data.sale');
        Route::get('/cards/download', 'cardDownload')->name('data.card');
        Route::get('/providers/download', 'providerDownload')->name('data.provider');
        Route::get('/customers/download', 'customerDownload')->name('data.customer');
    });


    //logout
    Route::post('/logout', function (): RedirectResponse {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

Route::get('/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);
