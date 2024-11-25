<?php

namespace App\Livewire\Sale;

use App\Models\Card;
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
    public $customer;
    public $amount;

    private array $cards;

    public $cardList;

    public function mount(int $id)
    {
        $this->sale = Sale::find($id);
        if (!$this->sale) {
            session()->flash('error', 'Sale not found');
            return redirect()->route('sale');
        }
        $this->card = $this->sale->card_id;
        $this->cardList = Card::all();
        $this->amount = $this->sale->amount;
        $this->customer = $this->sale->customer->name;
    }
    public function render()
    {
        return view('livewire.sale.sale-update');
    }

    public function update()
    {
        $this->validate([
            'card' => 'required|exists:cards,id',
            'customer' => 'required|string|max:255',
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
                    'amount' => $this->amount,
                    'total' => Card::find($this->card)->price * $this->amount,
                ]);

                if ($sale->customer) {
                    $sale->customer->update(['name' => $this->customer]);
                }
            });
            DB::update("UPDATE sales SET is_used = false WHERE id = ?;", [$this->sale->id]);
            return redirect()->route('sale')->with('success', 'Sale data updated successfully');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            DB::update("UPDATE sales SET is_used = false WHERE id = ?;", [$this->sale->id]);
            return redirect()->route('sale');
        }
    }
}
