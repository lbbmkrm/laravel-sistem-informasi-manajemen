<?php

namespace App\Livewire\Card;

use App\Models\Card;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class CardUpdate extends Component
{
    #[Title('Card Update')]

    public $card;
    public $name;
    public $provider;
    public $stock;
    public $price;
    public $providersList;
    public array $providers;

    public function mount(int $id)
    {
        $this->card = Card::find($id);
        $this->name = $this->card->name;
        $this->stock = $this->card->stock;
        $this->price = $this->card->price;

        $this->providersList = Provider::all();
    }

    public function update()
    {
        $this->card->update([
            'name' => $this->name,
            'provider_id' => $this->provider,
            'stock' => $this->stock,
            'price' => $this->price
        ]);

        return redirect()->route('card')->with('success', 'card updated successfull');
    }
    public function render()
    {
        return view('livewire.card.card-update');
    }
}
