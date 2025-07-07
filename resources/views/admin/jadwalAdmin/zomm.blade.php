@extends('admin.layout') {{-- atau layout kamu --}}
@section('content')

<h2 class="text-lg font-bold mb-4">Kirim Link Zoom untuk Janji Temu</h2>

<div class="bg-white p-6 rounded shadow max-w-xl">
    <form action="{{ route('jadwal.kirimZoom', $janjiTemu->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama:</label>
            <p>{{ $janjiTemu->user->nama }}</p>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Tanggal & Jam:</label>
            <p>{{ $janjiTemu->tanggal }} pukul {{ $janjiTemu->jam }}</p>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Link Zoom:</label>
            <input type="url" name="link_zoom" required class="w-full border rounded p-2" placeholder="https://zoom.us/j/xxxxxx">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim ke WhatsApp</button>
    </form>
</div>

@endsection
