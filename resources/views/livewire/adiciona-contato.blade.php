<div>
    <!-- Modal  2-->
    <div class="modal fade" id="exampleModal2" wire:ignore tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Novo Contato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="alert alert-success" role="alert" id="contato_criado" style="display: none">
                            Contato Criado com sucesso!
                        </div>
                        <div class="form-group">
                            <label for="email">Endereço de Email</label>
                            <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com"
                                wire:model="email">
                            <br>
                            <div class="alert alert-danger" role="alert" id="erro_email" style="display: none">

                            </div>
                            <br>
                            <label for="nome">Nome do Contato</label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome do Contato"
                                wire:model="nome_contato">
                        </div>
                        <div class="alert alert-danger" role="alert" id="erro_nome" style="display: none">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="botao-desativa"
                        wire:click="salvarContato()">Adicionar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('adicionando_a_si_proprio', event => {
            $("#erro_email").html("Voce não pode adicionar a sí mesmo a um contato");
            $("#erro_email").show();
        })
        window.addEventListener('contato_nao_existe', event => {
            $("#erro_email").html("Não existe um contato com este email");
            $("#erro_email").show();
        })

        window.addEventListener('contato_ja_adicionado', event => {
            $("#erro_email").html("Voce já adicionou este contato!");
            $("#erro_email").show();
        })
        window.addEventListener('erro_nome', event => {
            $("#erro_nome").html("Nome Invalido!");
            $("#erro_nome").show();
        })
        window.addEventListener('erro_email', event => {
            $("#erro_email").html("Email Invalido!");
            $("#erro_email").show();
        })
        window.addEventListener('email_valido', event => {
            $("#erro_email").hide();
        })
        window.addEventListener('nome_valido', event => {
            $("#erro_nome").hide();
        })
        window.addEventListener('contato_criado', event => {
            $("#contato_criado").show();
        })
    </script>

</div>
