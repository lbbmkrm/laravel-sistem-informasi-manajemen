<?php

namespace App\Livewire\Card;

use App\Models\Card;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CardList extends Component
{
    use WithPagination;
    #[Title('Cards')]

    protected $listener = [
        'dataChanged' => '$refresh',
        'refreshComponent' => '$refresh'
    ];

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

    public function validateBeforeUpdate(int $id)
    {
        $card = Card::find($id);
        if (!$card) {
            $this->dispatch('refreshCompoent');
            return;
        }
        DB::update("update cards SET is_used = true WHERE id = ?;", [$id]);
        return redirect()->route('card.update', $id);
    }

    public function delete(int $id)
    {
        $errorMessage = null;
        DB::transaction(function () use ($id, &$errorMessage) {
            $card = Card::lockForUpdate()->find($id);
            if ($card->is_used) {
                $errorMessage = 'This data is used by other user';
                return;
            }
            $card->delete();
        });
        if ($errorMessage) {
            session()->flash('error', $errorMessage);
        }
        $this->dispatch('refreshComponent');
    }
}
