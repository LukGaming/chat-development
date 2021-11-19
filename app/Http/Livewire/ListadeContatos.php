<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\perfilFill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListadeContatos extends Component
{
    protected $listeners = ['some-event' => '$refresh'];
    public function render()
    {
        return view('livewire.listade-contatos', ['contatos' => $this->mostraListaDeContatos()]);
    }
    public function mostraListaDeContatos()
    {
        // //Buscar Todos os contatos;
        // $contatos = Contato::where('user_id', Auth::id())->get();
        // //Buscando as imagens desses contatos
        // for($i=0; $i<count($contatos); $i++){

        // }
        // $img = perfilFill::where('user_id', $contatos[$i]->id);


        $contatos =  Contato::where('user_id', Auth::id())->get();
        //Fazer relacionamento do contato para o usuario
        for ($i = 0; $i < count($contatos); $i++) {
            //Verifica se contato existe
            $contatos[$i]["owner_user"] = User::where("email", $contatos[$i]->email)->first();
            if ($contatos[$i]["owner_user"]) {
                $contatos[$i]["owner_user"] = User::where("email", $contatos[$i]->email)->first()->id;
                $contatos[$i]["caminho_imagem_perfil"] = perfilFill::where("user_id", $contatos[$i]["owner_user"])->first()->caminho_imagem_perfil;
            }
            else{
                $contatos[$i]["owner_user"] = null;
                $contatos[$i]["caminho_imagem_perfil"] = null;
            }
        }
        return $contatos;
    }
    public function BotaoClicado($contato)
    {
        $this->emit('conversaIniciada', $contato);
    }
}
