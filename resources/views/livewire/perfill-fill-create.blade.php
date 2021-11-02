<div>

    <div class="container border border-dark espacamento_padrao" style="margin-top: 2em">
        <div class="d-flex justify-content-center" style="margin-bottom: 20px">
            <h1>Preenchimento de perfil</h1>
        </div>
        <form>
            <div class="form-group mx-auto" style="margin-bottom: 20px">
                <label for="nome_amostra" class="h5">Nome para ficar a amostra para os demais
                    usuários</label>
                <input type="text" class="form-control " id="nome_amostra" placeholder="Nome">
            </div>
            <div class="form-group" style="margin-bottom: 20px">
                <label for="frase_perfil" class="h5">Frase de perfil para ser mostrada para outros
                    usuários</label>
                <input type="text" class="form-control" id="frase_perfil" placeholder="Frase de perfil">
            </div>
            <div class="form-group espacamento_padrao" >
                @if ($photo)
                    <div class="row d-flex justify-content-center   ">
                        <div class="col-6">
                            <picture >
                                <img src="{{ $photo }}" class="img-fluid" alt="..." style="height: 30rem">
                            </picture>
                        </div>
                    </div>
                @endif
                <label for="image_perfil " class="h5">Selecionar Imagem de perfil</label><br>
                <input type="file" class="form-control-file" id="image_perfil" wire:change="$emit('fileChoosen')">

            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </div>
        </form>
        <script>
            window.livewire.on('fileChoosen', () => {
                let inputFile = document.getElementById("image_perfil");
                file = inputFile.files[0];
                console.log(file)
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('fileUpload', reader.result);
                }
                reader.readAsDataURL(file);
            });
        </script>
    </div>
</div>
