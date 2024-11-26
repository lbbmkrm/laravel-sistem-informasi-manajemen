<?php

namespace App\Livewire\Card;

use App\Models\Card;
use App\Models\Provider;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CardUpdate extends Component
{
    #[Title('Card Update')]

    public $card;

    #[Validate('required|string')]
    public $name;

    #[Validate('required|string')]
    public $provider;

    #[Validate('nullable|integer')]
    public $stock;

    #[Validate('nullable|integer')]
    public $price;
    public $providersList;
    public array $providers;

    public function mount(int $id)
    {
        $this->card = Card::find($id);

        // Cek apakah card ada
        if (!$this->card) {
            session()->flash('error', 'Card not found.');
            return redirect()->route('card');
        }

        $this->name = $this->card->name;
        $this->stock = $this->card->stock;
        $this->price = $this->card->price;
        $this->provider = $this->card->provider_id;

        $this->providersList = Provider::all();
    }

    public function update()
    {
        try {
            DB::transaction(function () {
                $card = Card::lockForUpdate()->find($this->card->id);

                // Cek apakah card telah diperbarui oleh pengguna lain
                if ($card->updated_at != $this->card->updated_at) {
                    throw new Exception('Card has been updated by another user.');
                }

                $card->update([
                    'name' => $this->name,
                    'provider_id' => $this->provider,
                    'stock' => $this->stock,
                    'price' => $this->price
                ]);
            });
            DB::update("UPDATE cards SET is_used = false WHERE id = ?", [$this->card->id]);
            return redirect()->route('card')->with('success', 'Card updated successfully.');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            DB::update("UPDATE cards SET is_used = false WHERE id = ?", [$this->card->id]);
            return redirect()->route('card');
        }
    }
    public function render()
    {
        return view('livewire.card.card-update');
    }
}
