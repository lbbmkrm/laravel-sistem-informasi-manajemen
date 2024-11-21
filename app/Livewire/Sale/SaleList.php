<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class SaleList extends Component
{
    use WithPagination;

    #[Title('Sales')]
    public $search;
    public function render()
    {

        return view('livewire.sale.sale', [
            'sales' => Sale::where('amount', 'LIKE', "%{$this->search}%")
                ->orWhere('total', 'LIKE', "%{$this->search}%")
                ->orWhereHas('card', function ($query) {
                    $query->where('name', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('customer', function ($query) {
                    $query->where('name', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('user', function ($query) {
                    $query->where('name', 'LIKE', "%{$this->search}%");
                })->paginate(10)
        ]);
    }

    public function delete(int $id)
    {
        DB::delete("DELETE FROM sales WHERE id = $id;");

        return back()->with('success', 'Sale has deleted');
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }
}
