<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProfileCreate extends Component
{

    #[Title('Profile')]

    #[Validate('required')]
    public $name;
    #[Validate('required:email')]
    public $email;
    #[Validate('required|min:6')]
    public $password;
    #[Validate('required')]
    public $role;
    public $roles = [];

    public function create()
    {
        $this->validate();
        $user = new User([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'is_admin' => $this->role
        ]);
        $user->save();

        return redirect()->route('profile')->with('success', 'User create successful.');
    }
    public function render()
    {
        return view('livewire.admin.profile-create');
    }
}
