<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Livewire\Attributes\Title;
use Livewire\Component;

class SaleList extends Component
{
    #[Title('Sales')]
    public $sales;

    public function mount()
    {
        $this->sales = Sale::all();
    }
    public function render()
    {
        return view('livewire.sale.sale');
    }
}
