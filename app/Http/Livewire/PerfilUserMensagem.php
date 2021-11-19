<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PerfilUserMensagem extends Component
{
   
    public $contato = [];
    protected $listeners = ['conversaIniciada'];
    public function render()
    {
        return view('livewire.perfil-user-mensagem');
    }
    public function conversaIniciada($contato){
       $this->contato["nome_contato"] = $contato["nome_contato"];
       $this->contato["email"] = $contato["email"];
       $this->contato["owner_user"] = $contato["owner_user"];
       $this->contato["imagem_perfil"] = $contato["caminho_imagem_perfil"];
    }
}
