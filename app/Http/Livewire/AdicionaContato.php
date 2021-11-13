<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPSTORM_META\type;

class AdicionaContato extends Component
{
    public $email;
    public $nome_contato;
    public function render()
    {
        return view('livewire.adiciona-contato');
    }
    public function salvarContato()
    {
        //Se os campos de email ficarem vazios, chamar a função erro email
        if (gettype($this->email) == "NULL" || $this->email == "") {
            $this->erroEmail();
        } else {
            $this->emailValido();
        }
        if (gettype($this->nome_contato) == "NULL" || $this->nome_contato == "") {
            $this->erroNome();
        } else {
            $this->nomeValido();
        }
        if (gettype($this->email) == "NULL" || $this->email == "" || gettype($this->nome_contato) == "NULL" || $this->nome_contato == "") {
        } else { //Aqui é onde passaram todas as configurações, então agora, salvar no banco de dados
            Contato::create(["nome_contato" => $this->nome_contato, "email" => $this->email, "user_id" => Auth::id()]);
            $this->contatoCriado();
            $this->nome_contato = "";
            $this->email = "";
            $this->emit('some-event');
        }
    }
    public function contatoCriado()
    {
        $this->dispatchBrowserEvent('contato_criado');
    }
    public function erroNome()
    {
        $this->dispatchBrowserEvent('erro_nome');
    }
    public function erroEmail()
    {
        $this->dispatchBrowserEvent('erro_email');
    }
    public function nomeValido()
    {
        $this->dispatchBrowserEvent('nome_valido');
    }
    public function emailValido()
    {
        $this->dispatchBrowserEvent('email_valido');
    }
}
