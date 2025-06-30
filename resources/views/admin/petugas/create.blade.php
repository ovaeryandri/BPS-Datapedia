@extends('admin.layout')
@section('content')

<div class="w-full p-6 bg-gray-100 min-h-screen">
    <div class="w-full  bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-300 p-4">
            <h2 class="text-xl font-bold text-blue-800">Buat Petugas Hari Ini</h2>
        </div>

        <form method="POST" action="{{ route('petugas.store') }}" class="p-6">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Pilih Petugas Hari Ini:</label>
                <select name="konsultan_id" required>
    @foreach ($konsultan as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
    @endforeach
</select>


    <div class="mb-4">
    <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal Tugas</label>
    <input type="date" name="tanggal" id="tanggal"
        min="{{ old('tanggal', now()->format('Y-m-d')) }}"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" required>
</div>


    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>

            </div>


            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="terms" class="form-checkbox h-5 w-5 text-blue-300" required>
                    <span class="ml-2 text-gray-700">Saya Sebagai Admin</span>
                </label>

                    <p class="text-red-500 text-sm mt-1"></p>

            </div>

        </form>
    </div>
</div>
@endsection
