<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index() {
        $data = [
            'nama' => 'Ari Gunawan',
            'nim' => '221011700858',
            'prodi' => 'Sistem Informasi - UNPAM',
        ];

        return view('mahasiswa', $data);
    }
}
