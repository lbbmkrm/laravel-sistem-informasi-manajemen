<?php

namespace App\Livewire;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;

class Customer extends Component
{
    public $customers;
    public function mount()
    {
        $this->customers = ModelsCustomer::all();
    }
    public function render()
    {
        return view('livewire.customer');
    }
}
