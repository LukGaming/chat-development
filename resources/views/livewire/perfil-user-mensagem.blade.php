<div>
    @if ($contato)
        <div class="row ">
            <div class="col-2">
                <img src="{{ asset('storage/' . $contato['imagem_perfil']) }}"
                    class="imagem_perfil rounded rounded-circle w-50  ">
            </div>
            <div class="col" style="margin: auto" >
                <div  class="text-white"> {{ $contato['nome_contato'] }}</div>
                
                @livewire('last-seen', ['user_id' => $contato['owner_user']])
                
            </div>
        </div>
    @endif
</div>
