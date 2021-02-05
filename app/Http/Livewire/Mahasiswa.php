<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mahasiswa extends Component
{
    public function render()
    {
        return view('livewire.mahasiswa')
        // memasukkan template
        ->extends('layouts.app')
        ->section('content');
    }
}
