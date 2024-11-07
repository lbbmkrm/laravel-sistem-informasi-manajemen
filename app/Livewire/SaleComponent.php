<?php

namespace App\Livewire;

use App\Models\Sale as ModelsSale;
use Livewire\Component;

class SaleComponent extends Component
{
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
