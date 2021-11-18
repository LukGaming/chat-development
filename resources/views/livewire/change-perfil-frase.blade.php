<div>
    <div class=" row d-flex justify-content-center">
        <a href="#">Frase de Perfil</a>
    </div>
    <div class=" row d-flex justify-content-center">
        <input class="form-control form-control-sm mx-auto col-10" type="text" 
            wire:model.debounce.1000ms="descricao_perfil" wire:change="mudandoDescricao()">
    </div>
    
</div>
