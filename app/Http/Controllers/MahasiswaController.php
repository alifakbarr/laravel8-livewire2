<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }
    public function index(){
        
    }
}
