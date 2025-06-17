<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATAPEDIA BPS </title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #002B6A 0%, #0D4A8F 50%, #1E5BA8 100%);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        /* .bounce-gentle {
            animation: bounceGentle 2s infinite;
        } */

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
/*
        @keyframes bounceGentle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        } */

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(90deg, #a3c2f5, #ffffff);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #001a40 0%, #002855 100%);
            box-shadow: 0 4px 15px rgba(0, 26, 64, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .btn-secondary:hover::before {
            left: 100%;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 26, 64, 0.4);
            background: linear-gradient(135deg, #00142d 0%, #001e3d 100%);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 20%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 30%;
            left: 80%;
            animation-delay: 4s;
        }

/*

        .service-image {
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.15));
            transition: transform 0.3s ease;
        } */

        /* .service-image:hover {
            transform: scale(1.05);
        } */

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logout-btn {
            color: rgb(255, 60, 60);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 6px;
        }

        .logout-btn:hover {
            color: #f63b3b;
            background: rgba(250, 96, 96, 0.1);
            transform: translateY(-1px);
        }

        .login-btn {
            color: #60a5fa;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 6px;
        }

        .login-btn:hover {
            color: #3b82f6;
            background: rgba(96, 165, 250, 0.1);
            transform: translateY(-1px);
        }

   /* Tema section */
  .theme-section.theme-dark {
    background-color: #002B6A;
    color: white;
  }

  .theme-section.theme-light {
    background-color: white;
    color: #1F2937;
  }

  body.light-mode .theme-section.theme-dark {
    background-color: #E0F2FE;
    color: #1F2937;
  }

  body.light-mode .theme-section.theme-light {
    background-color: #fefefe;
    color: #1F2937;
  }

  body.dark-mode .theme-section.theme-dark {
    background-color: #000000;
    color: #ffffff;
  }

  body.dark-mode .theme-section.theme-light {
    background-color: #1a1a1a;
    color: #f1f1f1;
  }

  /* Teks umum */
  body.light-mode a,
  body.light-mode button,
  body.light-mode p,
  body.light-mode span,
  body.light-mode div,
  body.light-mode h1,
  body.light-mode h2,
  body.light-mode h3 {
    color: #1f2937 !important;
    background-color: transparent;
  }

  body.dark-mode a,
  body.dark-mode button,
  body.dark-mode p,
  body.dark-mode span,
  body.dark-mode div,
  body.dark-mode h1,
  body.dark-mode h2,
  body.dark-mode h3 {
    color: #f1f1f1 !important;
    background-color: transparent;
  }

  /* Tombol */
  body.dark-mode button {
    background-color: #1a1a1a;
    border: 1px solid #ccc;
  }

  body.light-mode button {
    background-color: #ffffff;
    border: 1px solid #ccc;
  }

  body.default-mode button {
    background-color: #002B6A;
    color: white;
  }

    </style>

</head>
<body id="body" class="default-mode">

<div class="relative overflow-hidden bg-primary theme-section theme-dark">
        <!-- Floating Shapes Background -->
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <!-- Decorative SVG with enhanced styling -->
                {{-- <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 transform translate-x-1/2 opacity-20"
                     style="color: #a3c2f5;" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg> --}}

                <!-- Navigation -->
                <div class="relative pt-6 px-4 sm:px-6 lg:px-8 fade-in">
                    <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start glass-effect rounded-xl p-4" aria-label="Global">
                        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                            <div class="flex items-center justify-between w-40">
                                <img src="{{ asset('image/logo-bps.png') }}" alt="BPS Logo" class="h-12 w-auto">
                            </div>
                        </div>

                        <div class="hidden md:flex md:items-center md:ml-10 md:pr-4 md:space-x-6">
                            <a href="#" class="nav-link font-medium text-white hover:text-blue-100 speak-target" onmouseenter="speakOnHover(this)" >Beranda</a>
                            <a href="#" class="nav-link font-medium text-white hover:text-blue-100 speak-target" onmouseenter="speakOnHover(this)" >Tentang Kami</a>
                            <a href="#" class="nav-link font-medium text-white hover:text-blue-100 speak-target" onmouseenter="speakOnHover(this)" >FAQ</a>

                            <!-- Session logic - choose one condition -->
                            <!-- Option 1: If user is logged in -->
                             @if(session('loginStatus') && session('user'))
                            <form action="{{ route('logoutUser') }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="logout-btn speak-target" onmouseenter="speakOnHover(this)" >Logout</button>
                            </form>

                            @else
                            <!-- Option 2: If user is not logged in -->
                            <a href="{{ route('loginUser') }}" class="login-btn speak-target" onmouseenter="speakOnHover(this)" >Login</a>
                            @endif
                        </div>
                    </nav>
                </div>

                <!-- Main Content -->
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left slide-up">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl text-shadow">
                            <span class="block speak-target" onmouseenter="speakOnHover(this)">Selamat Datang Di Datapedia</span>
                            <span class="block speak-target" style="color: #a3c2f5;" onmouseenter="speakOnHover(this)">Badan Pusat Statistik</span>
                        </h1>

                        <div class="mt-6 p-6 glass-effect rounded-xl">
                            <h2 class="text-xl font-semibold text-white mb-3 flex items-center speak-target" onmouseenter="speakOnHover(this)">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Jam Layanan
                            </h2>
                            <div class="text-white space-y-1">
                                <div class="flex items-center speak-target" onmouseenter="speakOnHover(this)">
                                    <h2 class="w-24 font-medium">Senin - Kamis</h2>
                                    <h2 class="mx-2">:</h2>
                                    <h2>08.00 - 15.30 WIB</h2>
                                </div>
                                <div class="flex items-center speak-target" onmouseenter="speakOnHover(this)">
                                    <h2 class="w-24 font-medium">Jumat</h2>
                                    <h2 class="mx-2">:</h2>
                                    <h2>08.00 - 16.00 WIB</h2>
                                </div>
                                <div class="mt-2 text-sm text-white italic speak-target" onmouseenter="speakOnHover(this)">
                                    Tanpa Jeda Pelayanan
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 sm:mt-11 sm:flex sm:justify-center lg:justify-start space-y-3 sm:space-y-0 sm:space-x-4">
                            <div class="">
                                <a href="#" class="btn-primary w-full flex items-center justify-center px-8 py-4 border-0 text-base font-medium rounded-xl text-blue-900 relative overflow-hidden speak-target" onmouseenter="speakOnHover(this)">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Hubungi Kami
                                </a>
                            </div>
                            <div class="">
                                <a href="#" class="btn-secondary w-full flex items-center justify-center px-8 py-4 border-0 text-base font-medium rounded-xl text-white relative overflow-hidden speak-target" onmouseenter="speakOnHover(this)">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    Layanan Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- Right Side Image -->
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 flex items-center justify-center px-6 mt-12 lg:mt-0">
            <div class="max-w-md bounce-gentle">
                <div class="relative">
                    <!-- Glowing effect behind image -->
                    <div class="absolute inset-0 bg-gradient-to-r from-bg-primary to-blue-500 rounded-2xl blur-2xl opacity-20 transform scale-110"></div>
                    <img class="service-image h-auto w-full relative z-10 rounded-2xl"
                         src="{{ asset('image/service.png') }}"
                         alt="Customer Service 24/7">

                    <!-- Floating badge -->
                    <div class="absolute -top-4 -right-4 bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg z-20 ">
                        ✓ 24/7 Online
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative elements -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-white to-transparent opacity-20"></div>
    </div>

{{-- END JUMBOTRON --}}
@yield('content')
{{-- FOOTER --}}
<footer class="bg-[#002B6A] text-white theme-section theme-dark">
    <!-- Main Footer Content -->
    <div class="py-12 lg:py-16">
        <div class="container mx-auto px-4 lg:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Kolom Kontak & Logo -->
                <div class="lg:col-span-5 space-y-6">
                    <!-- Logo -->
                    <div class="mb-8">
                        <img src="{{ asset('image/logo-bps.png') }}"
                             class="w-64 lg:w-80 h-auto object-contain"
                             alt="Logo BPS Kepulauan Bangka Belitung" />
                    </div>

                    <!-- Informasi Kontak -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="font-semibold text-lg mb-3 text-gray-100">Kontak Kami</h3>
                            <div class="space-y-3 text-gray-200 leading-relaxed">
                                <p class="text-sm lg:text-base">
                                    <span class="font-medium">Badan Pusat Statistik Provinsi Kepulauan Bangka Belitung</span><br>
                                    <span class="text-gray-300">(BPS-Statistics Kepulauan Bangka Belitung)</span>
                                </p>
                                <p class="text-sm lg:text-base text-gray-300">
                                    Komplek Perkantoran Terpadu Pemerintah Provinsi Kepulauan Bangka Belitung
                                </p>
                            </div>
                        </div>

                        <!-- Contact Details -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4 text-sm lg:text-base">
                            <div class="flex items-center space-x-3">
                                <div class="w-5 h-5 flex-shrink-0">
                                    <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                </div>
                                <span class="text-gray-200">Telp: (0717) 439422</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-5 h-5 flex-shrink-0">
                                    <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <span class="text-gray-200 speak-target" onmouseenter="speakOnHover(this)">Fax: (0717) 439425</span>
                            </div>
                            <div class="flex items-center space-x-3 sm:col-span-2 lg:col-span-1">
                                <div class="w-5 h-5 flex-shrink-0">
                                    <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <a href="mailto:bps1900@bps.go.id" class="text-gray-200 hover:text-white transition-colors duration-200 speak-target" onmouseenter="speakOnHover(this)">
                                    Mailbox: bps1900@bps.go.id
                                </a>
                            </div>
                        </div>

                        <!-- Logo BerAKHLAK -->
                        <div class="pt-4">
                            <img src="{{ asset('image/berakhlak.png') }}"
                                 alt="BerAKHLAK"
                                 class="h-12 lg:h-14 object-contain" />
                        </div>
                    </div>
                </div>

                <!-- Kolom Tentang Kami -->
                <div class="lg:col-span-3">
                    <h3 class="font-bold text-lg mb-6 text-white border-b border-white/20 pb-2">
                        Tentang Kami
                    </h3>
                    <nav>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block">
                                    Profil BPS
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block">
                                    PPID
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Kolom Tautan Lainnya -->
                <div class="lg:col-span-4">
                    <h3 class="font-bold text-lg mb-6 text-white border-b border-white/20 pb-2">
                        Tautan Lainnya
                    </h3>
                    <nav>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-3">
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    ASEAN Stats
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    Forum Masyarakat Statistik
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    Reformasi Birokrasi
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    Layanan Pengadaan Secara Elektronik
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    Politeknik Statistika STIS
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    Pusdiklat BPS
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-200 hover:text-white hover:pl-2 transition-all duration-200 text-sm lg:text-base inline-block speak-target" onmouseenter="speakOnHover(this)">
                                    JDIH BPS
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="border-t border-white/20 bg-[#001a4d] theme-section theme-dark">
        <div class="container mx-auto px-4 lg:px-6 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <!-- Quick Links -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-1 text-sm">
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-1 rounded transition-colors duration-200 speak-target" onmouseenter="speakOnHover(this)">
                        Manual
                    </a>
                    <span class="text-gray-500">•</span>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-1 rounded transition-colors duration-200 speak-target" onmouseenter="speakOnHover(this)">
                        S&K
                    </a>
                    <span class="text-gray-500">•</span>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-1 rounded transition-colors duration-200 speak-target" onmouseenter="speakOnHover(this)">
                        Daftar Tautan
                    </a>
                </div>

                <!-- Copyright -->
                <div class="text-center lg:text-left">
                    <p class="text-sm text-gray-300 speak-target" onmouseenter="speakOnHover(this)">
                        Hak Cipta © <span id="current-year">2023</span> Badan Pusat Statistik
                    </p>
                </div>

                <!-- Social Media -->
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-400 hidden lg:inline speak-target" onmouseenter="speakOnHover(this)">Ikuti Kami:</span>
                    <div class="flex space-x-3">
                        <a href="#" class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all duration-200 group">
                            <img src="/img/facebook-icon.png"
                                 class="h-4 w-4 group-hover:scale-110 transition-transform duration-200"
                                 alt="Facebook" />
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all duration-200 group">
                            <img src="/img/instagram-icon.png"
                                 class="h-4 w-4 group-hover:scale-110 transition-transform duration-200"
                                 alt="Instagram" />
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all duration-200 group">
                            <img src="/img/x-icon.png"
                                 class="h-4 w-4 group-hover:scale-110 transition-transform duration-200"
                                 alt="Twitter" />
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-all duration-200 group">
                            <img src="/img/youtube-icon.png"
                                 class="h-4 w-4 group-hover:scale-110 transition-transform duration-200"
                                 alt="YouTube" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript untuk update tahun otomatis -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update current year
    const currentYearElement = document.getElementById('current-year');
    if (currentYearElement) {
        currentYearElement.textContent = new Date().getFullYear();
    }
});
</script>

<!-- Custom CSS untuk styling tambahan -->
<style>
    /* Smooth hover effects */
    footer a {
        position: relative;
    }

    /* Custom scrollbar untuk mobile */
    @media (max-width: 640px) {
        footer {
            overflow-x: hidden;
        }
    }

    /* Enhanced focus states untuk accessibility */
    footer a:focus {
        outline: 2px solid rgba(255, 255, 255, 0.5);
        outline-offset: 2px;
        border-radius: 4px;
    }

    /* Social media icons hover effect */
    footer .group:hover img {
        filter: brightness(1.2);
    }

    /* Responsive grid adjustments */
    @media (max-width: 1024px) {
        .lg\:col-span-5 {
            margin-bottom: 2rem;
        }
    }

    /* Enhanced mobile layout */
    @media (max-width: 640px) {
        footer .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        footer .grid {
            gap: 1.5rem;
        }
    }
</style>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
        $(".center").slick({
    centerMode: true,
    centerPadding: "",
    slidesToShow: 2,
    autoplay: true,
    speed: 500,
    nav: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: "40px",
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: "40px",
                slidesToShow: 1,
            },
        },
        {
            breakpoint: 1024,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: "40px",
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 1280,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: "40px",
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 1536,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: "40px",
                slidesToShow: 3,
            },
        },
    ],
});

  document.addEventListener('DOMContentLoaded', function () {
    const itemsPerPage = 6;
    const items = document.querySelectorAll('.layanan-item');
    const paginationControls = document.getElementById('pagination-controls');

    let currentPage = 1;
    const totalPages = Math.ceil(items.length / itemsPerPage);

    function showPage(page) {
      items.forEach((item, index) => {
        item.style.display = (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) ? 'block' : 'none';
      });
    }

    function renderPagination() {
      paginationControls.innerHTML = '';

      for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = `px-3 py-1 rounded border text-sm ${i === currentPage ? 'bg-[#002B6A] text-white' : 'bg-white text-[#002B6A] hover:bg-[#002B6A]/10'}`;
        btn.addEventListener('click', () => {
          currentPage = i;
          showPage(currentPage);
          renderPagination();
        });
        paginationControls.appendChild(btn);
      }
    }

    // Inisialisasi
    showPage(currentPage);
    renderPagination();
  });


    </script>

    <script>
    // Fungsi suara saat hover
    function speakOnHover(element) {
        const text = element.innerText.trim();
        if (text.length > 0) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'id-ID';
            window.speechSynthesis.cancel();
            window.speechSynthesis.speak(utterance);
        }
    }

    // Fungsi suara saat teks diblok (fix)
    document.addEventListener('mouseup', () => {
        const selection = window.getSelection();
        const selectedText = selection.toString().trim();

        if (selectedText.length > 0) {
            const range = selection.getRangeAt(0);
            const node = range.commonAncestorContainer;
            const element = node.nodeType === 1 ? node : node.parentElement;

            if (element.closest('.speak-target')) {
                const utterance = new SpeechSynthesisUtterance(selectedText);
                utterance.lang = 'id-ID';
                window.speechSynthesis.cancel();
                window.speechSynthesis.speak(utterance);
            }
        }
    });
</script>

<script>
    let baseFontSizes = new Map(); // Simpan ukuran awal setiap elemen

    function adjustFontSize(action) {
        const elements = document.querySelectorAll('.speak-target');

        elements.forEach((el, index) => {
            // Ambil ukuran awal dari computed style jika belum disimpan
            if (!baseFontSizes.has(index)) {
                const style = window.getComputedStyle(el, null).getPropertyValue('font-size');
                const fontSize = parseFloat(style); // contoh: 16
                baseFontSizes.set(index, fontSize);
            }

            let currentSize = parseFloat(el.style.fontSize) || baseFontSizes.get(index);

            if (action === 'increase') {
                currentSize += 2; // tambah 2px
            } else if (action === 'decrease') {
                currentSize -= 2; // kurang 2px, batas minimal 10px
                if (currentSize < 10) currentSize = 10;
            } else if (action === 'reset') {
                currentSize = baseFontSizes.get(index);
            }

            el.style.fontSize = `${currentSize}px`;
        });
    }
</script>

<script>
  function setContrast(mode) {
    const body = document.getElementById('body');
    body.classList.remove('default-mode', 'light-mode', 'dark-mode');
    if (mode === 'light') {
      body.classList.add('light-mode');
    } else if (mode === 'dark') {
      body.classList.add('dark-mode');
    } else {
      body.classList.add('default-mode');
    }

    // Simpan agar tetap saat reload
    localStorage.setItem('contrast-mode', mode);
  }

  document.addEventListener('DOMContentLoaded', () => {
    const saved = localStorage.getItem('contrast-mode');
    if (saved) setContrast(saved);
  });
</script>





</body>
</html>
