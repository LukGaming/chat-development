<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\perfilFill;

class PerfillFillCreate extends Component
{
    use WithFileUploads;
    public $photo;
    public $nome;
    public $frase_perfil;
    protected $listeners = ['fileUpload' => 'handledFileUpload'];
    public function render()
    {
        return view('livewire.perfill-fill-create');
    }
    public function handledFileUpload($photoData)
    {
        $this->photo = $photoData;
    }
    public function validaNome()
    {
        //Verificar se nome é maior do que 50 Caracteres
        if ($this->nome) {
            if (strlen($this->nome) > 50) {
                session()->flash('erro_nome', 'O Nome deve conter no máximo 50 caracteres');
            }
        } else {
        }
    }
    public function validaFrasePerfil()
    {
        if ($this->frase_perfil) {
            if (strlen($this->frase_perfil) > 100) {
                session()->flash('erro_frase', 'A frase de perfil  deve conter no máximo 100 caracteres');
            }
        }
    }
    public function terminaCadastro(){
        $this->validaFrasePerfil();
        $this->validaNome();
        ImageManagerStatic
        
    }
}
