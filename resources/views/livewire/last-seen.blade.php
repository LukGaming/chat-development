
@if ($last_seen_in == 'Online')
    Online
    @else 
    <div class="text-white"> Visto Por Ultimo: {{ $last_seen_in }}</div>
@endif

