<?php

namespace App\Livewire\Card;

use App\Models\Card;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Provider;

class CardList extends Component
{
    use WithPagination;
    #[Title('Cards')]

    public $search;
    public function render()
    {
        return view('livewire.card.card', [
            'cards' => Card::where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('name', 'LIKE', "%{$this->search}%")
                ->orWhere('stock', 'LIKE', "%{$this->search}%")
                ->orWhere('price', 'LIKE', "%{$this->search}%")
                ->orWhereHas('provider', function ($query) {
                    $query->where('name', 'LIKE', "%{$this->search}%");
                })->paginate(10)
        ]);
    }

    public function delete(int $id)
    {
        DB::delete("DELETE FROM cards WHERE id = $id;");

        return back()->with('success', 'A card has been deleted');
    }
}
