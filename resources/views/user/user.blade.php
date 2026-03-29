@extends('user.layout')
@section('content')

<main class="">
    {{-- Layanan Kami Section --}}
    <section id="konsultasi" class="bg-white py-16 lg:py-20 theme-section theme-dark" >
        <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl lg:text-4xl font-bold mb-12 text-[#002B6A] speak-target" onmouseenter="speakOnHover(this)">
            Layanan Konsultasi
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Kartu 1 - Hubungi Layanan --}}
            <div class="bg-[#002B6A] rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                <div class="mb-6">
                    <img src="{{ asset('image/konsultasii.png') }}" alt="Hubungi Layanan" class="h-48 w-auto mx-auto object-contain">
                </div>
                <div class="w-full">
                   @if(session('login_user') && session('user_id'))
                        <a href="{{ route('konsultasi.index') }}" class="block w-full">
                            <button class="w-full bg-white hover:bg-gray-300 text-[#002B6A] font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                                <span>Konsultasi Whatsapp</span>
                                <img src="{{ asset('image/wa.png') }}" width="24" height="24" alt="WhatsApp" class="flex-shrink-0">
                            </button>
                        </a>
                    @else
                        <button type="button" onclick="showLoginAlert()" class="nav-link w-full  bg-white hover:bg-gray-300 text-[#002B6A] font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target">
                            <span>Konsultasi Whatsapp</span>
                            <img src="{{ asset('image/wa.png') }}" width="24" height="24" alt="WhatsApp" class="flex-shrink-0">
                        </button>
                    @endif
                </div>
            </div>
            889900998767

            {{-- Kartu 2 - Buat Janji Temu --}}
            <div class="bg-[#002B6A] rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                <div class="mb-6">
                    <img src="{{ asset('image/meet.png') }}" alt="Buat Janji Temu" class="h-48 w-auto mx-auto object-contain">
                </div>
                <div class="w-full">
                   @if(session('login_user') && session('user_id'))
                        <a href="{{ route('janjitemu.online') }}" class="block w-full">
                            <button class="w-full bg-white hover:bg-gray-300 text-[#002B6A] font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                                <span>Konsultasi Online</span>
                                <img src="{{ asset('image/form.png') }}" width="32" height="32" alt="Form" class="flex-shrink-0">
                            </button>
                        </a>
                    @else
                        <button type="button" onclick="showLoginAlert()" class="nav-link w-full  bg-white hover:bg-gray-300 text-[#002B6A] font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target">
                            <span>Konsultasi Online</span>
                            <img src="{{ asset('image/form.png') }}" width="32" height="32" alt="Form" class="flex-shrink-0">
                        </button>
                    @endif
                </div>
            </div>

            {{-- Kartu 3 - Antrian Online --}}
            <div class="bg-[#002B6A] rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                <div class="mb-6">
                    <img src="{{ asset('image/antrianonline.png') }}" alt="Ambil Antrian Online" class="h-48 w-auto mx-auto object-contain">
                </div>
                <div class="w-full">

                        <a href="https://webapps.bps.go.id/babel/antrianbabel/frontend/web/index.php?r=site/index#services" class="block w-full">
                            <button class="w-full bg-white hover:bg-gray-300 text-[#002B6A] font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target nav-link" onmouseenter="speakOnHover(this)">
                                <span>Ambil Antrian Online</span>
                                <img src="{{ asset('image/tiket.png') }}" width="24" height="24" alt="Tiket" class="flex-shrink-0">
                            </button>
                        </a>


                </div>
            </div>
        </div>

        @if ($janjiTemu && in_array($janjiTemu->jenis, ['online', 'offline']))
            <div class="mt-10 text-center">
                <a href="{{ route('janjitemu.jadwal') }}" class="inline-block bg-[#002B6A] hover:bg-blue-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-300">
                    Lihat Jadwal Janji Temu
                </a>
            </div>
        @endif

<div class="mt-10" data-aos="fade-up" data-aos-duration="1500">
    <div class="chart-card">
        {{-- Header dengan Judul dan Filter --}}
        <div class="chart-header">
            <div class="chart-title">
                <div class="title-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <span>Jumlah Konsultasi Bulanan</span>
            </div>

            {{-- Form Filter Tahun --}}
            <div class="year-filter">
                <label for="tahun" class="filter-label">Filter Tahun</label>
                <form action="" method="GET" style="position: relative;">
                    <select name="tahun" id="tahun" class="year-select" onchange="showLoadingAndSubmit(this.form)">
                        @forelse ($availableYears as $year)
                            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @empty
                            <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                        @endforelse
                    </select>
                    <i class="fas fa-chevron-down select-arrow"></i>
                </form>
            </div>
        </div>

        {{-- Area Chart --}}
        <div class="chart-container">
            <div class="chart-wrapper">
                <div id="loadingSpinner" class="loading-spinner" style="display: none;">
                    <div class="spinner"></div>
                    <span style="color: #718096;">Memuat data...</span>
                </div>
                <canvas id="grafikPieKonsultasi"></canvas>
            </div>
        </div>

        {{-- Statistics Summary --}}
        <div class="stats-summary" id="statsSummary">
            <div class="stat-card">
                <div class="stat-value" id="totalKonsultasi">--</div>
                <div class="stat-label">Total Konsultasi</div>
            </div>

            <div class="stat-card">
                <div class="stat-value" id="bulanTertinggi">--</div>
                <div class="stat-label">Bulan Tertinggi</div>
            </div>
        </div>
    </div>
</div>


        </div>
    </section>

{{-- Petugas --}}
<div class="min-h-screen bg-[#002B6A]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" data-aos="zoom-in" data-aos-duration="2000">

        {{-- 🔹 PETUGAS HARI INI - ENLARGED --}}
        @if($petugas && $petugas->isNotEmpty())
    <div class="mb-16">
        <h2 class="text-4xl font-bold text-white mb-8 text-center">👨‍💼 Petugas Konsultasi Hari Ini</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
            @foreach($petugas as $item)
                @if($item->konsultan)
                    <div class="glass-effect rounded-3xl shadow-2xl p-8 card-hover">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="relative">
                                <img src="{{ Storage::url($item->konsultan->image) }}"
                                        alt="Petugas Hari Ini"
                                        class="w-full h-full object-contain">


                                <div class="absolute -top-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-2 border-white"></div>
                            </div>
                            {{-- <div class="text-center lg:text-left text-white flex-1">
                                <h3 class="text-3xl font-bold mb-3">{{ $item->konsultan->nama }}</h3>
                                <p class="text-xl mb-2 opacity-90">Jabatan: {{ $item->konsultan->posisi }}</p>
                                <p class="text-lg mb-4 opacity-90">BPS Provinsi Kepulauan Bangka Belitung</p>
                                <div class="flex flex-wrap gap-3 justify-center lg:justify-start mb-6">
                                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium">{{ $item->konsultan->keahlian }}</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif

        {{-- 🔹 SEMUA PETUGAS - CAROUSEL --}}
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">👥 Semua Petugas Konsultasi</h2>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between items-center mb-6">
                <button id="prevBtn" class="glass-effect text-white p-3 rounded-full hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button id="nextBtn" class="glass-effect text-white p-3 rounded-full hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            {{-- Carousel Container - 2 Rows Layout --}}
            <div class="carousel-container overflow-hidden">
                <div id="carouselWrapper" class="flex transition-transform duration-500 ease-in-out">
                    @php
                        $chunkedKonsultan = $konsultan->chunk(6); // Group by 6 items per slide
                    @endphp

                    @foreach ($chunkedKonsultan as $slideIndex => $slideItems)
                    <div class="carousel-slide flex-shrink-0 w-full px-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            {{-- First Row (Top 3) --}}
                            @foreach ($slideItems->take(3) as $item)
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
                                <div class="p-4">
                                    <div class="flex flex-col items-center gap-3 mb-4">
                                        <div class="relative">
                                            <img src="{{ Storage::url($item->gambar) }}"
                                                 class="h-40 w-40 object-cover rounded-xl border-2 border-gray-200">
                                            <div class="absolute -top-1 -right-1 bg-green-500 w-4 h-4 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-base font-bold text-gray-900 mb-1">{{ $item->nama }}</h3>
                                            <p class="text-xs text-blue-600 font-medium mb-1">BPS Provinsi Kepulauan Bangka Belitung</p>
                                            <p class="text-xs text-gray-500 mb-1">{{ $item->posisi }}</p>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="bg-[#002B6A] text-white px-3 py-3 rounded-lg text-xs font-medium text-center">
                                           Bidang Keahlian : {{ $item->keahlian }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                            {{-- Second Row (Bottom 3) --}}
                            @foreach ($slideItems->slice(3, 3) as $item)
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
                                <div class="p-4">
                                    <div class="flex flex-col items-center gap-3 mb-4">
                                        <div class="relative">
                                            <img src="{{ Storage::url($item->gambar) }}"
                                                 class="h-40 w-40 object-cover rounded-xl border-2 border-gray-200">
                                            <div class="absolute -top-1 -right-1 bg-green-500 w-4 h-4 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-base font-bold text-gray-900 mb-1">{{ $item->nama }}</h3>
                                            <p class="text-xs text-blue-600 font-medium mb-1">BPS Provinsi Kepulauan Bangka Belitung</p>
                                            <p class="text-xs text-gray-500 mb-1">{{ $item->posisi }}</p>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="bg-[#002B6A] text-white px-3 py-3 rounded-lg text-xs font-medium text-center">
                                           Bidang keahlian : {{ $item->keahlian }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    {{-- Duplicate first slide for seamless loop --}}
                    @if($chunkedKonsultan->count() > 0)
                    @php $firstSlide = $chunkedKonsultan->first(); @endphp
                    <div class="carousel-slide flex-shrink-0 w-full px-2 duplicate-slide">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            {{-- First Row (Top 3) --}}
                            @foreach ($firstSlide->take(3) as $item)
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
                                <div class="p-4">
                                    <div class="flex flex-col items-center gap-3 mb-4">
                                        <div class="relative">
                                            <img src="{{ Storage::url($item->gambar) }}"
                                                 class="h-20 w-20 object-cover rounded-xl border-2 border-gray-200">
                                            <div class="absolute -top-1 -right-1 bg-green-500 w-4 h-4 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-base font-bold text-gray-900 mb-1">{{ $item->nama }}</h3>
                                            <p class="text-xs text-blue-600 font-medium mb-1">BPS Provinsi Kepulauan Bangka Belitung</p>
                                            <p class="text-xs text-gray-500 mb-1">{{ $item->posisi }}</p>
                                            <p class="text-xs text-gray-500">{{ $item->email }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="bg-gray-100 text-gray-700 px-2 py-1 rounded-lg text-xs font-medium text-center">
                                            {{ $item->keahlian }}
                                        </div>
                                    </div>
                                    <button onclick="showKonsultanInfo('{{ addslashes($item->nama) }}','{{ $item->email }}')"
                                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded-lg transition-colors text-xs">
                                        Buat Reservasi
                                    </button>
                                </div>
                            </div>
                            @endforeach

                            {{-- Second Row (Bottom 3) --}}
                            @foreach ($firstSlide->slice(3, 3) as $item)
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
                                <div class="p-4">
                                    <div class="flex flex-col items-center gap-3 mb-4">
                                        <div class="relative">
                                            <img src="{{ Storage::url($item->gambar) }}"
                                                 class="h-20 w-20 object-cover rounded-xl border-2 border-gray-200">
                                            <div class="absolute -top-1 -right-1 bg-green-500 w-4 h-4 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-base font-bold text-gray-900 mb-1">{{ $item->nama }}</h3>
                                            <p class="text-xs text-blue-600 font-medium mb-1">BPS Provinsi Kepulauan Bangka Belitung</p>
                                            <p class="text-xs text-gray-500 mb-1">{{ $item->posisi }}</p>
                                            <p class="text-xs text-gray-500">{{ $item->email }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="bg-gray-100 text-gray-700 px-2 py-1 rounded-lg text-xs font-medium text-center">
                                            {{ $item->keahlian }}
                                        </div>
                                    </div>
                                    <button onclick="showKonsultanInfo('{{ addslashes($item->nama) }}','{{ $item->email }}')"
                                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded-lg transition-colors text-xs">
                                        Buat Reservasi
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Navigation Dots --}}
            <div id="dotsContainer" class="flex justify-center gap-3 mt-8">
                {{-- Dots will be generated by JavaScript --}}
            </div>
        </div>

    </div>
</div>


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

    <div id="maklumatCarousel" class="container mx-auto px-4 md:px-6 lg:px-8 relative">
        <button id="maklumat-prev" data-action="prev" class="absolute z-10 left-2 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full shadow-md hover:bg-gray-200">
            ❮
        </button>

        <div class="overflow-hidden">
            <div id="maklumatWrapper" class="carousel-wrapper flex transition-transform duration-700 ease-in-out gap-4">
                @foreach ($maklumat as $item)
                    <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <img src="{{ Storage::url($item->file) }}#view=FitH"
                                 class="w-full h-auto object-cover border-none" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button id="maklumat-next" data-action="next" class="absolute z-10 right-2 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full shadow-md hover:bg-gray-200">
            ❯
        </button>
    </div>
</div>


{{-- === STANDAR LAYANAN === --}}
<div class="bg-white py-16 overflow-hidden relative">
    <h1 class="text-center text-3xl font-bold mb-10 text-[#002B6A]">
        Standar Layanan
    </h1>

    <div id="standarLayananCarousel" class="container mx-auto px-4 md:px-6 lg:px-8 relative">
        <button data-action="prev" class="absolute z-10 left-2 top-1/2 -translate-y-1/2 bg-[#002B6A] text-white p-2 rounded-full shadow-md hover:bg-blue-800">
            ❮
        </button>

        <div class="overflow-hidden">
            <div class="carousel-wrapper flex transition-transform duration-700 ease-in-out gap-4">
                @if(isset($standar) && count($standar) > 0)
                    @foreach ($standar as $item)
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <img src="{{ Storage::url($item->gambar) }}" class="w-full h-auto object-cover" />
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center w-full">Tidak ada data standar layanan.</p>
                @endif
            </div>
        </div>

        <button data-action="next" class="absolute z-10 right-2 top-1/2 -translate-y-1/2 bg-[#002B6A] text-white p-2 rounded-full shadow-md hover:bg-blue-800">
            ❯
        </button>
    </div>
</div>

    {{-- FAQ Section --}}
<section class="bg-[#002B6A] py-16 lg:py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl lg:text-4xl font-bold mb-12 text-white speak-target" onmouseenter="speakOnHover(this)">
            Pertanyaan Yang Sering Ditanyakan
        </h2>

        <div class="container mx-auto space-y-4" id="faq-container">
            @foreach ($faq as $item)
                <div x-data="{ open: false }" class="faq-item bg-white rounded-xl shadow-lg overflow-hidden">
                    <button @click="open = !open" class="w-full p-6 text-left flex justify-between items-center bg-white hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-lg text-gray-800 pr-4 speak-target" onmouseenter="speakOnHover(this)">
                            {!! $item->judul !!}
                        </span>
                        <svg :class="{ 'rotate-180': open }" class="w-6 h-6 text-gray-500 transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6">
                        <div class="prose prose-gray max-w-none prose-ol:list-decimal
                            prose-ul:list-disc
                            prose-li:ml-6">
                            {!! $item->deskripsi !!}
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
    <div>
        <button
            id="chatbot-toggle"
            class="bg-gradient-to-br from-[#ffda6a] to-[#ffc107] rounded-full w-16 h-16 md:w-20 md:h-20 flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 relative group"
            style="box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 md:w-12 md:h-12 text-white group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 64 64" fill="currentColor">
                <g>
                    <rect x="20" y="16" width="24" height="32" rx="4" ry="4" fill="currentColor"/>
                    <circle cx="26" cy="28" r="4" fill="#ffffff"/>
                    <circle cx="38" cy="28" r="4" fill="#ffffff"/>
                    <rect x="28" y="36" width="8" height="4" rx="2" fill="#ffffff"/>
                    <rect x="30" y="8" width="4" height="8" rx="1" fill="currentColor"/>
                    <circle cx="32" cy="6" r="2" fill="currentColor"/>
                    <rect x="14" y="20" width="6" height="20" rx="2" fill="currentColor"/>
                    <rect x="44" y="20" width="6" height="20" rx="2" fill="currentColor"/>
                </g>
            </svg>
            <div class="absolute bottom-full right-0 mb-2 px-3 py-1 bg-gray-800 text-white text-xs md:text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
                Buka Chatbot
                <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
            </div>
        </button>
    </div>

    {{-- <button
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
    </button> --}}

    {{-- <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
        class="flex flex-col items-end space-y-3 mb-4"
    >
        <button onclick="adjustFontSize('increase')" class="px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Perbesar Teks</button>
        <button onclick="adjustFontSize('decrease')" class="px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Perkecil Teks</button>
        <button onclick="adjustFontSize('reset')" class="px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Reset Teks</button>
        <button onclick="setCursorSize('medium')" class="hidden lg:flex px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Cursor Sedang</button>
        <button onclick="setCursorSize('large')" class="hidden lg:flex px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Cursor Besar</button>
        <button onclick="resetCursor('cursorSize')" class="hidden lg:flex px-4 py-3 rounded-xl text-sm bg-[#002B6A] text-white shadow hover:scale-105 transition">Reset Cursor</button>
    </div> --}}

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

    <script src="https://cdn.jsdelivr.net/npm/sienna-accessibility@latest/dist/sienna-accessibility.umd.js" defer></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


@endsection
