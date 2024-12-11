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
            'users' => $this->userModel->getUsers()
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
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->move('upload/img', uniqid() . '.' . $foto->getClientOriginalExtension());
        } else {
            $fotoPath = null;
        }
        
        $user = UserModel::create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
            'foto' => $fotoPath
        ]);        

        // $user -> load('kelas');
        
        // return view('profile', [
        //     'title' => 'Profile',
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan'
        // ]);
        
        return redirect()->route('user.profile', ['id' => $user->id]);
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
    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user
        ];

        return view('profile', $data);
    }
    // public function profile(Request $request){
    //     $nama = $request->input('nama');
    //     $kelas_id = $request->input('kelas_id');
    //     $npm = $request->input('npm');
    //     $foto = $request->input('foto');

    //     $kelas = Kelas::find($kelas_id);

    //     $data = [
    //         'title' => 'Profile',
    //         'nama' => $nama,
    //         'kelas' => $kelas ? $kelas->nama_kelas : 'Kelas tidak ditemukan',
    //         'npm' => $npm,
    //         'foto' => $foto
    //     ];

    //     return view('profile', $data);
    // }

    public function profile($id) {
        $user = UserModel::with('kelas')->findOrFail($id);
        
        return view('profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }
    
}
