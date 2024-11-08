<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Profiles')]
    public $users;
    public function mount()
    {
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.profile');
    }
}
