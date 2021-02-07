<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as tableUser;
class User extends Component
{
    public $users;

    public $name;
    public $email;
    public $password;
    // aturan penulisan yang diinginkan
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password'=> 'required|min:4',
    ];

    // pesan error yang muncul
    protected $messages = [
        'name.required'=> 'Masukkan nama',
        'email.required' => 'Masukkan Email',
        'email.email' => 'Format email salah',
        'email.unique' => 'Email sudah ada',
        'password.required' => 'Masukkan password',
        'password.min' => 'Min 4 char',

    ];

    public function ClearForm(){
        $this->name='';
        $this->email='';
        $this->password='';
    }

    //real-time cek form 
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    // menyimpan data
    public function SimpanData()
    {
        $validasi =$this->validate();

        tableUser::create($validasi);
        session()->flash('pesan','Data berhasil Disimpan');
        $this->ClearForm();
        // agar auto close modal
        $this->emit('addData');
    }

    public function render()
    {
        // manampilkan semua data user
        $this->users=tableUser::orderBy('id','DESC')->get();
        return view('livewire.user')
        // memasukkan template
        ->extends('layouts.app')
        ->section('content');
    }
}
