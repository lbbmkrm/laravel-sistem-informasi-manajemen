<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserUpdate extends Component
{
    #[Title('User Update')]

    public $user;
    public $name;
    public $email;
    public $is_admin;
    public $is_admins = [];
    public $password;
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'required',
        ];
    }

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->is_admin = $this->user->is_admin;
    }

    public function update()
    {
        $this->validate();
        DB::table('users')->where('id', $this->user->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'is_admin' => $this->is_admin
        ]);

        return redirect()->route('user')->with('success', "User {$this->user->name} was updated");
    }
    public function render()
    {
        return view('livewire.user.user-update');
    }
}
