<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomerList extends Component
{
    #[Title('Customers')]
    public $customers;
    public function mount()
    {
        $this->customers = Customer::all();
    }
    public function render()
    {
        return view('livewire.customer.customer');
    }
}
