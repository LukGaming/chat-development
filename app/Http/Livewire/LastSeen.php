<?php

namespace App\Http\Livewire;

use App\Models\last_seen;
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
     //dd($this->user_id);
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
      $this->last_seen_in = $this->whenWasLastSeen($interval, $last_seen);
   }
   public function whenWasLastSeen($interval, $last_seen)
   {
      $hoje = Carbon::today();
      if ($last_seen->diffInDays() < 7) {
         $horario = Carbon::createFromFormat('Y-m-d H:i:s', $last_seen)->format('H:i');
         if ($last_seen->isYesterday()) {
            return "Visto por Ultimo Ontem às " .  $horario;
         } else if ($last_seen->isToday()) {
            return "Visto por Ultimo Hoje às " .  $horario;
         } else if ($last_seen->isMonday()) {
            return "Visto por Ultimo Segunda-Feira às " .  $horario;
         } else if ($last_seen->isTuesday()) {
            return "Visto por Ultimo Terça-Feira às " .  $horario;
         } else if ($last_seen->isWednesday()) {
            return "Visto por Ultimo Quarta-Feira às " .  $horario;
         } else if ($last_seen->isThursday()) {
            return "Visto por Ultimo Quinta-Feira às " .  $horario;
         } else if ($last_seen->isFriday()) {
            return "Visto por Ultimo Sexta-Feira às " .  $horario;
         } else if ($last_seen->isSaturday()) {
            return "Visto por Ultimo Sábado às " .  $horario;
         } else if ($last_seen->isSunday()) {
            return "Visto por Ultimo Domingo às " .  $horario;
         }
         if ($interval < 20) {
            return "Online";
         }
      }
      if ($last_seen->diffInDays() >= 7 && $last_seen->diffInDays() < 14) {
         return "Visto a mais de uma semana";
      }
      if ($last_seen->diffInDays() >= 14 && $last_seen->diffInDays() < 21) {
         return "Visto a duas semanas";
      }
      if ($last_seen->diffInDays() >= 21 && $last_seen->diffInDays() < 28) {
         return "Visto a Tres semanas";
      }
      if ($last_seen->diffInDays() >= 28 && $last_seen->diffInDays() < 32) {
         return "Visto a Quatro semanas";
      }
      if ($last_seen->diffInDays() >= 31 && $last_seen->diffInDays() < 59) {
         return "Visto a mais de um mes";
      }
      if ($last_seen->diffInMonths() == 2) {
         return "Visto a mais de Dois meses";
      }
      if ($last_seen->diffInMonths() == 3) {
         return "Visto a mais de Tres meses";
      }
      if ($last_seen->diffInMonths() == 4) {
         return "Visto a mais de Quatro meses";
      }
      if ($last_seen->diffInMonths() == 5) {
         return "Visto a mais de Cinco meses";
      }
      if ($last_seen->diffInMonths() == 6) {
         return "Visto a mais de Seis meses";
      }
      if ($last_seen->diffInMonths() == 7) {
         return "Visto a mais de Sete meses";
      }
      if ($last_seen->diffInMonths() ==  8) {
         return "Visto a mais de Oito meses";
      }
      if ($last_seen->diffInMonths() ==  9) {
         return "Visto a mais de Nove meses";
      }
      if ($last_seen->diffInMonths() ==  10) {
         return "Visto a mais de Dez meses";
      }
      if ($last_seen->diffInMonths() ==  11) {
         return "Visto a mais de Onze meses";
      }
      if ($last_seen->diffInMonths() ==  12) {
         return "Visto a mais de Doze meses";
      }
      if ($last_seen->diffInYears() ==  1) {
         return "Visto a mais de um Ano";
      }
   }
}
