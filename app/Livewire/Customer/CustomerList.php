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
    protected $listener = ['dataChanged' => 'refresh'];
    public $search;
    public function render()
    {
        return view('livewire.customer.customer', [
            'customers' => Customer::where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('phone', 'LIKE', "%{$this->search}%")
                ->orWhere('address', 'LIKE', "%{$this->search}%")->simplePaginate(10)
        ]);
    }

    public function validateBeforeUpdate(int $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            $this->dispatch('refreshComponent');
            return;
        }
        DB::update("UPDATE customers SET is_used = true WHERE id = ?;", [$id]);
        return redirect()->route('customer.update', $id);
    }

    public function delete($id)
    {
        $errorMessage = null;
        DB::transaction(function () use ($id, &$errorMessage) {
            $customer = Customer::lockForUpdate()->find($id);
            if ($customer->is_used) {
                $errorMessage = 'This data is used by other user';
                return;
            }
            $customer->delete();
        });
        if ($errorMessage) {
            session()->flash('error', $errorMessage);
        }
        $this->dispatch('dataChanged');
    }
}
