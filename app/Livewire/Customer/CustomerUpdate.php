<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomerUpdate extends Component
{
    #[Title('Customer')]

    public $customer;
    public $name;
    public $phone;
    public $address;


    public function mount($id)
    {
        $this->customer = Customer::find($id);
        $this->name = $this->customer->name;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
    }
    public function update()
    {
        DB::table('customers')->where('id', $this->customer->id)->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address
        ]);

        return redirect()->route('customer')->with('success', 'Success Update Customer');
    }
    public function render()
    {
        return view('livewire.customer.customer-update');
    }
}
