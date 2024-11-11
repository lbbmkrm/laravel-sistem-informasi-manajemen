<?php

namespace App\Livewire\Admin;

use App\Models\Provider;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProviderCreate extends Component
{
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
        return view('livewire.admin.provider-create');
    }
}
