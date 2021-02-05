<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Staf extends Component
{
    public $sukses;
    public $nama;
    public $email;
    public $telp;
    // aturan penulisan yang diinginkan
    protected $rules = [
        'nama' => 'required',
        'email' => 'required|email',
        'telp'=> 'required|min:12',
    ];

    // pesan error yang muncul
    protected $messages = [
        'nama.required'=> 'Masukkan nama',
        'email.required' => 'Masukkan Email',
        'email.email' => 'Format email salah',
        'telp.required' => 'Masukkan no telpon',
        'telp.min' => 'Format nomor salah',

    ];

    //real-time cek form 
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    // menyimpan data
    public function SimpanData()
    {
        $this->validate();

        $this->sukses="Data Berhasil Dimasukkan";
    }

    public function render()
    {
        return view('livewire.staf')
        // memasukkan template
        ->extends('layouts.app')
        ->section('content');
    }
}
