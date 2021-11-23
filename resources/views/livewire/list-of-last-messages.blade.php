<div>
    @if ($last_user_and_its_last_messages)
        @foreach ($last_user_and_its_last_messages as $user)
        <div class="list-group" style="margin-bottom: 5%; margin-right: 5px; ">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">{{$user["nome_contato"]}}</h6>
                    <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                </div>
                <div class="border-bottom"></div>
                <small>{{$user["last_message"]}}</small>
            </a>
        </div>
        @endforeach
    @endif
    
</div>
