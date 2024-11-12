<?php

namespace App\Livewire\Admin;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerCreate extends Component
{
    #[Title('Customer')]

    #[Validate('required')]
    public $name;

    #[Validate('max:20')]
    public $phone;

    #[Validate('string')]
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
        return view('livewire.admin.customer-create');
    }
}
