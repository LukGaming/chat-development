<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\mensagen;
use App\Models\perfilFill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class ListOfLastMessages extends Component
{
    protected $listeners = ['atualizar_last_messages'=>'$refresh'];
    public function render()
    {
        $last_user_and_its_last_messages = $this->lastMessages();
        return view('livewire.list-of-last-messages', ['last_user_and_its_last_messages' => $last_user_and_its_last_messages]);
    }
    public function lastMessages()
    {
        //Buscar Os contatos deste usuário
        $contatos =  Contato::where('user_id', Auth::id())->get();
        //Buscar as  mensagens entre este contato e o usuário logado
        $last_user_and_its_last_messages = [];
        for ($i = 0; $i < count($contatos); $i++) {
            //Buscar as ultimas mensagens de cada contato deste usuário
            $mensagens = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $contatos[$i]->id)->orderBy('created_at','desc')->orWhere('sendFromUser', $contatos[$i]->id)->orderBy('created_at','desc')->where('sendToUser', Auth::id())->orderBy('created_at','desc')->get();
            // $last_messages = mensagen::where('sendFromUser', Auth::id())->orderBy('created_at','desc')->first();
            // dd($last_messages);
            if (count($mensagens) > 0) {
                $last_user_and_its_last_messages[$i]["horario"] = $mensagens[0]->created_at;
                $last_user_and_its_last_messages[$i]["last_message"] = $mensagens[count($mensagens) - 1]->body;
                $last_user_and_its_last_messages[$i]["sendFromUser"] = $mensagens[$i]->sendFromUser;
                $last_user_and_its_last_messages[$i]["sendToUser"] = $mensagens[$i]->sendToUser;
                //Buscando nome do usuário, caminho da imagem no banco de dados
                $perfilFill = perfilFill::where('user_id', $contatos[$i]->id)->get();
                $last_user_and_its_last_messages[$i]["caminho_imagem`_perfil"] = $perfilFill[0]->caminho_imagem_perfil;
                $last_user_and_its_last_messages[$i]["user_id"] = $perfilFill[0]->user_id;
                //Buscando nome deste usuário, nome que eu coloquei neste usuário
                $nome_contato = User::where('id', $perfilFill[0]->user_id)->get();
                $email_contato = $nome_contato[0]->email;
                $id_contato = $nome_contato[0]->id;
                $last_user_and_its_last_messages[$i]["email"] = $email_contato;
                $last_user_and_its_last_messages[$i]["id_contato_user_id"] = $id_contato;
                $nome_contato = Contato::where('email', $email_contato)->where('user_id', Auth::id())->get();
                $last_user_and_its_last_messages[$i]["nome_contato"] = $nome_contato[0]->nome_contato;
            }
        }
        return $last_user_and_its_last_messages;
    }
    public function mensagem_iniciada($contato){
        $this->emit('conversaIniciada', $contato);
    }
}
