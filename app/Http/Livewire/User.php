<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as tableUser;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $users;

    // $ids agar tidak bentrok
    public $ids;
    public $name;
    public $email;
    public $password;
    // aturan penulisan yang diinginkan
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
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
        // insert biasa
        // $validasi =$this->validate();
        // tableUser::create($validasi);

        // insert dengan encrype
        $this->validate();
        $data=[
            'name'=>$this->name,
            'email'=>$this->email,
            // 'password'=>$this->password,
            // encrype password
            'password'=>Hash::make($this->password),
        ];
        tableUser::insert($data);

        session()->flash('pesan','Data berhasil Disimpan');
        $this->ClearForm();
        // agar auto close modal
        $this->emit('addData');
    }

    public function DetailData($id)
    {
        $user= tableUser::where('id',$id)->first();
        // mengambil data dari var user
        $this->ids=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->password=$user->password;
    }

    public function EditData(){
        $validasi =$this->validate();
        // data yang akan dikirim ke data base
        $data=[
            'name'=>$this->name,
            'email'=>$this->email,
            // 'password'=>$this->password,
            // encrype password
            'password'=>Hash::make($this->password),
        ];
        tableUser::where('id',$this->ids)->update($data);
        session()->flash('pesan','Data berhasil Diedit');
        $this->ClearForm();
        
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
