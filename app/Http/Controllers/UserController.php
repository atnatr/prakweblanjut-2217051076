<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];
        
        return view('listUser', $data);
    }
    
    public function create(){

        $kelas = $this->kelasModel->getKelas();

        $data = [
            'kelas' => $kelas,
            'title' => 'Create User',
        ];
        
        return view('createUser', $data);
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
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $user = UserModel::create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id']
        ]);

        $user -> load('kelas');
        
        return view('profile', [
            'title' => 'Profile',
            'nama' => $user->nama,
            'npm' => $user->npm,
            'kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan'
        ]);
    }

    // public function profile($nama ="", $kelas = "", $npm = ""){
    //     if ($nama == "" && $kelas == "" && $npm == ""){
    //         $data = [
    //             'title' => 'Profile',
    //             'nama' => 'Berli Anta Atrizki',
    //             'kelas' => 'A',
    //             'npm' => '221705176'
    //         ];
    //     }
    //     else {
    //         $data = [
    //             'title' => 'Profile',
    //             'nama' => $nama,
    //             'kelas' => $kelas,
    //             'npm' => $npm
    //         ];
    //     }
    //     return view('profile', $data);
    // }
    public function profile(Request $request){
        $nama = $request->input('nama');
        $kelas_id = $request->input('kelas_id');
        $npm = $request->input('npm');

        $kelas = Kelas::find($kelas_id);

        $data = [
            'title' => 'Profile',
            'nama' => $nama,
            'kelas' => $kelas ? $kelas->nama_kelas : 'Kelas tidak ditemukan',
            'npm' => $npm
        ];

        return view('profile', $data);
    }
}
