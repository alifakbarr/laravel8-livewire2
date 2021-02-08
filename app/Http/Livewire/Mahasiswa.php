<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\MahasiswaModel;

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
