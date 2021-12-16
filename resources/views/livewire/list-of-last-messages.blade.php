<div>
    <input class="form-control form-control-md " type="text" placeholder="Pesquisar por mensagens" id="search-messages"
        wire:model="search_messages" wire:keydown.debounce.500ms="searchingContactsAndMessages">
    <hr class="bg-light">
    @if ($pesquisa == 0)
        @if (count($last_user_and_its_last_messages) > 0)

            @foreach ($last_user_and_its_last_messages as $user)
                <div class="list-group" style="margin-bottom: 5%; margin-right: 5px; " wire:poll='lastMessages()'
                    wire:click="mensagem_iniciada({{ $user['id_contato_user_id'] }})"
                    wire:click="$emitTo('LastSeen', 'last_seen')">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                            <h4 style="font-weight: 300; font: inherit" class="mb-1" data-toggle="tooltip"
                                data-placement="top" title="{{ $user['nome_contato'] }}">{{ $user['nome_contato'] }}
                                </h6>

                                @if ($user['not_read'] > 0)
                                    <small><span class="badge badge-primary badge-pill bg-dark">{{ $user['not_read'] }}
                                        </span></small>
                                @endif
                        </div>

                        <div class="d-flex justify-content-between" data-toggle="tooltip" data-placement="top"
                            title="{{ $user['last_message'] }}">
                            <small>
                                <?php
                                echo Str::substr($user['last_message'], 0, 15) . '...';
                                ?>
                            </small>
                            <small> {{ $user['dia'] }}

                            </small>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    @endif
    @if ($pesquisa == 1)
        @if (count($last_user_and_its_last_messages) > 0)
            @foreach ($last_user_and_its_last_messages as $user)
                @if ($user['type'] == 0)
                    <div class="h5 text-success">Contatos</div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px; " wire:poll='lastMessages()'
                        wire:click="mensagem_iniciada({{ $user['id_contato_user_id'] }})"
                        wire:click="$emitTo('LastSeen', 'last_seen')">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h4 style="font-weight: 300; font: inherit" class="mb-1" data-toggle="tooltip"
                                    data-placement="top" title="{{ $user['nome_contato'] }}">
                                    {{ $user['nome_contato'] }}
                                    </h6>

                                    @if ($user['not_read'] > 0)
                                        <small><span
                                                class="badge badge-primary badge-pill bg-dark">{{ $user['not_read'] }}
                                            </span></small>
                                    @endif
                            </div>

                            <div class="d-flex justify-content-between" data-toggle="tooltip" data-placement="top"
                                title="{{ $user['last_message'] }}">
                                <small>
                                    <?php
                                    echo Str::substr($user['last_message'], 0, 15) . '...';
                                    ?>
                                </small>
                                <small> {{ $user['dia'] }}

                                </small>
                            </div>
                        </a>
                    </div>
                @endif
                @endforeach
                @foreach ($last_user_and_its_last_messages as $user)
                    @if($user["type"] == 1)
                        <div class="h5 text-success">Mensagens</div>
                    @endif
                @endforeach
            @endif
        @endif
</div>
