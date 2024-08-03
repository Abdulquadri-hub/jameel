<?php

namespace App\Livewire\Admin\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone_no;

    public function render()
    {
        $data['row'] = Auth::user();

        $this->firstname = $data['row']->firstname;
        $this->lastname = $data['row']->lastname;
        $this->email = $data['row']->email;

        return view('livewire.admin.profile.profile', $data);
    }

    public function save()
    {

        $this->validate([
            'firstname' => "required",
            'lastname' => "required",
            'email' => "required|email"
        ]);

        $row = Auth::user();
       
        User::where("id", $row->id)->first()->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email 
        ]);

        session()->flash('success', 'Profile information successfully updated.');

        // return $this->redirect(route('brand.index'), navigate: true);
    }
}
