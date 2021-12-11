<?php

namespace App\Http\Livewire;

use App\Models\perfilFill;
use App\Providers\LastSeenProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;




class ChangePhotoPerfil extends Component
{
    use WithFileUploads;
    public $imagem_perfil;
    public $nome;
    public $photo;
    public $descricao_perfil;
    public $caminho_das_fotos_de_perfil = "user_images/perfil";
    public function render()
    {
        return view('livewire.change-photo-perfil');
    }

    public function updatedPhoto()
    {
        LastSeenProvider::lastSeenUser(Auth::id());
        $img = ImageManagerStatic::make($this->photo)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name , $img);
        //Removendo imagem antiga do HD
        if(Storage::exists("public/" . $this->imagem_perfil)){
            Storage::delete("public/" . $this->imagem_perfil);
        }
        //Fazendo update no banco de dados do caminho da imagem
        perfilFill::where('user_id', Auth::id())->update(['caminho_imagem_perfil'=>$name]);
        $this->imagem_perfil = $name;
        $this->emit('foto_perfil_atualizada', $name);
    }
}
