<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomerList extends Component
{
    #[Title('Customers')]
    public $customers;
    public $loginUser;
    public function mount()
    {
        $this->customers = Customer::all();
        $this->loginUser = Auth::user();
    }
    public function render()
    {
        return view('livewire.customer.customer');
    }
}
