<?php

namespace App\Http\Livewire;

use App\Models\perfilFill;
use App\Providers\LastSeenProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeNamePerfil extends Component
{
    public $nome;
    public function render()
    {
        return view('livewire.change-name-perfil');
    }
    public function editandoNome(){
        LastSeenProvider::lastSeenUser(Auth::id());
        perfilFill::where('user_id', Auth::id())->update(['nome'=>$this->nome]);
    }
}
