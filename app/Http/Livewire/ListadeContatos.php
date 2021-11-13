<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListadeContatos extends Component
{
    protected $listeners = ['some-event' => '$refresh'];
    public function render()
    {
        return view('livewire.listade-contatos', ['contatos'=>$this->mostraListaDeContatos()]);
    }
    public function mostraListaDeContatos(){
        return Contato::where('user_id', Auth::id())->get();
    }
    public function BotaoClicado($contato){
        dd($contato);
    }
}
