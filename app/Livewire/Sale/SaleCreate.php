<?php

namespace App\Livewire\Sale;

use App\Models\Card;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SaleCreate extends Component
{
    #[Title('Sale')]


    #[Validate('required')]
    public $customerName;

    #[Validate('required')]
    public $card;

    #[Validate('required|numeric')]
    public $amount;

    public $cards = [];

    public $user;
    public $customer;

    public function create()
    {
        $user = Auth::user();
        $customer = Customer::firstOrCreate(['name' => $this->customerName], [
            'name' => $this->customerName
        ]);

        $card = Card::find($this->card);

        $this->validate();
        $sale = new Sale([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'card_id' => $card->id,
            'amount' => $this->amount,
            'total' => $card->price * $this->amount
        ]);
        $sale->save();

        return redirect()->route('sale')->with('success', 'Sale data has been added.');
    }
    public function render()
    {
        return view('livewire.sale.sale-create', [
            'cardsData' => Card::all()
        ]);
    }
}
