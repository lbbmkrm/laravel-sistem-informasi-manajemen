<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerUpdate extends Component
{
    #[Title('Customer')]

    public $customer;

    #[Validate('required|string|max:100')]
    public $name;

    #[Validate('nullable|string|max:20')]
    public $phone;

    #[Validate('nullable|string')]
    public $address;


    public function mount(int $id)
    {
        $this->customer = Customer::find($id);
        if (!$this->customer) {
            session()->flash('error', 'customer not found');
            return redirect()->route('customer');
        }
        $this->name = $this->customer->name;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
    }
    public function update()
    {
        try {
            DB::transaction(function () {
                $customer = Customer::lockForUpdate()->find($this->customer->id);
                if ($customer->updated_at != $this->customer->updated_at) {
                    throw new Exception('Customer has been updated by other user');
                }
                $customer->update([
                    'name' => $this->name,
                    'phone' => $this->phone,
                    'address' => $this->address
                ]);
            });
            DB::update("UPDATE customers SET is_used = false WHERE id = ?;", [$this->customer->id]);
            return redirect()->route('customer')->with('success', 'Success Update Customer');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            DB::update("UPDATE customers SET is_used = false WHERE id = ?;", [$this->customer->id]);
            return redirect()->route('customer');
        }
    }
    public function render()
    {
        return view('livewire.customer.customer-update');
    }
}
