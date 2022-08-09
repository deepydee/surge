<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function register()
    {
        $data = $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:passwordConfirmation',
        ]);

        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->email = '';
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
