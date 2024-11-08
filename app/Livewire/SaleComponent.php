<?php

namespace App\Livewire;

use App\Models\Sale as ModelsSale;
use Livewire\Attributes\Title;
use Livewire\Component;

class SaleComponent extends Component
{
    #[Title('Sales')]
    public $sales;

    public function mount()
    {
        $this->sales = ModelsSale::all();
    }
    public function render()
    {
        return view('livewire.sale');
    }
}
