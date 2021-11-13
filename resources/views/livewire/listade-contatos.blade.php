<div>
    @foreach ($contatos as $contato)
    <div class="list-group " style="margin: 5px;" wire:click="BotaoClicado({{$contato->id}})">
        <a href="#" class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
            <div class="d-flex justify-content-between">
                <img src="Foto facebook.png" class="imagem_perfil_contato rounded rounded-circle w-25 ">
                <h6 class="nome-contato" >{{$contato->nome_contato}}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>
