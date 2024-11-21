<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomerList extends Component
{
    #[Title('Customers')]
    public $search;
    public function render()
    {
        return view('livewire.customer.customer', [
            'customers' => Customer::where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('phone', 'LIKE', "%{$this->search}%")
                ->orWhere('address', 'LIKE', "%{$this->search}%")->simplePaginate(10)
        ]);
    }

    public function delete($id)
    {
        DB::delete("DELETE FROM customers WHERE id = {$id};");
        return back()->with('success', 'Customer deleted has successfull');
    }
}
