<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class EmailValidate extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.email-validate');
    }
    public function validaEmail()
    {
        if (!$this->email) return;
        $emails = User::where('email', $this->email)->get();
        if (count($emails) > 0) {
            $this->dispatchBrowserEvent('email-invalido');
            session()->flash('message', 'Este email já está em uso!');
        } else {
            $this->dispatchBrowserEvent('email-valido');
        }
    }
}
