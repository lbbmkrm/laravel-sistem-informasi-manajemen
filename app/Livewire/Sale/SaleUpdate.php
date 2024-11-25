<?php

namespace App\Livewire\Sale;

use App\Models\Card;
use App\Models\Customer;
use App\Models\Sale;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class SaleUpdate extends Component
{
    #[Title('Update Sale')]

    public $sale;
    public $card;
    public $customer = null;
    public $amount;

    public $cardList;
    public $customerList;

    public function mount(int $id)
    {
        $this->sale = Sale::find($id);

        if (!$this->sale) {
            session()->flash('error', 'Sale not found');
            return redirect()->route('sale');
        }

        $this->card = $this->sale->card_id;
        $this->customer = $this->sale->customer_id;
        $this->amount = $this->sale->amount;

        $this->cardList = Card::all();
        $this->customerList = Customer::all();
    }

    public function render()
    {
        return view('livewire.sale.sale-update');
    }

    public function update()
    {
        $this->validate([
            'card' => 'required|exists:cards,id',
            'customer' => 'nullable|exists:customers,id',
            'amount' => 'required|integer|min:1',
        ]);

        try {
            DB::transaction(function () {
                $sale = Sale::lockForUpdate()->find($this->sale->id);

                if (!$sale || $sale->updated_at != $this->sale->updated_at) {
                    throw new Exception('Data has been updated by another user');
                }

                $sale->update([
                    'card_id' => $this->card,
                    'customer_id' => $this->customer ?: null,
                    'amount' => $this->amount,
                    'total' => Card::find($this->card)->price * $this->amount,
                ]);
            });
            DB::update("UPDATE sales SET is_used = false WHERE id = ?;", [$this->sale->id]);
            return redirect()->route('sale')->with('success', 'Sale data updated successfully');
        } catch (Exception $e) {
            DB::update("UPDATE sales SET is_used = false WHERE id = ?;", [$this->sale->id]);
            session()->flash('error', $e->getMessage());
            return redirect()->route('sale');
        }
    }
}
