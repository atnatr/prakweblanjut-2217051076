@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <a href="{{ route('user.create') }}" 
    class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-150 mb-2">
    Tambah User
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">NPM</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Kelas</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="hidden">{{ $user['kelas_id'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['id'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">
                        <img src="{{ $user->foto ? asset($user->foto) : asset('walawe/img/suisei.png') }}" 
                             alt="User Foto" 
                             class="w-12 h-12 rounded-full object-cover">
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['nama'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['npm'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['nama_kelas'] }}</td>
                    <td class="px-6 py-4 text-center border-b">
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('user.profile', $user->id) }}" 
                               class="text-blue-500 hover:text-blue-700 font-semibold">Lihat</a>


                            <button class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection