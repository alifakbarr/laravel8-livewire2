<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as tableUser;
class User extends Component
{
    public $users;
    public function render()
    {
        // manampilkan semua data user
        $this->users=tableUser::all();
        return view('livewire.user')
        // memasukkan template
        ->extends('layouts.app')
        ->section('content');
    }
}
