<div wire:poll.20000ms>
    @if ($last_seen_in == 'Online')
        <div class="text-white">
            Online
        </div>
    @else
        <div class="text-white"> {{$last_seen_in}}</div>
        
    @endif
</div>
