<div>

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
                            <p>{{ $mensagem->body }}</p>
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
            $btnAlert_Nova_Mensagem = document.getElementById("btnAlert-Nova-Mensagem").style.position = "absolute";


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
    </script>

    {{-- <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>It's easy!</p>
        </div>
        <div>08:40</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>It's easy!</p>
        </div>
        <div>08:40</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>It's easy!</p>
        </div>
        <div>08:40</div>
    </div>

    <div class="message user">
        <div></div>
        <div>
            <p>Really?</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>Well...</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message user">
        <div></div>
        <div>
            <p>Really?</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>It's easy!</p>
        </div>
        <div>08:40</div>
    </div>

    <div class="message user">
        <div></div>
        <div>
            <p>Really?</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>Well...</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message user">
        <div></div>
        <div>
            <p>Really?</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>It's easy!</p>
        </div>
        <div>08:40</div>
    </div>

    <div class="message user">
        <div></div>
        <div>
            <p>Really?</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message">
        <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
        <div>
            <p>Well...</p>
        </div>
        <div>08:42</div>
    </div>
    <div class="message user">
        <div></div>
        <div>
            <p>Really?</p>
        </div>
        <div>08:42</div>
    </div>
</div> --}}


</div>
