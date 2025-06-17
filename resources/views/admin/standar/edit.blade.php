@extends('admin.layout')
@section('content')

<div class="w-full p-6 bg-gray-100 min-h-screen">
    <div class="w-full  bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-300 p-4">
            <h2 class="text-xl font-bold text-blue-800">Ubah Standar Layanan</h2>
        </div>

        <form method="POST" action="{{ route('standar.update',$standar->id) }}" enctype="multipart/form-data" class="p-6">
            @method('PUT')
            @csrf

            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul layanan Layanan</label>
                <input type="text" name="judul" id="judul" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ $standar->judul }}">

                    <p class="text-red-500 text-sm mt-1"></p>

            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-gray-700 font-medium mb-2">Gambar Layanan</label>

                <div class="mb-4">

                    <!-- Tampilkan file lama -->
                    @if($standar->gambar)
                        <img src="{{ asset('storage/'.$standar->gambar) }}" class="w-[400px] h-96 object-cover mb-2" alt="gambar">
                    @endif

                </div>

                <input type="file" name="gambar" id="gambar" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ $standar->gambar }}">

                   @error('gambar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-6 py-2 bg-blue-300 hover:bg-blue-400 text-blue-800 font-medium rounded-lg">Ubah</button>

            </div>
        </form>
    </div>
</div>
@endsection
