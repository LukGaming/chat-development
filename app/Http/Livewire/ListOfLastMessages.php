<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\mensagen;
use App\Models\perfilFill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class ListOfLastMessages extends Component
{
    public $search_messages;
    protected $listeners = ['atualizar_last_messages' => '$refresh'];
    public function render()
    {
        if ($this->search_messages == "" || $this->search_messages == null) {
            $last_user_and_its_last_messages = $this->lastMessages();
            return view('livewire.list-of-last-messages', ['last_user_and_its_last_messages' => $last_user_and_its_last_messages, 'pesquisa' => 0]);
        } else {
            $last_user_and_its_last_messages = $this->searchingContactsAndMessages();
            return view('livewire.list-of-last-messages', ['last_user_and_its_last_messages' => $last_user_and_its_last_messages, 'pesquisa' => 1]);
        }
    }
    public function searchingContactsAndMessages()
    {
        //Buscando Contato pelo nome
        $contatos =  Contato::where('user_id', Auth::id())->where('nome_contato', 'like', "%$this->search_messages%")->get();
        $last_user_and_its_last_messages = [];
        for ($i = 0; $i < count($contatos); $i++) {
            //Primeiramente me identificar como usuário
            $meuid = Auth::id();
            $email_contato = $contatos[$i]->email;
            $id_contato = User::where('email', $email_contato)->first()->id;
            //Buscando mensagens não lidas
            $mensagens = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $id_contato)->orderBy('created_at', 'desc')->orWhere('sendFromUser', $id_contato)->orderBy('created_at', 'desc')->where('sendToUser', Auth::id())->orderBy('created_at', 'desc')->first();
            $mensagens_nao_lidas = mensagen::Where('sendFromUser', $id_contato)->where('sendToUser', Auth::id())->where('read', 0)->get();
            //dd($mensagens_nao_lidas);
            if ($mensagens) {
                $last_user_and_its_last_messages[$i]["horario"] = $mensagens->created_at;
                $transformingDateInDay = $this->transformingDateInDay($last_user_and_its_last_messages[$i]["horario"]);
                $last_user_and_its_last_messages[$i]["dia"] = $transformingDateInDay;
                $last_user_and_its_last_messages[$i]["last_message"] = $mensagens->body;
                $last_user_and_its_last_messages[$i]["sendFromUser"] = $mensagens->sendFromUser;
                $last_user_and_its_last_messages[$i]["sendToUser"] = $mensagens->sendToUser;
                //Buscando nome do usuário, caminho da imagem no banco de dados
                $perfilFill = perfilFill::where('user_id', $id_contato)->first();
                $last_user_and_its_last_messages[$i]["caminho_imagem_perfil"] = $perfilFill->caminho_imagem_perfil;
                $last_user_and_its_last_messages[$i]["user_id"] = $perfilFill->user_id;
                //Buscando nome deste usuário, nome que eu coloquei neste usuário
                $nome_contato = User::where('id', $perfilFill->user_id)->first();
                $email_contato = $nome_contato->email;
                $last_user_and_its_last_messages[$i]["email"] = $email_contato;
                $last_user_and_its_last_messages[$i]["id_contato_user_id"] = $id_contato;
                $last_user_and_its_last_messages[$i]["nome_contato"] = $perfilFill->nome;
                $nome_contato = $last_user_and_its_last_messages[$i]["nome_contato"];
                //Separando string do nome de contato para um array
                $split_nome_contato = str_split($nome_contato);
                //Separando string de pesquisa para um array
                $split_pesquisa = str_split($this->search_messages);
                //Preciso verificar qual posição do nome do contato tem a mesma string da pesquisa
                

                $last_user_and_its_last_messages[$i]["not_read"] = count($mensagens_nao_lidas);
                $last_user_and_its_last_messages[$i]["type"] = 0;
            }
        }
        //ajustando o array pela data
        for ($i = 0; $i < count($last_user_and_its_last_messages); $i++) {
            if ($i + 1 < count($last_user_and_its_last_messages)) {
                if ($last_user_and_its_last_messages[$i]["horario"]->lessThan($last_user_and_its_last_messages[$i + 1]["horario"])) {
                    $removendo_array = $last_user_and_its_last_messages[$i];
                    $last_user_and_its_last_messages[$i] = $last_user_and_its_last_messages[$i + 1];
                    $last_user_and_its_last_messages[$i + 1] = $removendo_array;
                }
            }
        }
        return $last_user_and_its_last_messages;
    }
    public function lastMessages()
    {

        //Buscar Os contatos deste usuário
        $contatos =  Contato::where('user_id', Auth::id())->get();
        //Buscar as  mensagens entre este contato e o usuário logado
        $last_user_and_its_last_messages = [];
        for ($i = 0; $i < count($contatos); $i++) {
            //Busca a ultima mensagem com este contato
            //Montando lógica para buscar ultimas mensagens
            //Primeiramente me identificar como usuário
            $meuid = Auth::id();
            $email_contato = $contatos[$i]->email;
            $id_contato = User::where('email', $email_contato)->first()->id;
            //Buscando mensagens não lidas
            $mensagens = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $id_contato)->orderBy('created_at', 'desc')->orWhere('sendFromUser', $id_contato)->orderBy('created_at', 'desc')->where('sendToUser', Auth::id())->orderBy('created_at', 'desc')->first();

            $mensagens_nao_lidas = mensagen::Where('sendFromUser', $id_contato)->where('sendToUser', Auth::id())->where('read', 0)->get();
            //dd($mensagens_nao_lidas);
            if ($mensagens) {
                $last_user_and_its_last_messages[$i]["horario"] = $mensagens->created_at;

                $transformingDateInDay = $this->transformingDateInDay($last_user_and_its_last_messages[$i]["horario"]);
                $last_user_and_its_last_messages[$i]["dia"] = $transformingDateInDay;
                $last_user_and_its_last_messages[$i]["last_message"] = $mensagens->body;
                $last_user_and_its_last_messages[$i]["sendFromUser"] = $mensagens->sendFromUser;
                $last_user_and_its_last_messages[$i]["sendToUser"] = $mensagens->sendToUser;
                //Buscando nome do usuário, caminho da imagem no banco de dados
                $perfilFill = perfilFill::where('user_id', $id_contato)->first();
                $last_user_and_its_last_messages[$i]["caminho_imagem_perfil"] = $perfilFill->caminho_imagem_perfil;
                $last_user_and_its_last_messages[$i]["user_id"] = $perfilFill->user_id;
                //Buscando nome deste usuário, nome que eu coloquei neste usuário
                $nome_contato = User::where('id', $perfilFill->user_id)->first();
                $email_contato = $nome_contato->email;
                $last_user_and_its_last_messages[$i]["email"] = $email_contato;
                $last_user_and_its_last_messages[$i]["id_contato_user_id"] = $id_contato;
                $last_user_and_its_last_messages[$i]["nome_contato"] = $perfilFill->nome;
                $last_user_and_its_last_messages[$i]["not_read"] = count($mensagens_nao_lidas);
            }
        }
        //dd($last_user_and_its_last_messages);
        //ajustando o array pela data
        for ($i = 0; $i < count($last_user_and_its_last_messages); $i++) {
            if ($i + 1 < count($last_user_and_its_last_messages)) {
                if ($last_user_and_its_last_messages[$i]["horario"]->lessThan($last_user_and_its_last_messages[$i + 1]["horario"])) {
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
    public function transformingDateInDay($day)
    {
        if ($day->diffInDays() < 7) {
            $horario = Carbon::createFromFormat('Y-m-d H:i:s', $day)->format('H:i');
            if ($day->isYesterday()) {
                return "Ontem";
            }
            if ($day->isToday()) {
                return $horario;
            }
            if ($day->isMonday()) {
                return "Segunda-Feira";
            }
            if ($day->isTuesday()) {
                return "Terça-Feira às ";
            }
            if ($day->isWednesday()) {
                return "Quarta-Feira";
            }
            if ($day->isThursday()) {
                return "Quinta-Feira";
            }
            if ($day->isFriday()) {
                return "Sexta-Feira";
            }
            if ($day->isSaturday()) {
                return "Sábado";
            }
            if ($day->isSunday()) {
                return "Domingo";
            }
        }
    }
    public function search_contacts()
    {
    }
    public function mensagem_iniciada($contato)
    {
        $this->emit('conversaIniciada', $contato);
    }
}
