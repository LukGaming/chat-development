<?php

namespace App\Http\Livewire;

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

        if (!$this->email || $this->email == "") {
            if (!$this->email || $this->email == "") {
                //Aqui retorna o erro do email
                $this->erroNome();
            } else {
                $this->nomeValido();
            }
            if (!$this->nome_contato || $this->nome_contato == "") {
                //Aqui retorna o erro do nome
                $this->erroEmail();
            } else {
                $this->emailValido();
            }
        }
        if (!$this->nome_contato || $this->nome_contato == "") {
            //Aqui retorna o erro do nome
            $this->erroEmail();
        } else {
            $this->emailValido();
        }
        if ($this->email) {
            $this->emailValido();
        }
        if ($this->nome_contato) {
            $this->nomeValido();
        }
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
