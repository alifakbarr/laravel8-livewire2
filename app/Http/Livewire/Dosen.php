<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dosen extends Component
{
    public function render()
    {
        $data=[
            'nama'=>'gg',
        ];
        return view('livewire.dosen',$data)
        // memasukkan template
        ->extends('layouts.app')
        ->section('content');
    }
}
