@extends('admin.layout')
@section('content')

<div class="w-full p-6 bg-gray-100">
    <div class="w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-400 p-4">
            <h2 class="text-xl font-bold text-blue-800">Data Petugas Hari Ini</h2>
        </div>

        <div class="p-6">
                <a href="{{ route('petugas.create') }}" class="px-4 py-2 bg-blue-300 hover:bg-blue-400 text-blue-800 rounded">Tambah Data</a>
        </div>

            <div class="p-6 link-container">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-300">
                            <th class="p-3 text-center text-blue-800 border border-blue-400">No</th>
                            <th class="p-3 text-center text-blue-800 border border-blue-400">Petugas Hari Ini</th>
                            <th class="p-3 text-center text-blue-800 border border-blue-400">Tanggal</th>
                            <th class="p-3 text-center text-blue-800 border border-blue-400">Aksi</th>

                        </tr>
                    </thead>

                    <tbody id="layanan-body">
                        @foreach ($petugas as $index => $item)
                        <tr class="layanan-item-row hover:bg-gray-50 ">
                            <td class="p-3 border border-gray-200 text-center">{{ $index + 1 }}</td>


                            <td class="p-3 border border-gray-200 ">
                                <div class="w-40 line-clamp-2 text-center">{{ $item->konsultan->nama }}</div>
                            </td>
                            <td class="p-3 border border-gray-200 ">
                            <div class="w-64 line-clamp-2 overflow text-center-hidden text-ellipsis">{{ $item->tanggal }}</div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination controls -->
                <div id="pagination-controls" class="flex justify-center mt-6 space-x-2"></div>
            </div>
    </div>
</div>
@endsection
