@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $title }}</h1>

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
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['nama'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['npm'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 border-b">{{ $user['nama_kelas'] }}</td>
                    <td class="px-6 py-4 text-center border-b">
                        <div class="flex justify-center space-x-4">
                        <form action="{{ url('/profile') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nama" value="{{ $user['nama'] }}">
                            <input type="hidden" name="kelas_id" value="{{ $user['kelas_id'] }}">
                            <input type="hidden" name="npm" value="{{ $user['npm'] }}">
                            <button type="submit" class="text-blue-500 hover:text-blue-700 font-semibold">Lihat</button>
                        </form>

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