<?php

namespace App\Livewire\Card;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class CardList extends Component
{
    #[Title('Cards')]
    public $cards;
    public $loginUser;
    public function mount()
    {
        $this->cards = Card::all();
        $this->loginUser = Auth::user();
    }
    public function render()
    {
        return view('livewire.card.card');
    }
}
