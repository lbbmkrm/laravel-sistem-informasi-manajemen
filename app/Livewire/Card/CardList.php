<?php

namespace App\Livewire\Card;

use App\Models\Card;
use Livewire\Attributes\Title;
use Livewire\Component;

class CardList extends Component
{
    #[Title('Cards')]
    public $cards;

    public function mount()
    {
        $this->cards = Card::all();
    }
    public function render()
    {
        return view('livewire.card.card');
    }
}
