@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">Create User</h2>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Masukkan Nama" 
                        value="{{ old('nama') }}"required>
                @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="npm" class="block text-gray-700 font-semibold mb-2">NPM</label>
                <input type="text" id="npm" name="npm" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Masukkan NPM" 
                        value="{{ old('npm') }}"required>
                @error('npm')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kelas_id" class="block text-gray-700 font-semibold mb-2">Kelas</label>
                <select id="kelas_id" name="kelas_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500" 
                    required>
                    @foreach ($kelas as $kelasItem)
                    <option value="{{$kelasItem->id}}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }} > {{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col items-start mb-4">
                <label for="foto" class="text-sm font-medium text-gray-700 mb-2">Upload file</label>
                <input type="file" id="foto" name="foto" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 file:bg-blue-500 file:text-white file:font-medium file:rounded-md file:border-none file:px-4 file:py-2 hover:file:bg-blue-600">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">Submit</button>
        </form>
    </div>
</div>
@endsection