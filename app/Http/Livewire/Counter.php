<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $angka = $this->count;
        if($angka ==0){
            return false;
        }else{
            $this->count--;
        }
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
