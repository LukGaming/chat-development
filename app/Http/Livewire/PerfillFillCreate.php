<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PerfillFillCreate extends Component
{
    use WithFileUploads;
    public $photo;
    protected $listeners = ['fileUpload' => 'handledFileUpload'];
    public function render()
    {
        return view('livewire.perfill-fill-create');
    }
    public function handledFileUpload($photoData){
        $this->photo = $photoData;
    }
}
