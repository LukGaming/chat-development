<?php

namespace App\Http\Livewire;

use App\Providers\Mensagens;
use Livewire\Component;

class ApagarMensagem extends Component
{
    public $mensagem;
    public function render()
    {
        return view('livewire.apagar-mensagem');
    }
    public function ApagarMensagem(){
        if(Mensagens::deleteMensagem($this->mensagem)){
            $this->emit('mensagem_deletada');
        }
    }
}
