<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use function PHPUnit\Framework\isNull;

class SaleList extends Component
{
    use WithPagination;

    #[Title('Sales')]
    protected $listeners = [
        'dataChanged' => '$refresh',
        'refreshComponent' => '$refresh'
    ];

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
                })
                ->paginate(10)
        ]);
    }

    public function validateBeforeUpdate(int $id)
    {
        $sale = Sale::lockForUpdate()->find($id);

        if (!$sale) {
            $this->dispatch('refreshComponent');
            return;
        }
        DB::update("UPDATE sales SET is_used = true
            WHERE id = ?", [$id]);
        return redirect()->route('sale.update', $id);
    }

    public function delete(int $id)
    {
        $errorMessage = null;
        DB::transaction(function () use ($id, &$errorMessage) {
            $sale = Sale::where('id', $id)->lockForUpdate()->first();
            if ($sale->is_used) {
                $errorMessage = 'This data is used by other user';
                return;
            }
            if ($sale) {
                $sale->delete();
            }
        });
        if ($errorMessage) {
            session()->flash('error', $errorMessage);
            return;
        }

        $this->dispatch('dataChanged');
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }
}
