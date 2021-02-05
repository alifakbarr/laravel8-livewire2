<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Staf extends Component
{
    public function render()
    {
        return view('livewire.staf')
        // memasukkan template
        ->extends('layouts.app')
        ->section('content');
    }
}
