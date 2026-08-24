<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{

    use WithFileUploads, WithPagination;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:3')]
    public $password = '';

    #[Validate('image|max:5000')]
    public $avatar = '';


    public function createNewUser()
    {
        $this->validate();


        if ($this->avatar && is_object($this->avatar)) {
            $avatarPath = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $avatarPath,
        ]);

        $this->reset();

        session()->flash('success', 'User successfully created');
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Users Page',
            'users' => User::latest()->paginate(6),
        ]);
    }
}
