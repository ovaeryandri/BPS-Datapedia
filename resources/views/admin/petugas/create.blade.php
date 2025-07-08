@extends('admin.layout')
@section('content')

<div class="w-full p-6 bg-gray-100 min-h-screen">
    <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-300 px-6 py-4">
            <h2 class="text-xl font-bold text-blue-800">Buat Petugas Hari Ini</h2>
        </div>

        <form method="POST" action="{{ route('petugas.store') }}" class="p-6 space-y-6">
            @csrf

            {{-- Pilih Petugas Hari Ini --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Pilih Petugas Hari Ini:</label>

                @if($konsultan->isEmpty())
                <div class="text-red-600 font-medium mb-4">
                    Tidak ada konsultan yang tersedia saat ini.
                </div>
                @else

                <select name="konsultan_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <option disabled selected value="">-- Pilih Konsultan --</option>
                    @foreach ($konsultan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                @endif
            </div>

            {{-- Tanggal Tugas --}}
            <div>
                <label for="tanggal" class="block text-gray-700 font-semibold mb-1">Tanggal Tugas</label>
                <input type="date" name="tanggal" id="tanggal"
                       min="{{ old('tanggal', now()->format('Y-m-d')) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
                       required>
            </div>

            {{-- Konfirmasi Admin --}}
            <div class="flex items-center">
                <input type="checkbox" name="terms" id="terms"
                       class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded mr-2" required>
                <label for="terms" class="text-gray-700 text-sm">Saya Sebagai Admin</label>
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-right">
                <button type="submit"
                        class="inline-block bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
