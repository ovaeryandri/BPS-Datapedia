@extends('user.layout')
@section('content')

<main class="pt-16 md:pt-20 lg:pt-24">
    {{-- Hero Section - Kepala BPS dan Sambutan --}}
    <section class=" px-4 py-12 lg:py-20 theme-section theme-light">
        <div class="flex flex-col container mx-auto lg:flex-row items-start gap-8 lg:gap-12">
            {{-- Foto Kepala --}}
            <div class="w-full lg:w-1/3">
                <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 border-2 border-[#002B6A] rounded-2xl h-80 lg:h-96 overflow-hidden shadow-lg">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center p-6">
                            <div class="w-20 h-20 bg-[#002B6A] rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="font-semibold text-[#002B6A] text-lg speak-target" onmouseenter="speakOnHover(this)">Foto Kepala</p>
                            <p class="font-medium text-gray-600 speak-target" onmouseenter="speakOnHover(this)">BPS Provinsi</p>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Sambutan dan Statistik --}}
            <div class="w-full lg:w-2/3">
                <div class="mb-8">
                    <h1 class="text-2xl lg:text-3xl font-bold mb-4 text-[#002B6A] speak-target" onmouseenter="speakOnHover(this)">
                        Sambutan Kepala BPS Provinsi
                    </h1>
                    <p class="text-gray-700 leading-relaxed text-base lg:text-lg speak-target" onmouseenter="speakOnHover(this)">
                        Selamat datang di portal layanan BPS Provinsi. Kami berkomitmen memberikan pelayanan statistik terbaik untuk mendukung pembangunan daerah. Melalui platform ini, masyarakat dapat mengakses berbagai layanan konsultasi dan informasi statistik dengan mudah dan efisien.
                    </p>
                </div>

                {{-- Statistik Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="text-3xl lg:text-4xl font-bold text-[#002B6A] mb-2 speak-target" onmouseenter="speakOnHover(this)">{{ $today }} <span class="text-primary font-bold">+</span> </div>
                        <p class="text-sm text-gray-600 font-medium speak-target" onmouseenter="speakOnHover(this)">Konsultasi Hari Ini</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="text-3xl lg:text-4xl font-bold text-[#002B6A] mb-2 speak-target" onmouseenter="speakOnHover(this)">{{ $month }}</div>
                        <p class="text-sm text-gray-600 font-medium speak-target" onmouseenter="speakOnHover(this)">Konsultasi Bulan Ini</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="text-3xl lg:text-4xl font-bold text-[#002B6A] mb-2 speak-target" onmouseenter="speakOnHover(this)">{{ $total }}</div>
                        <p class="text-sm text-gray-600 font-medium speak-target" onmouseenter="speakOnHover(this)">Total Konsultasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- Petugas --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- 🔹 PETUGAS HARI INI --}}
    @if($petugas && $petugas->konsultan)
    <div class="mb-10">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">👨‍💼 Petugas Hari Ini</h2>
        <div class="bg-blue-100 border border-blue-300 rounded-2xl shadow-md p-4 sm:p-6 flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-6">
            <img src="{{ Storage::url($petugas->konsultan->gambar) }}" class="h-32 w-32 object-cover rounded-xl border">
            <div class="text-center sm:text-left">
                <h3 class="text-xl font-bold text-black">{{ $petugas->konsultan->nama }}</h3>
                <p class="text-sm text-black">Jabatan : {{ $petugas->konsultan->posisi }}</p>
                <p class="text-sm text-black">Bidang Keahlian : {{ $petugas->konsultan->keahlian }}</p>
                <p class="text-xs text-black mt-1">📞 {{ $petugas->konsultan->no_hp }} | ✉️ {{ $petugas->konsultan->email }}</p>
            </div>
        </div>
    </div>
    @endif

    {{-- 🔹 SEMUA PETUGAS --}}
    <h2 class="text-2xl font-bold text-blue-900 mb-4">👨‍💼 Semua Petugas</h2>

    @php
        $itemsPerPage = 6;
        $totalPages = ceil(count($konsultan) / $itemsPerPage);
    @endphp

    {{-- Desktop (Grid + Pagination) --}}
    <div id="gridPetugas" class="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($konsultan as $index => $item)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden petugas-card" data-index="{{ $index }}">
            <div class="p-6">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 mb-6">
                    <div class="rounded-2xl overflow-hidden flex-shrink-0">
                        <img src="{{ Storage::url($item->gambar) }}" class="h-40 w-40 object-cover rounded-xl">
                    </div>
                    <div class="flex-1 min-w-0 text-center sm:text-left">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $item->nama }}</h3>
                        <p class="text-sm text-primary font-medium mb-1">BPS Provinsi Kepulauan Bangka Belitung</p>
                        <p class="text-xs text-gray-500">Jabatan : {{ $item->posisi }}</p>
                        <p class="text-xs text-gray-500">{{ $item->email }}</p>
                    </div>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="bg-gray-100 text-gray-700 px-3 py-2 rounded-lg text-sm font-medium text-center">
                        Bidang Keahlian : {{ $item->keahlian }}
                    </div>
                </div>
                <button onclick="showKonsultanInfo('{{ addslashes($item->nama) }}','{{ $item->email }}')" class="w-full bg-primary hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors">
                    Info Lebih Lanjut
                </button>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination control --}}
    <div id="paginationControls" class="hidden lg:flex justify-center flex-wrap gap-2 mt-8">
        @for ($i = 1; $i <= $totalPages; $i++)
        <button onclick="paginatePetugas({{ $i }})" class="pagination-btn px-4 py-2 rounded border text-sm font-medium text-blue-800 border-blue-400 hover:bg-blue-100">
            {{ $i }}
        </button>
        @endfor
    </div>

    {{-- Mobile (Carousel) --}}
    <div class="lg:hidden relative overflow-hidden mt-10">
        <button onclick="slidePrev('mobilePetugasWrapper')" class="absolute z-10 left-2 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full shadow-md hover:bg-gray-200">❮</button>

        <div id="mobilePetugasWrapper" class="flex transition-transform duration-700 ease-in-out gap-4">
            @foreach ($konsultan as $item)
            <div class="flex-shrink-0 w-full px-4">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col items-center gap-4 mb-6">
                            <div class="rounded-2xl overflow-hidden">
                                <img src="{{ Storage::url($item->gambar) }}" class="h-40 w-40 object-cover rounded-xl">
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $item->nama }}</h3>
                                <p class="text-sm text-primary font-medium mb-1">BPS Provinsi Kepulauan Bangka Belitung</p>
                                <p class="text-xs text-gray-500">Jabatan : {{ $item->posisi }}</p>
                                <p class="text-xs text-gray-500">{{ $item->email }}</p>
                            </div>
                        </div>
                        <div class="space-y-3 mb-6">
                            <div class="bg-gray-100 text-gray-700 px-3 py-2 rounded-lg text-sm font-medium text-center">
                                Bidang Keahlian : {{ $item->keahlian }}
                            </div>
                        </div>
                        <button onclick="showKonsultanInfo('{{ addslashes($item->nama) }}','{{ $item->email }}')" class="w-full bg-primary hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors">
                            Info Lebih Lanjut
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button onclick="slideNext('mobilePetugasWrapper')" class="absolute z-10 right-2 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full shadow-md hover:bg-gray-200">❯</button>
    </div>

</div>

    {{-- Layanan Kami Section --}}
    <section id="konsultasi" class="bg-[#002B6A] py-16 lg:py-20 theme-section theme-dark">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl lg:text-4xl font-bold mb-12 text-white speak-target" onmouseenter="speakOnHover(this)">
            Layanan Konsultasi
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Kartu 1 - Hubungi Layanan --}}
            <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                <div class="mb-6">
                    <img src="{{ asset('image/konsultasii.png') }}" alt="Hubungi Layanan" class="h-48 w-auto mx-auto object-contain">
                </div>
                <div class="w-full">
                    <a href="{{ route('konsultasi.index') }}" class="block w-full">
                        <button class="w-full bg-[#002B6A] hover:bg-[#003875] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            <span>Konsultasi</span>
                            <img src="{{ asset('image/wa.png') }}" width="24" height="24" alt="WhatsApp" class="flex-shrink-0">
                        </button>
                    </a>
                </div>
            </div>

            {{-- Kartu 2 - Buat Janji Temu --}}
            <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                <div class="mb-6">
                    <img src="{{ asset('image/meet.png') }}" alt="Buat Janji Temu" class="h-48 w-auto mx-auto object-contain">
                </div>
                <div class="w-full">
                    <a href="{{ route('janjitemu.index') }}" class="block w-full">
                        <button class="w-full bg-[#002B6A] hover:bg-[#003875] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            <span>Janji Temu Offline</span>
                            <img src="{{ asset('image/form.png') }}" width="24" height="24" alt="Form" class="flex-shrink-0">
                        </button>
                    </a>
                </div>
            </div>

            {{-- Kartu 3 - Antrian Online --}}
            <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                <div class="mb-6">
                    <img src="{{ asset('image/antrianonline.png') }}" alt="Ambil Antrian Online" class="h-48 w-auto mx-auto object-contain">
                </div>
                <div class="w-full">
                    <a href="{{ route('janjitemu.online') }}" class="block w-full">
                        <button class="w-full bg-[#002B6A] hover:bg-[#003875] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            <span>Janji Temu Online</span>
                            <img src="{{ asset('image/tiket.png') }}" width="24" height="24" alt="Tiket" class="flex-shrink-0">
                        </button>
                    </a>
                </div>
            </div>
        </div>

        @if ($janjiTemu && in_array($janjiTemu->jenis, ['online', 'offline']))
        <div class="mt-10 text-center">
            <a href="{{ route('janjitemu.jadwal') }}" class="inline-block bg-white hover:bg-gray-400 text-primary font-semibold py-3 px-6 rounded-xl transition duration-300">
                Lihat Jadwal Janji Temu
            </a>
        </div>
        @endif
    </div>
</section>


    {{-- Layanan 24 Jam Section --}}
    <section class="bg-gray-50 py-16 lg:py-20 theme-section theme-light">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-[#002B6A] text-3xl lg:text-4xl font-bold mb-12 speak-target" onmouseenter="speakOnHover(this)">
            Layanan 24 Jam
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="layanan-container">
    @foreach ($layanan as $item)
        <div class="layanan-item bg-white rounded-2xl shadow-lg border-2 border-[#002B6A] p-6 flex flex-col justify-between min-h-[460px] hover:shadow-xl transition-all duration-300">
            <div>
                <div class="mb-4 flex justify-center items-center">
                    <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}" class="h-40 w-40 object-cover rounded-xl mx-auto">
                </div>
                <h3 class="text-[#002B6A] text-center font-bold text-xl mb-3 speak-target" onmouseenter="speakOnHover(this)">
                    {{ $item->judul }}
                </h3>
                <p class="text-gray-700 leading-relaxed text-sm mb-6 speak-target" onmouseenter="speakOnHover(this)">
                    {{ $item->deskripsi }}
                </p>
            </div>
            <a href="{{ $item->link }}" target="_blank"
               class="w-full block text-center bg-[#002B6A] hover:bg-[#003875] text-white rounded-full px-6 py-3 font-semibold transition-colors duration-300 speak-target"
               onmouseenter="speakOnHover(this)">
                Kunjungi Website
            </a>
        </div>
    @endforeach
</div>


        <div id="layanan-pagination" class="flex justify-center mt-8 space-x-2"></div>
    </div>
</section>



{{-- === MAKLUMAT DAN JENIS LAYANAN === --}}
<div class="bg-[#002B6A] py-16 overflow-hidden relative">
    <h1 class="text-center text-3xl font-bold mb-10 text-white">
        Maklumat dan Jenis Layanan
    </h1>

    <div class="container mx-auto px-4 md:px-6 lg:px-8 relative overflow-hidden">
        {{-- PANAH KIRI --}}
        <button onclick="slidePrev('maklumatWrapper')" class="absolute z-10 left-2 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full shadow-md hover:bg-gray-200">
            ❮
        </button>

        {{-- WRAPPER KONTEN --}}
        <div id="maklumatWrapper" class="flex transition-transform duration-700 ease-in-out gap-4">
            @foreach ($maklumat as $item)
            <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/3">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ Storage::url($item->file) }}#view=FitH"
                            class="w-full h-[600px] border-none"></img>
                </div>
            </div>
            @endforeach
        </div>

        {{-- PANAH KANAN --}}
        <button onclick="slideNext('maklumatWrapper')" class="absolute z-10 right-2 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full shadow-md hover:bg-gray-200">
            ❯
        </button>
    </div>
</div>

{{-- === STANDAR LAYANAN === --}}
<div class="bg-white py-16 overflow-hidden relative">
    <h1 class="text-center text-3xl font-bold mb-10 text-[#002B6A]">
        Standar Layanan
    </h1>

    <div class="container mx-auto px-4 md:px-6 lg:px-8 relative overflow-hidden">
        {{-- PANAH KIRI --}}
        <button onclick="slidePrev('standarWrapper')" class="absolute z-10 left-2 top-1/2 -translate-y-1/2 bg-[#002B6A] text-white p-2 rounded-full shadow-md hover:bg-blue-800">
            ❮
        </button>

        {{-- WRAPPER KONTEN --}}
        <div id="standarWrapper" class="flex transition-transform duration-700 ease-in-out gap-4">
            @foreach ($standar as $item)
            <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/3">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ Storage::url($item->gambar) }}"
                         class="w-full h-[600px] object-cover rounded-xl">
                </div>
            </div>
            @endforeach
        </div>

        {{-- PANAH KANAN --}}
        <button onclick="slideNext('standarWrapper')" class="absolute z-10 right-2 top-1/2 -translate-y-1/2 bg-[#002B6A] text-white p-2 rounded-full shadow-md hover:bg-blue-800">
            ❯
        </button>
    </div>
</div>


    {{-- FAQ Section --}}
<section class="bg-primary py-16 lg:py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl lg:text-4xl font-bold mb-12 text-white speak-target" onmouseenter="speakOnHover(this)">
            Pertanyaan Yang Sering Ditanyakan
        </h2>

        <div class="container mx-auto space-y-4" id="faq-container">
            @foreach ($faq as $item)
                <div x-data="{ open: false }" class="faq-item bg-white rounded-xl shadow-lg overflow-hidden">
                    <button @click="open = !open" class="w-full p-6 text-left flex justify-between items-center bg-white hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-lg text-gray-800 pr-4 speak-target" onmouseenter="speakOnHover(this)">
                            {{ $item->judul }}
                        </span>
                        <svg :class="{ 'rotate-180': open }" class="w-6 h-6 text-gray-500 transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6">
                        <div class="text-gray-700 leading-relaxed speak-target" onmouseenter="speakOnHover(this)">
                            {{ $item->deskripsi }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="faq-pagination" class="flex justify-center mt-8 space-x-2"></div>
    </div>
</section>


<!-- resources/views/chatbot.blade.php -->


    <!-- Widget Aksesibilitas -->
<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-50 flex gap-4 items-end flex-col md:flex-row">
    <!-- Tombol Chatbot -->
    <div>
        <button
            id="chatbot-toggle"
            class="bg-gradient-to-br from-[#ffda6a] to-[#ffc107] rounded-full w-16 h-16 md:w-20 md:h-20 flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 relative group"
            style="box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 md:w-12 md:h-12 text-white group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M4 4h16v12H5.17L4 17.17V4zm16-2H4a2 2 0 00-2 2v18l4-4h14a2 2 0 002-2V4a2 2 0 00-2-2z"/>
            </svg>
            <div class="absolute bottom-full right-0 mb-2 px-3 py-1 bg-gray-800 text-white text-xs md:text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
                Buka Chatbot
                <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
            </div>
        </button>
    </div>

    <!-- Tombol Aksesibilitas Utama -->
    <button
        @click="open = !open"
        class="bg-gradient-to-br from-[#a3c2f5] to-[#004B9A] rounded-full w-16 h-16 md:w-20 md:h-20 flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 relative group"
        style="box-shadow: 0 8px 32px rgba(0, 43, 106, 0.4);"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 md:w-12 md:h-12 text-white group-hover:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2a3 3 0 0 1 3 3 3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3M21 9v2a2 2 0 0 1-2 2h-1l-1.5 6h-2l1.3-5.4c-.4-.3-.9-.6-1.3-.6H9.5c-.4 0-.9.3-1.3.6L9.5 19h-2L6 13H5a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <div class="absolute bottom-full right-0 mb-2 px-3 py-1 bg-gray-800 text-white text-xs md:text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
            Aksesibilitas
            <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
        </div>
    </button>

    <!-- Tombol Tambahan -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
        class="flex flex-col items-end space-y-3 mb-4"
    >
        <!-- Tombol-tombol aksesibilitas (tetap pakai yang kamu punya sebelumnya) -->
        <!-- Perbesar Text, Perkecil Text, Reset Ukuran Text, dsb -->
        <!-- ⬇️ PASTE tombol-tombol aksesibilitas kamu di sini ⬇️ -->
        <!-- Misal: -->
        <button onclick="adjustFontSize('increase')" class="px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Perbesar Teks</button>
        <button onclick="adjustFontSize('decrease')" class="px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Perkecil Teks</button>
        <button onclick="adjustFontSize('reset')" class="px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Reset Teks</button>
        <button onclick="adjustFontSize('cursor-medium')" class="hidden lg:flex px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Cursor Sedang</button>
        <button onclick="adjustFontSize('cursor-large')" class="hidden lg:flex px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Cursor Besar</button>
        <button onclick="adjustFontSize('cursorSize')" class="hidden lg:flex px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Reset Cursor</button>
        <!-- ...dan lainnya -->
    </div>

    <!-- Iframe Chatbot -->
    <div id="chatbot-container"
        class="rounded-xl overflow-hidden shadow-xl border"
        style="display: none; position: fixed; bottom: 120px; right: 20px; width: 90vw; max-width: 400px; height: 70vh; z-index: 9999;">
        <iframe src="http://localhost:8501" frameborder="0" style="width: 100%; height: 100%;"></iframe>
    </div>
</div>


    {{-- Survey Section --}}
    <section class="bg-gray-50 py-16 lg:py-20 theme-section theme-light">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Kolom Teks --}}
                <div class="order-2 lg:order-1">
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#002B6A] mb-6 speak-target" onmouseenter="speakOnHover(this)">
                        Survey Kepuasan Masyarakat
                    </h2>
                    <p class="text-gray-700 text-lg mb-4 leading-relaxed speak-target" onmouseenter="speakOnHover(this)">
                        Bantu kami untuk terus memberikan pelayanan terbaik kepada masyarakat.
                    </p>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed speak-target" onmouseenter="speakOnHover(this)">
                        <span class="font-semibold text-[#002B6A]">Berikan penilaianmu</span> terhadap layanan kami melalui <span class="font-semibold text-[#002B6A]">Survei Kepuasan Masyarakat</span> yang dapat diakses melalui tombol di bawah ini.
                    </p>
                    <button class="bg-[#002B6A] hover:bg-[#003875] text-white font-semibold text-lg px-8 py-4 rounded-xl transition-all duration-300 hover:transform hover:scale-105 shadow-lg speak-target" onmouseenter="speakOnHover(this)">
                        Isi Survei Kepuasan Masyarakat
                    </button>
                </div>

                {{-- Kolom Ilustrasi --}}
                <div class="order-1 lg:order-2 flex justify-center">
                    <img src="{{ asset('image/survey.png') }}" alt="Ilustrasi Survey" class="w-full max-w-md lg:max-w-lg object-contain">
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Custom CSS untuk animasi dan responsivitas tambahan --}}
<style>
    @media (max-width: 640px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    .layanan-item:hover {
        transform: translateY(-4px);
    }

    .faq-item:hover {
        box-shadow: 0 10px 25px rgba(0, 43, 106, 0.1);
    }

    /* Smooth scrolling untuk anchor links */
    html {
        scroll-behavior: smooth;
    }

    /* Loading animation untuk iframe */
    iframe {
        transition: opacity 0.3s ease;
    }

    /* Responsive text adjustments */
    @media (max-width: 768px) {
        h1, h2 {
            line-height: 1.2;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .text-4xl {
            font-size: 2.25rem;
        }
    }
</style>

{{-- JavaScript untuk pagination dan interaktivitas --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Pagination untuk layanan 24 jam
    const layananItems = document.querySelectorAll('.layanan-item');
    const layananPerPage = 6;
    let currentLayananPage = 1;

    function showLayananPage(page) {
        const startIndex = (page - 1) * layananPerPage;
        const endIndex = startIndex + layananPerPage;

        layananItems.forEach((item, index) => {
            if (index >= startIndex && index < endIndex) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function createLayananPagination() {
        const totalPages = Math.ceil(layananItems.length / layananPerPage);
        const paginationContainer = document.getElementById('layanan-pagination');

        if (totalPages <= 1) return;

        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.className = `px-4 py-2 mx-1 rounded-lg font-medium transition-colors duration-200 ${
                i === currentLayananPage
                    ? 'bg-[#002B6A] text-white'
                    : 'bg-white text-[#002B6A] border border-[#002B6A] hover:bg-[#002B6A] hover:text-white'
            }`;

            button.addEventListener('click', () => {
                currentLayananPage = i;
                showLayananPage(currentLayananPage);
                createLayananPagination();
            });

            paginationContainer.appendChild(button);
        }
    }

    // Pagination untuk FAQ
    const faqItems = document.querySelectorAll('.faq-item');
    const faqPerPage = 5;
    let currentFaqPage = 1;

    function showFaqPage(page) {
        const startIndex = (page - 1) * faqPerPage;
        const endIndex = startIndex + faqPerPage;

        faqItems.forEach((item, index) => {
            if (index >= startIndex && index < endIndex) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function createFaqPagination() {
        const totalPages = Math.ceil(faqItems.length / faqPerPage);
        const paginationContainer = document.getElementById('faq-pagination');

        if (totalPages <= 1) return;

        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.className = `px-4 py-2 mx-1 rounded-lg font-medium transition-colors duration-200 ${
                i === currentFaqPage
                    ? 'bg-white text-[#002B6A]'
                    : 'bg-transparent text-white border border-white hover:bg-white hover:text-[#002B6A]'
            }`;

            button.addEventListener('click', () => {
                currentFaqPage = i;
                showFaqPage(currentFaqPage);
                createFaqPagination();
            });

            paginationContainer.appendChild(button);
        }
    }

    // Initialize pagination
    if (layananItems.length > 0) {
        showLayananPage(1);
        createLayananPagination();
    }

    if (faqItems.length > 0) {
        showFaqPage(1);
        createFaqPagination();
    }
});
</script>

<script>
        const toggleBtn = document.getElementById('chatbot-toggle');
        const chatbotBox = document.getElementById('chatbot-container');

        toggleBtn.addEventListener('click', () => {
            chatbotBox.style.display = chatbotBox.style.display === 'none' ? 'block' : 'none';
        });
    </script>

@endsection
