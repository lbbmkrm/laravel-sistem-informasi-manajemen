<?php

namespace App\Livewire\Provider;

use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProviderUpdate extends Component
{
    #[Title('Provider Update')]

    public $provider;
    public $providerName;

    public function mount(int $id)
    {
        $this->provider = Provider::find($id);
        $this->providerName = $this->provider->name;
    }

    public function update()
    {
        DB::table('providers')->where('id', $this->provider->id)
            ->update([
                'name' => $this->providerName
            ]);

        return redirect()->route('provider')->with('success', 'Provider has updated.');
    }
    public function render()
    {
        return view('livewire.provider.provider-update');
    }
}
