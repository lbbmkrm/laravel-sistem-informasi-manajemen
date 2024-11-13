<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserList extends Component
{
    #[Title('Profiles')]
    public $users;
    public $loginUser;
    public function mount()
    {
        $this->users = User::all();
        $this->loginUser = Auth::user();
    }
    public function render()
    {
        return view('livewire.user.user');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $this->users = User::all();
        $this->loginUser = Auth::user();
    }
}
