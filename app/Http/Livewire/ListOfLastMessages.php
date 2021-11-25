<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\mensagen;
use App\Models\perfilFill;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class ListOfLastMessages extends Component
{
    protected $listeners = ['atualizar_last_messages' => '$refresh'];
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
            //Busca a ultima mensagem com este contato
            $mensagens = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $contatos[$i]->id)->orderBy('created_at', 'desc')->orWhere('sendFromUser', $contatos[$i]->id)->orderBy('created_at', 'desc')->where('sendToUser', Auth::id())->orderBy('created_at', 'desc')->first();
            $mensagens_nao_lidas = mensagen::Where('sendFromUser', $contatos[$i]->id)->where('sendToUser', Auth::id())->where('read', 0)->get();
            //dd($mensagens_nao_lidas);
            if ($mensagens) {
                $last_user_and_its_last_messages[$i]["horario"] = $mensagens->created_at;
                $last_user_and_its_last_messages[$i]["last_message"] = $mensagens->body;
                $last_user_and_its_last_messages[$i]["sendFromUser"] = $mensagens->sendFromUser;
                $last_user_and_its_last_messages[$i]["sendToUser"] = $mensagens->sendToUser;
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
                $last_user_and_its_last_messages[$i]["not_read"] = count($mensagens_nao_lidas);
            }
        }
        //dd($last_user_and_its_last_messages);
        //ajustando o array pela data
        for ($i = 0; $i < count($last_user_and_its_last_messages); $i++) {
            if ($i + 1 < count($last_user_and_its_last_messages)) {
                if ($last_user_and_its_last_messages[$i]["horario"]->lessThan($last_user_and_its_last_messages[$i + 1]["horario"])) {
                    //dd("é maior");
                    $removendo_array = $last_user_and_its_last_messages[$i];
                    $last_user_and_its_last_messages[$i] = $last_user_and_its_last_messages[$i + 1];
                    $last_user_and_its_last_messages[$i + 1] = $removendo_array;
                }
            }
        }
        // dd($last_user_and_its_last_messages[0]["horario"]);
        //dd($last_user_and_its_last_messages);
        return $last_user_and_its_last_messages;
    }
    public function mensagem_iniciada($contato)
    {
        
        $this->emit('conversaIniciada', $contato);
    }
}
