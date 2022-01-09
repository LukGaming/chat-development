<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\mensagen;
use App\Models\perfilFill;
use App\Models\User;
use App\Providers\LastSeenProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Providers\Mensagens as MensagensProvider;


class Mensagens extends Component
{
    public $contato = [];
    public $inputMessage;
    public $messages;
    protected $listeners = ['conversaIniciada', 'mensagem_enviada'];

    public function render()
    {
         return view('livewire.mensagens');
    }
    public function conversaIniciada($contato)
    {
        LastSeenProvider::lastSeenUser(Auth::id());
        $this->dispatchBrowserEvent('meu_id', ["user_id" => Auth::id()]);

        if (gettype($contato) == "array") {
            $this->contato = LastSeenProvider::getContactData($contato, $method = "array");
            $this->messages = MensagensProvider::getAllMessages(Auth::id(), $this->contato["owner_user"]);
            $this->readingLastMessages($this->contato["owner_user"]);
        }
        if (gettype($contato) == "integer") {
            $this->contato = LastSeenProvider::getContactData($contato, $method = "integer");
            $this->messages = MensagensProvider::getAllMessages(Auth::id(), $this->contato["owner_user"]);
            $this->readingLastMessages($contato);
        }
        $this->dispatchBrowserEvent('iniciando_conversa');
    }
    public function sendMessage()
    {
        LastSeenProvider::lastSeenUser(Auth::id());
        if ($this->inputMessage == "") {
            return;
        } else {
            MensagensProvider::createMessage($this->inputMessage, Auth::id(), $this->contato["owner_user"]);
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
        $novas_mensagens = MensagensProvider::newMessages(Auth::id(), $this->contato["owner_user"]);
        if (count($novas_mensagens) != count($this->messages)) {
            $this->messages = $novas_mensagens;
            $this->readingLastMessages($this->contato["owner_user"]);
            $this->dispatchBrowserEvent('nova_mensagem',  ['who_send' => $this->contato['owner_user']]);
        }
    }
    public function readingLastMessages($contato)
    {
        LastSeenProvider::lastSeenUser(Auth::id());
        mensagen::where('sendFromUser', $contato)->where('sendToUser', Auth::id())->update(["read" => 1]);
    }
}
