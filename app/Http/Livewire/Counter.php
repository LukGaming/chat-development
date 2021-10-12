<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public function render()
    {
        return view('livewire.counter');
    }
    public function soma(){
        $this->count++;
    }
    public function subtrai(){
        if($this->count == 0) return;
        $this->count--;
    }
}
