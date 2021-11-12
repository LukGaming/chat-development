<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\perfilFill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

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
                return false;
            }
        } else {
            session()->flash('erro_nome', 'O Nome não pode ficar vazio!');
            return false;
        }
        return true;
    }
    public function validaFrasePerfil()
    {
        if ($this->frase_perfil) {
            if (strlen($this->frase_perfil) > 100) {
                session()->flash('erro_frase', 'A frase de perfil  deve conter no máximo 100 caracteres');
                return false;
            }
            return true;
        }
    }
    public function terminaCadastro()
    {
        if ($this->validaFrasePerfil() && $this->validaNome()) {
            $this->storePerfilDataBase();
        } else if (session("erro_frase") || session("erro_nome")) {
            $this->validaFrasePerfil();
            $this->validaNome();
        } else { //tudo foi validado, agora iremos salvar a image, e salvar os dados no banco de dados
            $this->storePerfilDataBase();
        }
    }
    public function storePhoto()
    {
        if ($this->photo) {
            $img = ImageManagerStatic::make($this->photo)->encode('jpg');
            $name = Str::random();
            Storage::disk('public')->put($name . '.jpg', $img);
            $nome_completo = $name . ".jpg";
            return $nome_completo;
        }
        return false;
    }
    public function storePerfilDataBase()
    {
        $nome_imagem = $this->storePhoto();
        if ($nome_imagem != false) {
            perfilFill::create([
                'nome' => $this->nome,
                'descricao_perfil' => $this->frase_perfil,
                'user_id' => Auth::id(),
                'caminho_imagem_perfil' => $nome_imagem
            ]);
        } else {
            perfilFill::create([
                'nome' => $this->nome,
                'descricao_perfil' => $this->frase_perfil,
                'user_id' => Auth::id(),
                'caminho_imagem_perfil' => null
            ]);
        }
    }
}
