<?php

namespace App\Livewire\Admin;

use App\Models\Card;
use App\Models\Provider;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CardCreate extends Component
{
    #[Title('Card')]

    #[Validate('required')]
    public $name;

    #[Validate('required|numeric')]
    public $provider;

    #[Validate('numeric')]
    public $stock;

    #[Validate('numeric')]
    public $price;

    protected $providers = [];

    public function create()
    {
        $this->validate();

        $card = new Card([
            'name' => $this->name,
            'provider_id' => $this->provider,
            'stock' => $this->stock,
            'price' => $this->price
        ]);
        $card->save();

        return redirect()->route('card')->with('success', 'Card added successfull.');
    }
    public function render()
    {
        return view('livewire.admin.card-create', ['providers' => Provider::all()]);
    }
}
