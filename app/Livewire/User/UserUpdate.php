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
    public $password;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'is_admin' => 'required|boolean',
            'password' => 'nullable|string|min:8',
        ];
    }

    public function mount($id)
    {
        $this->user = User::find($id);

        if (!$this->user) {
            session()->flash('error', 'User not found');
            return redirect()->route('user');
        }

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->is_admin = $this->user->is_admin;
    }

    public function update()
    {
        try {
            $this->validate();

            DB::transaction(function () {
                $user = User::lockForUpdate()->find($this->user->id);

                if ($user->updated_at != $this->user->updated_at) {
                    throw new \Exception('Data has been updated by another user');
                }

                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password === $this->user->password
                        ? $this->password
                        : bcrypt($this->password),
                    'is_admin' => $this->is_admin,
                ]);
            });

            session()->flash('success', "User {$this->name} was updated");
            return redirect()->route('user');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('user');
        }
    }

    public function render()
    {
        return view('livewire.user.user-update');
    }
}
