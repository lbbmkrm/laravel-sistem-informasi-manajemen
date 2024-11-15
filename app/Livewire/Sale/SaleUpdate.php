<?php

namespace App\Livewire\Sale;

use App\Models\Card;
use App\Models\Customer;
use App\Models\Sale;
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
        $this->sale->update([
            'card_id' => $this->card,
            'amount' => $this->amount,
            'total' => $this->sale->card->price * $this->amount,
        ]);

        $this->sale->customer->update([
            'name' => $this->customer
        ]);

        return redirect()->route('sale')->with('success', 'Sale data updated successfull');
    }
}
