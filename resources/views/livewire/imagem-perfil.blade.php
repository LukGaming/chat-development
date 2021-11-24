<div>
    @if ($imagem)
    
        <img src="{{ asset('storage/' . $imagem) }}" class="imagem_perfil rounded rounded-circle w-75  "
            onclick="openAndCloseNavOfPerfil()">
    @else
        <img src="{{ asset('storage/default_user.png') }}" class="imagem_perfil rounded rounded-circle w-75  "
            onclick="openAndCloseNavOfPerfil()">
    @endif
</div>
