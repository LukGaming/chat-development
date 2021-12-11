<?php

namespace App\Http\Livewire;

use App\Models\Contato;
use App\Models\User;
use App\Providers\LastSeenProvider;
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
        LastSeenProvider::lastSeenUser(Auth::id());
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
            // dd($this->email);

            //Se não existir nenhum email relacionado com o email que foi pedido, mostrar mensagem
            $proprio_email = User::where('id', Auth::id())->first();
            //Caso eu tenha colocado meu próprio email!
            if ($proprio_email->email == $this->email) {
                $this->adicionando_a_si_proprio();
                return;
            } else {
                //Buscando no banco de dados se este email existe
                $email_existe = User::where('email', $this->email)->first();
                if (!$email_existe) {
                    $this->contato_nao_existe();
                    return;
                }
                //Verificando se eu já tenho este contato adicionado
                $contatos = Contato::where('user_id', Auth::id())->get();
                for($i=0; $i<count($contatos); $i++){
                    if($contatos[$i]->email == $this->email){
                        $this->contato_ja_adicionado();
                        return;
                    }
                }

            }
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
    public function adicionando_a_si_proprio()
    {
        $this->dispatchBrowserEvent('adicionando_a_si_proprio');
    }
    public function contato_nao_existe()
    {
        $this->dispatchBrowserEvent('contato_nao_existe');
    }
    public function contato_ja_adicionado()
    {
        $this->dispatchBrowserEvent('contato_ja_adicionado');
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
