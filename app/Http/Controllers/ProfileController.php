<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
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