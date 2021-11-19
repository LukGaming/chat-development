<div>

    @if ($contato)
    {{$messages}}
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
