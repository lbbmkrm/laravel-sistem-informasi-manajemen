<?php

namespace App\Livewire\Provider;

use Livewire\Component;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class ProviderList extends Component
{
    use WithPagination;
    #[Title('Providers')]
    public $search;
    public function render()
    {
        $query = Provider::withCount('cards')->with([
            'cards.sales' => function ($query) {
                $query->select('id', 'card_id', 'amount');
            }
        ]);
        if ($this->search) {
            $query->where('name', 'LIKE', "%{$this->search}%");
        }


        return view('livewire.provider.provider', [
            'providers' => $query->simplePaginate(10)
        ]);
    }

    public function delete(int $id)
    {
        DB::delete("DELETE FROM providers WHERE id = $id;");
        return $this->render()->with('success', 'a provider has deleted');
    }
}
