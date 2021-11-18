<?php

namespace App\Http\Livewire;

use App\Models\perfilFill;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangePerfilFrase extends Component
{
    public $descricao_perfil;
    public function render()
    {
        return view('livewire.change-perfil-frase');
    }
    public function mudandoDescricao()
    {
        perfilFill::where('user_id', Auth::id())->update(['descricao_perfil' => $this->descricao_perfil]);
    }
}
