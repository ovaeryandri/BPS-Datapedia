@extends('admin.layout')
@section('content')

<div class="w-full p-6 bg-gray-100">
    <div class="w-full bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Judul -->
        <div class="bg-blue-400 p-4">
            <h2 class="text-xl font-bold text-blue-800">Data Janji Temu</h2>
        </div>

        <!-- Tabel Janji Temu -->
        <div class="mb-6 overflow-x-auto">
            <table class="min-w-full border-collapse text-sm text-left">
                <thead>
                    <tr class="bg-blue-300 text-blue-900">
                        <th class="p-3 border border-blue-400 text-center">Nama User</th>
                        <th class="p-3 border border-blue-400 text-center">No HP</th>
                        <th class="p-3 border border-blue-400 text-center">Alamat</th>
                        <th class="p-3 border border-blue-400 text-center">Keperluan</th>
                        <th class="p-3 border border-blue-400 text-center">Tanggal</th>
                        <th class="p-3 border border-blue-400 text-center">Jenis Janji Temu</th>
                        <th class="p-3 border border-blue-400 text-center">Konsultan</th>
                    </tr>
                </thead>

                <tbody>
@foreach ($janjiTemu as $item)
<tr class="bg-white hover:bg-gray-50 text-center">
    <td class="p-3 border">{{ $item->user->nama ?? '-' }}</td>
    <td class="p-3 border">{{ $item->user->no_hp }}</td>
    <td class="p-3 border">{{ $item->alamat }}</td>
    <td class="p-3 border">{{ $item->keperluan }}</td>
    <td class="p-3 border">{{ $item->tanggal }}</td>
    <td class="p-3 border">{{ $item->jenis }}</td>
   <td class="p-3 border text-center">
    @if($item->jadwal)
        @if($item->jadwal->konsultan)
            <div class="flex flex-col items-center space-y-1">
                <span>{{ $item->jadwal->konsultan->nama }}</span>
                <form method="POST" action="{{ route('jadwal.batal', $item->jadwal->id) }}" onsubmit="return confirm('Batalkan penjadwalan ini?')">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline text-sm">Batal</button>
                </form>
            </div>
        @else
            <form method="POST" action="{{ route('jadwal.store') }}" class="flex items-center space-x-2">
                @csrf
                <input type="hidden" name="janjitemu_id" value="{{ $item->id }}">
                <select name="konsultan_id" class="border rounded p-1 text-sm" required>
                    <option value="">Pilih Konsultan</option>
                    @foreach ($konsultans as $konsultan)
                        <option value="{{ $konsultan->id }}">{{ $konsultan->nama }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Atur</button>
            </form>
        @endif
    @else
        <form method="POST" action="{{ route('jadwal.store') }}" class="flex items-center space-x-2">
            @csrf
            <input type="hidden" name="janjitemu_id" value="{{ $item->id }}">
            <select name="konsultan_id" class="border rounded p-1 text-sm" required>
                <option value="">Pilih Konsultan</option>
                @foreach ($konsultans as $konsultan)
                    <option value="{{ $konsultan->id }}">{{ $konsultan->nama }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Atur</button>
        </form>
    @endif
</td>


</tr>
@endforeach
</tbody>


            </table>

            <!-- Pagination controls -->
            <div id="pagination-controls" class="flex justify-center mt-6 space-x-2"></div>
        </div>

        <!-- Daftar Konsultan & Status -->
        {{-- <div class="p-4">
            <h2 class="text-lg font-bold mb-3">Daftar Konsultan & Status</h2>
            @foreach($konsultans as $k)
                <div class="border p-3 mb-2 rounded bg-gray-100">
                    <p><strong>{{ $k->nama }}</strong> - Status: {{ ucfirst($k->status) }}</p>
                    @if($k->status === 'tidak tersedia' && $k->alasan)
                        <p><strong>Alasan:</strong> {{ $k->alasan }}</p>
                    @endif
                </div>
            @endforeach
        </div> --}}

    </div>
</div>

@endsection
