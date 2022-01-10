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
    {{-- <div wire:poll="atualizando_mensagens"></div> --}}
    @if ($contato)

        <div class="skype-parent" ></div>

        @foreach ($messages as $mensagem)
            {{-- Se foi o usuário que enviou a mensagem --}}
            @if ($mensagem->sendFromUser == Auth::id())

                <div class="message-send-message ">
                    <div class="message-send " onmouseover="appearBtnSettings(this)"
                        onmouseout="hiddeBtnSettings(this)">
                        {{ $mensagem->body }}
                        <div class="right-side-div-message">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 65.326 612 502.174" enable-background="new 0 65.326 612 502.174"
                            xml:space="preserve" class="logo">
                        </svg>
                        <svg viewbox="0 0 100 100" onclick="openBtnSettings(this)" data-toggle="dropdown"
                            aria-expanded="false">
                            <!-- The arrow shape is simple enough that the path is hand coded -->
                            <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" />
                        </svg>
                        <div class="dropdown-menu dropdown-mensagens bg-primary text-light">
                            <div class="dropdown-item mensagem-inside-dropdown-mensagens">
                               
                                @livewire('apagar-mensagem', ['mensagem' => $mensagem['id']])
                            </div>
                            <div class="dropdown-item mensagem-inside-dropdown-mensagens">
                                <div  class="text-light " >
                                   Editar Mensagem
                                </div>
                            </div>
                        </div>
                           
                            <span class="time  ">
                                <?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mensagem->created_at)->format('H:i');
                                ?>
                            </span>
                        </div>
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

        function appearBtnSettings(event) {
            $ficar_visivel = event.querySelectorAll('svg')[1]
            $ficar_visivel.style.visibility = 'visible'
            console.log("entrando mouse")
        }

        function hiddeBtnSettings(event) {
            console.log("saindo com mouse")
            $ficar_visivel = event.querySelectorAll('svg')[1]
            $ficar_visivel.style.visibility = 'hidden'
        }

        function openBtnSettings(event) {
            console.log("abrindo Btn")
        }
    </script>
</div>
