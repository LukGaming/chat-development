<?php

namespace App\Http\Livewire;

use App\Models\mensagen;
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
        $this->contato["nome_contato"] = $contato["nome_contato"];
        $this->contato["email"] = $contato["email"];
        $this->contato["owner_user"] = $contato["owner_user"];
        $this->contato["imagem_perfil"] = $contato["caminho_imagem_perfil"];
        $this->messages = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $this->contato["owner_user"])->orWhere('sendToUser', Auth::id())->where('sendFromUser', $this->contato["owner_user"])
            ->get();
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
            //dd($this->contato["owner_user"]);
            $this->emit('mensagem_enviada', $this->contato["owner_user"]);
        }
    }
    public function mensagem_enviada($contato)
    {
        $this->messages = mensagen::where('sendFromUser', Auth::id())->where('sendToUser', $this->contato["owner_user"])->orWhere('sendToUser', Auth::id())->where('sendFromUser', $this->contato["owner_user"])
            ->get();
    }
}
