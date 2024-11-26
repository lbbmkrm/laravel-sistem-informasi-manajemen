<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerCreate extends Component
{
    #[Title('Customer')]

    #[Validate('required|string|max:100')]
    public $name;

    #[Validate('nullable|string|max:20')]
    public $phone;

    #[Validate('nullable|string')]
    public $address;

    public function create()
    {
        $this->validate();
        $customer = new Customer([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address
        ]);
        $customer->save();
        return redirect()->route('customer')->with('success', 'Customer added successfull.');
    }
    public function render()
    {
        return view('livewire.customer.customer-create');
    }
}
