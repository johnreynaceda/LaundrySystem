<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserRegistration extends Component
{
    public $name, $email, $contact, $address, $password, $password_confirmation;
    public function render()
    {
        return view('livewire.user-registration');
    }

    public function registerUser(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' =>'required',
            'address' =>'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name'=> $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'address' => $this->address,
            'password' => bcrypt($this->password),
        ]);

        auth()->loginUsingId($user->id);
        sleep(2);

        return redirect()->route('dashboard');
    }
}
