<div>
    
        <div id="mySidenavContatos" class="sidenav" style=" z-index: 1">
            <div class="row d-flex justify-content-start">
                <a href="javascript:void(0)" onclick="closeNavContatos()">&#129032;</a>
            </div>
            <div class="text-inside-sidebar">Seus Contatos</div>
            <div class="d-flex justify-content-center">
                <div class=" overflow-auto  text-light rounded style-overflow" style="height: 75vh; background-color: #111">
                @foreach ($contatos as $contato)
                    <div class="list-group " style="margin: 5px;" wire:click="BotaoClicado({{ $contato }})">
                        <a href="#"
                            class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                            <div class="d-flex justify-content-between">
                                @if ($contato->caminho_imagem_perfil)
                                    <img src="{{ asset('storage/' . $contato->caminho_imagem_perfil) }}"
                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                @else
                                    <img src="{{ asset('storage/default_user.png') }}"
                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                @endif
                                <h6 class="nome-contato">{{ $contato->nome_contato }}</h6>
                            </div>
                        </a>
                    </div>
                
                @endforeach
            </div>
            </div>
        </div>
 









    {{-- <div id="mySidenavContatos" class="sidenav" style=" z-index: 1">
        <div class="d-flex justify-content-center">
            @if ($dados_perfil->caminho_imagem_perfil)
                <div class="container-img ">
                    <div>
                        <label for="upload_image">
                            <img src="{{ asset('storage/' . $dados_perfil->caminho_imagem_perfil) }}"
                                class="imagem_perfil rounded rounded-circle w-75  ">
                            <div class="centered">
                                <img src="{{ asset('storage/camera-solid.svg') }}" class="img-thumbnail"
                                    style="width: 50px">
                                <div class="centered-text">Mudar Foto de Perfil</div>
                            </div>
                        </label>
                    </div>
                    <input type="file" id="upload_image" style="display: none;">
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
                    <input type="file" id="upload_image" style="display: none;">
                </div>
            @endif
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavContatos()">&times;</a> --}}
</div>
