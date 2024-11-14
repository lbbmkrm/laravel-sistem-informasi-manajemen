<?php

namespace App\Livewire\Card;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function delete(int $id)
    {
        DB::delete("DELETE FROM cards WHERE id = $id;");

        return $this->cards = Card::all();
    }
}
