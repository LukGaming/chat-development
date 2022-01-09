<?php

namespace App\Http\Livewire;

use App\Models\last_seen;
use App\Providers\LastSeenProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LastSeen extends Component
{
   public $user_id;
   public $last_seen_in;
   protected $listeners = ['atualiza_last_seen' => 'atualiza_last_seen_when_change_contato'];
   public function render()
   {
      
      $this->last_seen();
      return view('livewire.last-seen');
   }
   public function watchInDataBaseWhenWasTheLastSeen()
   {
      return last_seen::where('user_id', $this->user_id)->first();
   }
   public function atualiza_last_seen_when_change_contato($contato)
   {
      $this->user_id = $contato;
   }
   public function last_seen()
   {
      $last_seen = $this->watchInDataBaseWhenWasTheLastSeen()->updated_at;
      $interval = Carbon::parse($last_seen)->diffInSeconds(Carbon::now());
      $this->last_seen_in = LastSeenProvider::whenWasLastSeen($interval, $last_seen);
   }
   
}
