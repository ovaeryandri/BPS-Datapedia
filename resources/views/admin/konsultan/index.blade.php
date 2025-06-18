@extends('admin.layout')
@section('content')
<div class="w-full p-6 bg-gray-100 ">
    <div class="w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-400 p-4">
            <h2 class="text-xl font-bold text-blue-800">Data Konsultan</h2>
        </div>

        <form method="POST" action="" class="p-6">
            @csrf
            <div class="mb-6">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-300">
                            <th class="p-3 text-left text-blue-800 border border-blue-400">No</th>
                            <th class="p-3 text-left text-blue-800 border border-blue-400">Email</th>
                            <th class="p-3 text-left text-blue-800 border border-blue-400">Nama</th>
                            <th class="p-3 text-left text-blue-800 border border-blue-400">Nomor HP</th>
                            <th class="p-3 text-left text-blue-800 border border-blue-400">Status</th>
                            <th class="p-3 text-left text-blue-800 border border-blue-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop data dari controller Laravel -->
                        <?php
                            $no = 1;
                        ?>
                        @foreach ($konsultan as $item)

                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border border-gray-200">
                                {{ $no++ }}
                            </td>

                            <td class="p-3 border border-gray-200">
                                {{ $item->email }}
                            </td>

                            <td class="p-3 border border-gray-200">
                                {{ $item->nama }}
                            </td>

                            <td class="p-3 border border-gray-200">
                                {{ $item->no_hp }}
                            </td>

                            <td class="p-3 border border-gray-200 align-top">
    @if ($item->status == 'tersedia')
        <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 text-sm font-medium rounded">
            ✅ Tersedia
        </span>
    @elseif ($item->status == 'tidak tersedia')
        <div class="space-y-1">
            <span class="inline-flex items-center px-2 py-1 bg-red-100 text-red-800 text-sm font-medium rounded">
                ❌ Tidak Tersedia
            </span>
            <p class="text-sm text-gray-700"><strong>Alasan:</strong> {{ $item->alasan }}</p>
            <p class="text-sm text-gray-700"><strong>Dari:</strong> {{ \Carbon\Carbon::parse($item->tanggal_mulai_tidak_tersedia)->translatedFormat('d F Y') }}</p>
            <p class="text-sm text-gray-700"><strong>Sampai:</strong> {{ \Carbon\Carbon::parse($item->tanggal_selesai_tidak_tersedia)->translatedFormat('d F Y') }}</p>
        </div>
    @else
        <span class="text-gray-500 italic text-sm">Belum diatur</span>
    @endif
</td>




                                <td class="p-3 border border-gray-200">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('konsultan.edit', $item->id) }}" class="px-3 py-1 bg-blue-300 hover:bg-blue-400 text-blue-800 rounded">Edit</a>

                           <form action="{{ route('konsultan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-300 hover:bg-red-400 text-red-800 rounded">Hapus</button>
                                    </form>
                                    </div>
                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <a href="{{ route('konsultan.create') }}" class="px-4 py-2 bg-blue-300 hover:bg-blue-400 text-blue-800 rounded">Tambah Data</a>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk konfirmasi delete -->

@endsection
