<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class Register extends Component
{

    public $firstname, $lastname, $email, $country, $state, $city, 
    $postal_code, $password, $terms;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function save()
    {
        $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'password' => 'required|string|min:8',

        ]);

        User::create([
            'uid' => Str::uuid(),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'password' => Hash::make($this->password),
            'terms' => $this->terms,
            // 'role' => $this->role,
        ]);

        session()->flash('success', 'User successfully created.');

        $this->reset();

        return $this->redirect(route('login'), navigate: true);
    }
}
