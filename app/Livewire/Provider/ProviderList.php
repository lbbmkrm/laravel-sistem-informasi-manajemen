<?php

namespace App\Livewire\Provider;

use Livewire\Component;
use App\Models\Provider;
use Livewire\Attributes\Title;

class ProviderList extends Component
{
    #[Title('Providers')]
    public $providers;

    public function mount()
    {
        $this->providers = Provider::withCount('cards')
            ->with(['cards.sales' => function ($query) {
                $query->select('id', 'card_id', 'amount');
            }])
            ->get();
    }
    public function render()
    {
        return view('livewire.provider.provider');
    }
}
