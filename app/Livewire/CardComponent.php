<?php

namespace App\Livewire;

use App\Models\Card;
use Livewire\Component;

class CardComponent extends Component
{
    public $cards;

    public function mount()
    {
        $this->cards = Card::all();
    }
    public function render()
    {
        return view('livewire.card');
    }
}
