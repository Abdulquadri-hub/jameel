<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $remember = false;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function auth()
    {
        $credentials  = $this->validate([
            'email'=> "required|string|email",
            'password'=> "required"
        ]);

        if(Auth::attempt($credentials , $this->remember)){

            $row = Auth::user();
            
            session()->put("USER",$row);

            session()->flash('success', 'Welcome back!.');
        
            // if($row->email_verified_at)
            // {
                if($row->role == "admin")
                {                    
                    return $this->redirect(route('admin.dashboard'), navigate: true);

                }elseif ($row->role == "seller") 
                {
                    return $this->redirect(route('seller.dashboard'), navigate: true);

                }else {

                    return $this->redirect(route('customer.dashboard'), navigate: true);
                }
                
            // }
            
            // $this->addError('wrong', 'You must verify your email to access this service');
            
        }

        $this->addError('wrong', 'Wrong login details');
    }
}
