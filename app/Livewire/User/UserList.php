<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserList extends Component
{
    #[Title('Profiles')]
    protected $listener = [
        'dataChanged' => '$refresh',
        'refreshComponent' => '$refresh'
    ];
    public function render()
    {
        return view('livewire.user.user', [
            'users' => User::all()
        ]);
    }

    public function validateBeforeUpdate(int $id)
    {
        $user = User::find($id);
        if (!$user) {
            $this->dispatch('refreshComponent');
            return;
        }
        return redirect()->route('user.update', $id);
    }
    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            $user = User::where('id', $id)->lockForUpdate()->first();
            $user->delete();
        });
        $this->dispatch('dataChanged');
    }
}
