<div>
    <div id="mySidenavPerfil" class="sidenav" style=" z-index: 1" wire:ignore.self>
        <div class="d-flex justify-content-center">
            @if ($imagem_perfil)
                <div class="container-img">
                    <div>
                        <label for="upload_image">
                            <img src="{{ url('storage/' . $imagem_perfil) }}"
                                class="imagem_perfil rounded rounded-circle w-75  ">
                            <div class="centered">
                                <img src="{{ asset('storage/camera-solid.svg') }}" class="img-thumbnail"
                                    style="width: 50px">
                                <div class="centered-text">Mudar Foto de Perfil</div>
                            </div>
                        </label>
                    </div>
                    <input type="file" id="upload_image" enctype="multipart/form-data" style="display: none;"
                        wire:model="photo">
                </div>
            @else
                <div class="container-img ">
                    <div>
                        <label for="upload_image">
                            <img src="{{ asset('storage/default_user.png') }}"
                                class="imagem_perfil rounded rounded-circle w-75  ">
                            <div class="centered">
                                <img src="{{ asset('storage/camera-solid.svg') }}" class="img-thumbnail"
                                    style="width: 50px">
                                <div class="centered-text">Mudar Foto de Perfil</div>
                            </div>
                        </label>
                    </div>
                    <input type="file" id="upload_image" style="display: none;" wire:model="photo">
                </div>
            @endif
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavPerfil()">&times;</a>
        {{-- Livewire de trocar Nome --}}
        @livewire('change-name-perfil', ["nome"=>$nome])
        {{-- Livewire de trocar Nome --}}
        {{-- Livewire de trocar Frase de Perfil --}}
        @livewire('change-perfil-frase', ['descricao_perfil' => $descricao_perfil])
        {{-- Livewire de trocar Frase de Perfil --}}
    </div>
</div>
