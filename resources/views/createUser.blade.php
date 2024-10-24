<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">Create User</h2>

            <form action="{{ route('user.store') }}" method="POST">
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
                        <option value="{{$kelasItem->id}}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }} >{{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>