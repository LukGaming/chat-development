<?php

namespace App\Http\Livewire;

use App\Models\last_seen;
use Carbon\Carbon;
use Livewire\Component;

class LastSeen extends Component
{
    public $user_id;
    public $last_seen_in;
    public function render()
    {
        $this->last_seen();
        return view('livewire.last-seen');
    }
    public function watchInDataBaseWhenWasTheLastSeen()
    {
        return last_seen::where('user_id', $this->user_id)->first();
    }
    public function last_seen()
    {
        $last_seen = $this->watchInDataBaseWhenWasTheLastSeen();
        $interval = Carbon::parse($last_seen->updated_at)->diffInSeconds(Carbon::now());
        if ($interval < 20) {
            $this->last_seen_in = "Online";
        }
        else{
            $this->last_seen_in = $last_seen->updated_at;
        }
    }
}
