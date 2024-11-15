<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
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

    public function delete(int $id)
    {
        DB::delete("DELETE FROM sales WHERE id = $id;");

        return $this->sales = Sale::all();
    }
}
