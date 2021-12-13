<div>
    @if ($last_user_and_its_last_messages)
        @foreach ($last_user_and_its_last_messages as $user)

            <div class="list-group" style="margin-bottom: 5%; margin-right: 5px; " wire:poll='lastMessages()'
                wire:click="mensagem_iniciada({{ $user['id_contato_user_id'] }})" wire:click= "$emitTo('LastSeen', 'last_seen')">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">{{ $user['nome_contato'] }}</h6>
                        @if($user["not_read"]>0)
                        <small><span class="badge badge-primary badge-pill bg-dark">{{$user["not_read"]}} </span></small>
                        @endif
                    </div>
                    <div class="border-bottom"></div>
                    <div class="d-flex justify-content-between">
                        <small>
                            <?php
                            echo Str::substr($user['last_message'], 0, 15) . '...';
                            ?>
                        </small>
                        <small><?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user['horario'])->format('H:i');
                        ?>
                        </small>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
</div>
