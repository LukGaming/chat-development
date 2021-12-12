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

        $hoje = Carbon::today();
        // if($hoje->isSunday()){
        //     dd("Hoje é domingo");
        // }
        //Preciso saber se a diferença é menor que 7 dias
        $hoje = Carbon::today();
        if ($last_seen->updated_at->diffInDays() < 7) {
            if ($last_seen->updated_at->isYesterday()) {
                $this->last_seen_in = "Visto por Ultimo Ontem às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isToday()) {
                $this->last_seen_in = "Visto por Ultimo Hoje às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isMonday()) {
                $this->last_seen_in = "Visto por Ultimo Segunda-Feira às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isTuesday()) {
                $this->last_seen_in = "Visto por Ultimo Terça-Feira às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isWednesday()) {
                $this->last_seen_in = "Visto por Ultimo Quarta-Feira às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isThursday()) {
                $this->last_seen_in = "Visto por Ultimo Quinta-Feira às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isFriday()) {
                $this->last_seen_in = "Visto por Ultimo Sexta-Feira às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isSaturday()) {
                $this->last_seen_in = "Visto por Ultimo Sábado às " . $last_seen->updated_at->format('h:i');
            } else if ($last_seen->updated_at->isSunday()) {
                $this->last_seen_in = "Visto por Ultimo Domingo às " . $last_seen->updated_at->format('h:i');
            }
            if ($interval < 20) {
                $this->last_seen_in = "Online";
            }
        }
        if ($last_seen->updated_at->diffInDays() >= 7 && $last_seen->updated_at->diffInDays() < 14) {
            $this->last_seen_in = "Visto a mais de uma semana";
        }
        if ($last_seen->updated_at->diffInDays() >= 14 && $last_seen->updated_at->diffInDays() < 21) {
            $this->last_seen_in = "Visto a duas semanas";
        }
        if ($last_seen->updated_at->diffInDays() >= 21 && $last_seen->updated_at->diffInDays() < 28) {
            $this->last_seen_in = "Visto a Tres semanas";
        }
        if ($last_seen->updated_at->diffInDays() >= 28 && $last_seen->updated_at->diffInDays() < 32) {
            $this->last_seen_in = "Visto a Quatro semanas";
        }
        if ($last_seen->updated_at->diffInDays() >= 31 && $last_seen->updated_at->diffInDays() < 59) {
            $this->last_seen_in = "Visto a mais de um mes";
        }
        if ($last_seen->updated_at->diffInMonths() == 2 ) {
            $this->last_seen_in = "Visto a mais de Dois meses";
        }
        if ($last_seen->updated_at->diffInMonths() == 3 ) {
            $this->last_seen_in = "Visto a mais de Tres meses";
        }
        if ($last_seen->updated_at->diffInMonths() == 4 ) {
            $this->last_seen_in = "Visto a mais de Quatro meses";
        }
        if ($last_seen->updated_at->diffInMonths() == 5 ) {
            $this->last_seen_in = "Visto a mais de Cinco meses";
        }
        if ($last_seen->updated_at->diffInMonths() == 6 ) {
            $this->last_seen_in = "Visto a mais de Seis meses";
        }
        if ($last_seen->updated_at->diffInMonths() == 7 ) {
            $this->last_seen_in = "Visto a mais de Sete meses";
        }
        if ($last_seen->updated_at->diffInMonths() ==  8) {
            $this->last_seen_in = "Visto a mais de Oito meses";
        }
        if ($last_seen->updated_at->diffInMonths() ==  9) {
            $this->last_seen_in = "Visto a mais de Nove meses";
        }
        if ($last_seen->updated_at->diffInMonths() ==  10) {
            $this->last_seen_in = "Visto a mais de Dez meses";
        }
        if ($last_seen->updated_at->diffInMonths() ==  11) {
            $this->last_seen_in = "Visto a mais de Onze meses";
        }
        if ($last_seen->updated_at->diffInMonths() ==  12) {
            $this->last_seen_in = "Visto a mais de Doze meses";
        }
        if ($last_seen->updated_at->diffInYears() ==  1) {
            $this->last_seen_in = "Visto a mais de um Ano";
        }
        
    }
}
