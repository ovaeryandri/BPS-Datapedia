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

    {{-- Layanan Kami Section --}}
    <section class="bg-[#002B6A] py-16 lg:py-20 theme-section theme-dark">
        <div class="container mx-auto px-4">
            <h2 class="text-center text-3xl lg:text-4xl font-bold mb-12 text-white speak-target" onmouseenter="speakOnHover(this)">
                Layanan Kami
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Kartu 1 - Hubungi Layanan --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                    <div class="mb-6">
                        <img src="{{ asset('image/konsultasii.png') }}" alt="Hubungi Layanan" class="h-48 w-auto mx-auto object-contain">
                    </div>
                    <form method="POST" action="{{ route('konsultasi.klik') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full bg-[#002B6A] hover:bg-[#003875] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            <span>Hubungi Layanan</span>
                            <img src="{{ asset('image/wa.png') }}" width="24" height="24" alt="WhatsApp" class="flex-shrink-0">
                        </button>
                    </form>
                </div>

                {{-- Kartu 2 - Buat Janji Temu --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                    <div class="mb-6">
                        <img src="{{ asset('image/meet.png') }}" alt="Buat Janji Temu" class="h-48 w-auto mx-auto object-contain">
                    </div>
                    <a href="{{ route('janjitemu.index') }}" class="w-full">
                        <button class="w-full bg-[#002B6A] hover:bg-[#003875] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            <span>Buat Janji Temu</span>
                            <img src="{{ asset('image/form.png') }}" width="24" height="24" alt="Form" class="flex-shrink-0">
                        </button>
                    </a>
                </div>

                {{-- Kartu 3 - Antrian Online --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center justify-between hover:transform hover:scale-105 transition-all duration-300">
                    <div class="mb-6">
                        <img src="{{ asset('image/antrianonline.png') }}" alt="Ambil Antrian Online" class="h-48 w-auto mx-auto object-contain">
                    </div>
                    <a href="https://webapps.bps.go.id/babel/antrianbabel/frontend/web/index.php?r=site/index#services" target="_blank" class="w-full">
                        <button class="w-full bg-[#002B6A] hover:bg-[#003875] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            <span>Ambil Antrian Online</span>
                            <img src="{{ asset('image/tiket.png') }}" width="24" height="24" alt="Tiket" class="flex-shrink-0">
                        </button>
                    </a>
                </div>
            </div>
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
                    <div class="layanan-item bg-white rounded-2xl shadow-lg border-2 border-[#002B6A] p-6 flex flex-col hover:shadow-xl transition-all duration-300">
                        <div class="mb-4">
                            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}" class="h-56 w-full object-cover rounded-xl">
                        </div>
                        <h3 class="text-[#002B6A] font-bold text-xl mb-3 speak-target" onmouseenter="speakOnHover(this)">{{ $item->judul }}</h3>
                        <p class="text-gray-700 flex-grow mb-6 leading-relaxed speak-target" onmouseenter="speakOnHover(this)">{{ $item->deskripsi }}</p>
                        <a href="{{ $item->link }}" target="_blank" class="bg-[#002B6A] hover:bg-[#003875] text-white text-center rounded-full px-6 py-3 font-semibold transition-colors duration-300 speak-target" onmouseenter="speakOnHover(this)">
                            Kunjungi Website
                        </a>
                    </div>
                @endforeach
            </div>
            <div id="layanan-pagination" class="flex justify-center mt-8 space-x-2"></div>
        </div>
    </section>

    {{-- Maklumat dan Jenis Layanan Section --}}
    <div class="bg-[#002B6A] py-30 theme-section theme-dark">

          <h1 class="text-center text-3xl font-bold mb-30 text-white speak-target" onmouseenter="speakOnHover(this)">
              Maklumat dan Jenis Layanan
          </h1>


          <div class="center mx-auto container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 ">
              @foreach ($maklumat as $item)
              <div class="shadow-lg rounded-xl overflow-hidden mx-4">
                  <iframe src="{{ Storage::url($item->file) }}" width="100%" height="600px"></iframe>
                </div>

                @endforeach
            </div>
    </div>


    {{-- Standar Pelayanan Section --}}
    <div class="bg-white py-30 theme-section theme-light">

        <h1 class="text-center text-3xl font-bold mb-30 text-[#002B6A] speak-target" onmouseenter="speakOnHover(this)">
            Standar Layanan
        </h1>

        <div class="center mx-auto container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            @foreach ($standar as $item)

            <div class="shadow-lg rounded-xl overflow-hidden mx-4">
                <img src="{{ Storage::url($item->gambar) }}" class="w-full h-[600px] object-fill rounded-xl">
            </div>
            @endforeach


        </div>
    </div>

    {{-- FAQ Section --}}
<section class="bg-[#002B6A] py-16 lg:py-20 theme-section theme-dark">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl lg:text-4xl font-bold mb-12 text-white speak-target" onmouseenter="speakOnHover(this)">
            Frequently Asked Questions
        </h2>

        <div class="max-w-4xl mx-auto space-y-4" id="faq-container">
            @foreach ($faq as $item)
                <div x-data="{ open: false }" class="faq-item bg-white rounded-xl shadow-lg overflow-hidden">
                    <button @click="open = !open" class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors duration-200">
                        <span class="font-semibold text-lg text-gray-800 pr-4 speak-target" onmouseenter="speakOnHover(this)">{{ $item->judul }}</span>
                        <svg :class="{ 'rotate-180': open }" class="w-6 h-6 text-[#002B6A] transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="px-6 pb-6">
                        <div
                            class="text-gray-700 leading-relaxed speak-target" onmouseenter="speakOnHover(this)"
                        >
                            {{ $item->deskripsi }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="faq-pagination" class="flex justify-center mt-8 space-x-2"></div>
    </div>
</section>

    <!-- Widget Aksesibilitas -->
<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-50 ">
    <!-- Tombol Utama -->
    <button
        @click="open = !open"
        class="bg-gradient-to-br from-[#a3c2f5] to-[#004B9A] rounded-full w-24 h-24 flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 relative group"
        style="box-shadow: 0 8px 32px rgba(0, 43, 106, 0.4);"
    >
        <!-- Icon Aksesibilitas -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white group-hover:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2a3 3 0 0 1 3 3 3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3M21 9v2a2 2 0 0 1-2 2h-1l-1.5 6h-2l1.3-5.4c-.4-.3-.9-.6-1.3-.6H9.5c-.4 0-.9.3-1.3.6L9.5 19h-2L6 13H5a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>

        <!-- Tooltip -->
        <div class="absolute bottom-full right-0 mb-2 px-3 py-1 bg-gray-800 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
            Aksesibilitas
            <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
        </div>
    </button>

    <!-- Tombol Tambahan -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95 translate-y-4" x-transition:enter-end="opacity-100 transform scale-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100 translate-y-0" x-transition:leave-end="opacity-0 transform scale-95 translate-y-4" class="flex flex-col items-end space-y-3 mb-4 ">

        <button onclick="adjustFontSize('increase')" class="group flex items-center space-x-3 px-4 py-3 theme-section theme-dark bg-primary text-sm text-[#002B6A] font-medium rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border border-gray-100" style="backdrop-filter: blur(10px); background: #002B6A">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
            </svg>
            <span>Perbesar Text</span>
        </button>

        <button onclick="adjustFontSize('decrease')" class="group flex items-center space-x-3 px-4 py-3 bg-primary text-sm text-primary font-medium rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border border-gray-100" style="backdrop-filter: blur(10px); background: #002B6A">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7" />
            </svg>
            <span>Perkecil Text</span>
        </button>

        <button onclick="adjustFontSize('reset')" class="group flex items-center space-x-3 px-4 py-3 bg-primary text-sm text-primary font-medium rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border border-gray-100" style="backdrop-filter: blur(10px); background: #002B6A">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white group-hover:rotate-180 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Reset Ukuran Text</span>
        </button>

        <button onclick="setContrast('light')" class="group flex items-center space-x-3 px-4 py-3 bg-primary text-sm text-primary font-medium rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border border-gray-100" style="backdrop-filter: blur(10px); background: #002B6A">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white group-hover:rotate-180 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Kontras Warna</span>
        </button>

        <button onclick="setContrast('dark')" class="group flex items-center space-x-3 px-4 py-3 bg-primary text-sm text-primary font-medium rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border border-gray-100" style="backdrop-filter: blur(10px); background: #002B6A">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white group-hover:rotate-180 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Kontras Gelap</span>
        </button>

        <button onclick="setContrast('default')" class="group flex items-center space-x-3 px-4 py-3 bg-primary text-sm text-primary font-medium rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border border-gray-100" style="backdrop-filter: blur(10px); background: #002B6A">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white group-hover:rotate-180 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Reset Warna</span>
        </button>


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

@endsection
