<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\mensagen;
use App\Models\perfilFill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Mensagens extends Component
{
    public $contato = [];
    public $inputMessage;
    public $messages;
    protected $listeners = ['conversaIniciada', 'mensagem_enviada'];

    public function render()
    {
        //Pegando as mensagens que fiz com esse usuário

        
        return view('livewire.mensagens');
    }
    public function conversaIniciada($contato)
    {
        $this->dispatchBrowserEvent('meu_id', ["user_id" => Auth::id()]);
        if (gettype($contato) == "array") {
            //dd($contato);
            $this->contato["nome_contato"] = $contato["nome_contato"];
            $this->contato["email"] = $contato["email"];
            $this->contato["owner_user"] = $contato["owner_user"];
            $this->contato["imagem_perfil"] = $contato["caminho_imagem_perfil"];
            $this->messages = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $this->contato["owner_user"])->orWhere('sendToUser', Auth::id())->where('sendFromUser', $this->contato["owner_user"])
                ->get();
            //Como o campo de mensagens será aberto, ir no banco de dados e ler todas as mensagens deste usuário
            $this->readingLastMessages($this->contato["owner_user"]);
        }
        if (gettype($contato) == "integer") {

            //Buscando dados deste contato no banco de dados
            $email_contato = User::where('id', $contato)->first()->email;
            $dados_contato = Contato::where('email', $email_contato)->first();
            $this->contato["nome_contato"] = $dados_contato->nome_contato;
            $this->contato["email"] = $dados_contato->email;
            $owner_user = User::where('email', $dados_contato->email)->first();
            $imagem_perfil = perfilFill::where('user_id', $owner_user->id)->first();
            $this->contato["owner_user"] = $owner_user->id;
            $this->contato["imagem_perfil"] =  $imagem_perfil->caminho_imagem_perfil;
            $this->messages = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $contato)->orWhere('sendToUser', Auth::id())->where('sendFromUser', $contato)

                ->get();

            $this->readingLastMessages($contato);
        }
        $this->dispatchBrowserEvent('iniciando_conversa');

        //dd($this->messages);
    }
    public function sendMessage()
    {
        if ($this->inputMessage == "") {
            return;
        } else {
            mensagen::create([
                "body" => $this->inputMessage,
                "sendFromUser" => Auth::id(),
                "sendToUser" => $this->contato["owner_user"]
            ]);
            $this->inputMessage = "";
            $this->emit('mensagem_enviada', $this->contato["owner_user"]);
        }
    }
    public function mensagem_enviada($contato)
    {
        $this->messages = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $this->contato["owner_user"])->orWhere('sendToUser', Auth::id())->where('sendFromUser', $this->contato["owner_user"])
            ->get();
        $this->dispatchBrowserEvent('mensagem_enviada');
        $this->emit("atualizar_last_messages");
    }
    public function atualizando_mensagens()
    {
        $novas_mensagens = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $this->contato["owner_user"])->orWhere('sendToUser', Auth::id())->where('sendFromUser', $this->contato["owner_user"])
            ->get();

        if (count($novas_mensagens) != count($this->messages)) {
            $this->messages = $novas_mensagens;
            $this->readingLastMessages($this->contato["owner_user"]);
            $this->dispatchBrowserEvent('nova_mensagem',  ['who_send' => $this->contato['owner_user']]);
        }
    }
    public function readingLastMessages($contato)
    {
        mensagen::where('sendFromUser', $contato)->where('sendToUser', Auth::id())->update(["read" => 1]);
    }
}
