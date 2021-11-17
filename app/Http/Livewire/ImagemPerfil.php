<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImagemPerfil extends Component
{
    public $imagem;
    protected $listeners = ['foto_perfil_atualizada' => "imagemAtualizada"];
    public function render()
    {
        return view('livewire.imagem-perfil');
    }
    public function imagemAtualizada($name)
    {
        $this->imagem = $name;
    }
}
