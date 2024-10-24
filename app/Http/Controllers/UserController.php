<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create(){
        return view('createUser');
    }
    public function store(Request $request){
        $data = [
                'nama' => $request->input('nama'),
                'kelas' => $request->input('kelas'),
                'npm' => $request->input('npm')
        ];
        return view('profile', $data);
    }
    public function profile($nama ="", $kelas = "", $npm = ""){
        if ($nama == "" && $kelas == "" && $npm == ""){
            $data = [
                'nama' => 'Berli Anta Atrizki',
                'kelas' => 'A',
                'npm' => '221705176'
            ];
        }
        else {
            $data = [
                'nama' => $nama,
                'kelas' => $kelas,
                'npm' => $npm
            ];
        }
        return view('profile', $data);
    }
}
