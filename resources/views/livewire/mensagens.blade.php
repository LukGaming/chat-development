<div>
    <style>
        div .message p::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
            pointer-events: all;
        }

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @if ($contato)
        <div class="d-flex justify-content-center">
            <div class="alert-nova-message" id="btnAlert-Nova-Mensagem" style="top: 0; z-index: 1; "
                onclick="scrollDownWhenMessageSend()">
                <strong>Voce tem Novas Mensagens!</strong>
            </div>
        </div>
        <div class="skype-parent" wire:poll="atualizando_mensagens">
            @foreach ($messages as $mensagem)

                {{-- Se foi o usuário que enviou a mensagem --}}
                @if ($mensagem->sendFromUser == Auth::id())
                    <div class="message user">
                        <div></div>
                        <div>
                            <p>{{ $mensagem->body }}

                            </p>
                        </div>
                        <div> <?php
echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mensagem->created_at)->format('H:i');
?></div>
                    </div>
                @else
                    {{-- Se foi o outro usuário que enviou a mensagem --}}
                    <div class="message">
                        <div></div>
                        <div>
                            <p>
                                {{-- Se foi o usuário que enviou a mensagem --}}
                                {{ $mensagem->body }}</p>
                        </div>
                        <div><?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mensagem->created_at)->format('H:i');
                        ?></div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="skype-parent" style="height: 100%">
            <div class="d-flex justify-content-center ">
                <div class="sub_div ">
                    <div class="form-row">
                        <div class="col-8 mb-3 ml-5">
                            <input type="text" class="form-control" wire:model.debounce.1000ms="inputMessage">
                        </div>
                        <div class="col mb-3 ml-5">
                            <button class="btn btn-primary" type="submit" wire:click="sendMessage()">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        window.addEventListener('nova_mensagem', event => {
            //alert("mensagem_recebida");
            //Notificar aqui na tela que foi recebida nova mensagem
            //$btnAlert_Nova_Mensagem = document.getElementById("btnAlert-Nova-Mensagem").style.position = "absolute";


        });
        window.addEventListener('mensagem_enviada', event => {
            scrollDownWhenMessageSend();
        });
        window.addEventListener('iniciando_conversa', event => {
            scrollDownWhenMessageSend();
        });

        function scrollDownWhenMessageSend() {
            $scroll = document.getElementById("scrollbar")
            $scroll.scrollTo(0, 9999);
        }
        $messages = document.querySelectorAll(".message.user p")[0];
        

        //$btnConfig = window.getComputedStyle($messages, ':after')
        //console.log($btnConfig)
        //addEventListener("click", modifyText, false);

        function clickToConfigMessage() {
            alert("clicando");
        }
    </script>
</div>
