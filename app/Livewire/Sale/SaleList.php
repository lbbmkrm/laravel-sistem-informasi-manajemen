<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;

class SaleList extends Component
{
    #[Title('Sales')]
    public $sales;

    public function mount()
    {
        $this->sales = Sale::latest()->get();
    }
    public function render()
    {
        return view('livewire.sale.sale');
    }

    public function delete(int $id)
    {
        DB::delete("DELETE FROM sales WHERE id = $id;");

        return $this->sales = Sale::latest()->get();
    }
}
