@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center h-screen">
    <div class="w-40 h-40 bg-gray-300 rounded-full flex items-center justify-center mb-6">
        <img src="{{ $user->foto ? asset($user->foto) : asset('walawe/img/suisei.png')  }}" alt="Profile Picture" class="rounded-full">
    </div>
    <div class="w-full max-w-xs">
        <div class="bg-gray-100 p-4 mb-4 text-center rounded-lg">
            <p class="font-semibold text-lg">{{ $user->nama}}</p>
        </div>
        <div class="bg-gray-100 p-4 text-center rounded-lg">
            <p class="font-semibold text-lg">{{ $user->npm }}</p>
        </div>
        <div class="bg-gray-100 p-4 mb-4 mt-4 text-center rounded-lg">
            <p class="font-semibold text-lg">{{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
        <img src="{{ asset('walawe/img/suisei.png') }}" alt="Profile Picture" class="rounded-full">
    </div>
    <div class="w-full max-w-xs">
        <div class="bg-gray-100 p-4 mb-4 text-center rounded-lg">
            <p class="font-semibold text-lg"><?= $nama ?></p>
        </div>
        <div class="bg-gray-100 p-4 text-center rounded-lg">
            <p class="font-semibold text-lg"><?= $npm ?></p>
        </div>
        <div class="bg-gray-100 p-4 mb-4 mt-4 text-center rounded-lg">
            <p class="font-semibold text-lg"><?= $kelas?></p>
        </div>
    </div>
</div>
@endsection