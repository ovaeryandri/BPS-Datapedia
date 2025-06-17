@extends('jadwal.layout') {{-- disamakan layout-nya --}}
@section('content')
<div class="w-full p-6 bg-gray-100">
    <div class="w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-400 p-4">
            <h2 class="text-xl font-bold text-blue-800">Status Ketersediaan Konsultan</h2>
        </div>

        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('status.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <p class="font-semibold mb-2">Pilih status Anda:</p>
                    <label class="block mb-2">
                        <input type="radio" name="status" value="tersedia" onclick="document.getElementById('alasan-box').style.display='none'">
                        ✅ Tersedia
                    </label>
                    <label class="block">
                        <input type="radio" name="status" value="tidak tersedia" onclick="document.getElementById('alasan-box').style.display='block'">
                        ❌ Tidak Tersedia
                    </label>
                </div>

                <div id="alasan-box" class="mb-4" style="display:none;">
                    <label for="alasan" class="block font-medium mb-1">Alasan:</label>
                    <textarea name="alasan" class="w-full border rounded p-2" rows="3">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-medium px-4 py-2 rounded">
                    Simpan Status
                </button>
            </form>

            <div class="mt-6">
                <h2 class="font-semibold text-lg mb-2">Status Saat Ini:</h2>
                <p><strong>Status:</strong> {{ $konsultan->status ?? 'Belum diatur' }}</p>
                @if($konsultan->status == 'tidak tersedia')
                    <p><strong>Alasan:</strong> {{ $konsultan->alasan }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const status = "{{ $konsultan->status }}";
        if (status === 'tidak tersedia') {
            document.querySelector('input[value="tidak tersedia"]').checked = true;
            document.getElementById('alasan-box').style.display = 'block';
        } else if (status === 'tersedia') {
            document.querySelector('input[value="tersedia"]').checked = true;
        }
    });
</script>
@endsection
