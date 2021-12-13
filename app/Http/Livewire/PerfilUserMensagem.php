<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\perfilFill;
use App\Models\User;
use Livewire\Component;


class PerfilUserMensagem extends Component
{

    public $contato = [];
    protected $listeners = ['conversaIniciada'];
    public function render()
    {
        return view('livewire.perfil-user-mensagem');
    }
    public function conversaIniciada($contato)
    {
        
        if (gettype($contato) == "array") {
            $this->contato["nome_contato"] = $contato["nome_contato"];
            $this->contato["email"] = $contato["email"];
            $this->contato["owner_user"] = $contato["owner_user"];
            $this->contato["imagem_perfil"] = $contato["caminho_imagem_perfil"];
        }
        if (gettype($contato) == "integer") {
           $email_contato = User::where('id', $contato)->first()->email;
           $dados_contato = Contato::where('email', $email_contato)->first();
            $this->contato["nome_contato"] = $dados_contato->nome_contato;
            $this->contato["email"] = $dados_contato->email;
            $owner_user = User::where('email', $dados_contato->email)->first();
            $imagem_perfil = perfilFill::where('user_id', $owner_user->id)->first();
            $this->contato["owner_user"] = $owner_user->id;
            $this->contato["imagem_perfil"] =  $imagem_perfil->caminho_imagem_perfil;
        }
    }
}
