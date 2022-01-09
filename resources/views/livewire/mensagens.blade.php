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
       
        <div class="skype-parent" wire:poll="atualizando_mensagens"></div>

        @foreach ($messages as $mensagem)
            {{-- Se foi o usuário que enviou a mensagem --}}
            @if ($mensagem->sendFromUser == Auth::id())

                <div class="message-send-message ">
                    <div class="message-send ">
                        {{ $mensagem->body }}
                        <span class="time  ">
                            <?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mensagem->created_at)->format('H:i');
                            ?>
                        </span>
                    </div>
                </div>
            @else

                <div class="message-received-message">
                    <div class="message-received ">
                        {{ $mensagem->body }}
                        <span class="time  ">
                            <?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mensagem->created_at)->format('H:i');
                            ?>
                        </span>

                    </div>
                </div>
            @endif
        @endforeach
       
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
        var height = $("#scrollbar-mensagens").scrollTop();
        window.addEventListener('nova_mensagem', event => {
            $(".alert-nova-message").css('visibility', 'visible');
        });
        window.addEventListener('mensagem_enviada', event => {
            scrollDownWhenMessageSend();
        });
        window.addEventListener('iniciando_conversa', event => {
            scrollDownWhenMessageSend();
        });

        function scrollDownWhenMessageSend() {
            $scroll = document.getElementById("scrollbar-mensagens");
            $scroll.scrollTo(0, 9999);
            var height = $("#scrollbar-mensagens").scrollTop();
            $(".alert-nova-message").css("visibility", "hidden");
        }
        $messages = document.querySelectorAll(".message.user p")[0];
        function clickToConfigMessage() {
            alert("clicando");
        }
    </script>
</div>
