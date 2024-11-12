<?php

namespace App\Livewire\Provider;

use App\Models\Provider;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProviderCreate extends Component
{
    #[Title('Provider')]

    #[Validate('required')]
    public $name;

    public function create()
    {
        $this->validate();
        $provider = new Provider(['name' => $this->name]);
        $provider->save();
        return redirect()->route('provider')->with('success', 'Provider added successfully.');
    }
    public function render()
    {
        return view('livewire.provider.provider-create');
    }
}
