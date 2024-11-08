<?php

namespace App\Livewire;

use App\Models\Customer as ModelsCustomer;
use Livewire\Attributes\Title;
use Livewire\Component;

class Customer extends Component
{
    #[Title('Customers')]
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
