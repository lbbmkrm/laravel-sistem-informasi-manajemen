<?php

namespace App\Livewire\Provider;

use Livewire\Component;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;

class ProviderList extends Component
{
    #[Title('Providers')]
    public $providers;
    public $loginUser;

    public function mount()
    {
        $this->providers = Provider::withCount('cards')
            ->with(['cards.sales' => function ($query) {
                $query->select('id', 'card_id', 'amount');
            }])
            ->get();

        $this->loginUser = Auth::user();
    }
    public function render()
    {
        return view('livewire.provider.provider');
    }

    public function delete(int $id)
    {
        DB::delete("DELETE FROM providers WHERE id = $id;");
        return
            $this->providers = Provider::withCount('cards')
            ->with(['cards.sales' => function ($query) {
                $query->select('id', 'card_id', 'amount');
            }])
            ->get();
    }
}
