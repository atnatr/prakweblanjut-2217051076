<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\Fakultas;
use App\Models\JurusanModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create(){
        return view('createUser', [
            'kelas' => Kelas::all(),
            'jurusan' => JurusanModel::all()
        ]);
    }

    // public function store(Request $request){
    //     $data = [
    //             'nama' => $request->input('nama'),
    //             'kelas' => $request->input('kelas'),
    //             'npm' => $request->input('npm')
    //     ];
    //     return view('profile', $data);
    // }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        $user = UserModel::create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
            'jurusan_id' => $validatedData['jurusan_id']
        ]);

        $user -> load('kelas','jurusan');
        // dd($user);
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
            'nama_jurusan' => $user->jurusan->nama_jurusan ?? 'Jurusan tidak ditemukan'
        ]);
    }

    public function profile($nama ="", $kelas = "", $npm = "", $jurusan = ""){
        if ($nama == "" && $kelas == "" && $npm == "" && $jurusan = ""){
            $data = [
                'nama' => 'Berli Anta Atrizki',
                'kelas' => 'A',
                'npm' => '221705176',
                'jurusan' => 'Ilmu Komputer'
            ];
        }
        else {
            $data = [
                'nama' => $nama,
                'kelas' => $kelas,
                'npm' => $npm,
                'jurusan' => $jurusan
            ];
        }
        return view('profile', $data);
    }
}
