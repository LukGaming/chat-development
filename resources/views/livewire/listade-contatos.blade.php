<div>
    @foreach ($contatos as $contato)
    <div class="list-group " style="margin: 5px;" wire:click="BotaoClicado({{$contato}})">
        <a href="#" class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
            <div class="d-flex justify-content-between">
                @if($contato->caminho_imagem_perfil)
                <img src="{{ asset('storage/' . $contato->caminho_imagem_perfil) }}" class="imagem_perfil_contato rounded rounded-circle w-25 ">
                @else 
                <img src="{{ asset('storage/default_user.png' ) }}" class="imagem_perfil_contato rounded rounded-circle w-25 ">
                @endif
                <h6 class="nome-contato" >{{$contato->nome_contato}}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>
