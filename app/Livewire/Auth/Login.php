<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login')]
    #[Layout('components/layouts/auth')]

    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Wrong credentials!');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
