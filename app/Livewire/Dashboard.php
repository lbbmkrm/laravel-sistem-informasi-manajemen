<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Provider;
use App\Models\Sale;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $customers;
    public $providers;
    public $totalSale;
    public $amountSale;
    public function mount()
    {
        $this->customers = Customer::count();
        $this->providers = Provider::count();
        $this->amountSale = Sale::sum('amount');
        $this->totalSale = Sale::sum('total');
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
