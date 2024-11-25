<?php

namespace App\Livewire\Provider;

use Livewire\Component;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class ProviderList extends Component
{
    use WithPagination;
    #[Title('Providers')]
    protected $listeners = [
        'dataChanged' => '$refresh',
        'refreshComponent' => '$refresh'
    ];
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

    public function validateBeforeUpdate(int $id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            $this->dispatch('refreshComponent');
            return;
        }
        DB::update("UPDATE providers SET is_used = true WHERE id = ?;", [$id]);
        return redirect()->route('provider.update', $id);
    }

    public function delete(int $id)
    {
        $errorMessage = null;
        DB::transaction(function () use ($id, &$errorMessage) {
            $provider = Provider::lockForUpdate()->findOrFail($id);
            if ($provider->is_used) {
                $errorMessage = 'This data is used by other user';
                return;
            }
            $provider->delete();
        });
        if ($errorMessage) {
            session()->flash('error', $errorMessage);
        }
        $this->dispatch('dataChanged');
    }
}
