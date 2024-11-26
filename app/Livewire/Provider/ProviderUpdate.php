<?php

namespace App\Livewire\Provider;

use App\Models\Provider;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProviderUpdate extends Component
{
    #[Title('Provider Update')]

    public $provider;

    #[Validate('required|string|max:100')]
    public $providerName;

    public function mount(int $id)
    {
        $this->provider = Provider::find($id);
        $this->providerName = $this->provider->name;
    }

    public function update()
    {
        try {
            DB::transaction(function () {
                $provider = Provider::lockForUpdate()->find($this->provider->id);
                if ($provider->updated_at != $this->provider->updated_at) {
                    throw new Exception('Provider has been updated by other user');
                }
                $provider->name = $this->providerName;
                $provider->save();
            });
            DB::update("UPDATE providers SET is_used = false WHERE id = ?;", [$this->provider->id]);
            return redirect()->route('provider')->with('success', 'Provider has updated.');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            DB::update("UPDATE providers SET is_used = false WHERE id = ?;", [$this->provider->id]);
            return redirect()->route('provider');
        }
    }
    public function render()
    {
        return view('livewire.provider.provider-update');
    }
}
