<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATAPEDIA BPS</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" crossorigin="anonymous" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- External JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        .glass-effect {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .carousel-container {
        overflow: hidden;
    }

    .carousel-slide {
        min-height: 400px;
    }

    .carousel-slide .grid {
        grid-template-rows: repeat(2, 1fr);
        gap: 1rem;
    }

    @media (max-width: 1024px) {
        .carousel-slide .grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .carousel-slide .grid {
            grid-template-columns: 1fr;
        }

        .carousel-slide {
            min-height: auto;
        }
    }

    .nav-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nav-dot.active {
        background: white;
        transform: scale(1.2);
    }

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Modern Gradient Background */
        .gradient-hero {
            background: linear-gradient(135deg, #001a3d 0%, #002B6A 25%, #003d8f 50%, #0052b8 75%, #0066e0 100%);
            position: relative;
            overflow: hidden;
        }

        .gradient-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 43, 106, 0.15) 0%, rgba(0, 82, 184, 0.1) 50%, rgba(0, 102, 224, 0.1) 100%);
            z-index: 1;
        }

        /* Glassmorphism Effects */
        .glass-nav {
            backdrop-filter: blur(20px);
            background: rgba(0, 43, 106, 0.9);
            border-bottom: 1px solid rgba(0, 82, 184, 0.2);
            box-shadow: 0 4px 32px rgba(0, 43, 106, 0.3);
        }

        .glass-card {
            backdrop-filter: blur(16px);
            background: rgba(0, 43, 106, 0.1);
            border: 2px solid rgba(27, 179, 254, 0.2);
            box-shadow: 0 32px 32px rgba(0, 43, 106, 0.2);
        }

        /* Modern Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(60px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(-10px) rotate(-1deg); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 82, 184, 0.4); }
            50% { box-shadow: 0 0 40px rgba(0, 102, 224, 0.8); }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* Modern Button Styles */
        .btn-modern {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #002B6A, #0052b8);
            box-shadow: 0 4px 15px rgba(0, 43, 106, 0.4);
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-modern:hover::before {
            left: 100%;
        }

        .btn-modern:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 30px rgba(0, 82, 184, 0.6);
        }

        .btn-secondary-modern {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #001a3d, #002B6A);
            border: 1px solid rgba(0, 82, 184, 0.3);
            box-shadow: 0 4px 15px rgba(0, 26, 61, 0.3);
        }

        .btn-secondary-modern:hover {
            transform: translateY(-2px) scale(1.02);
            background: linear-gradient(135deg, #001327, #001a3d);
            box-shadow: 0 8px 30px rgba(0, 43, 106, 0.4);
        }

        /* Navigation Enhancements */
        .nav-link-modern {
            position: relative;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .nav-link-modern::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: linear-gradient(90deg, #0052b8, #0066e0);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link-modern:hover::after {
            width: 80%;
        }

        .nav-link-modern:hover {
            background: rgba(0, 82, 184, 0.1);
            color: #66c2ff;
        }

        /* Floating Elements */
        .floating-orb {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 43, 106, 0.15), rgba(0, 82, 184, 0.1));
            filter: blur(1px);
        }

        .orb-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .orb-2 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 10%;
            animation: float 10s ease-in-out infinite reverse;
        }

        .orb-3 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 60%;
            animation: float 6s ease-in-out infinite;
        }

        /* Sticky Navbar */
        .navbar-sticky {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-scrolled {
            backdrop-filter: blur(20px);
            background: rgba(0, 43, 106, 0.98);
            border-bottom: 1px solid rgba(0, 82, 184, 0.3);
            box-shadow: 0 4px 32px rgba(0, 43, 106, 0.4);
        }

        /* Mobile Menu Animation */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .mobile-menu.open {
            max-height: 300px;
        }

        /* Service Image Effects */
        .service-image-container {
            position: relative;
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .service-image {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .service-image:hover {
            transform: rotateY(5deg) rotateX(5deg) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        /* Professional Badge */
        .status-badge {
            background: linear-gradient(135deg, #10b981, #34d399);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .orb-1, .orb-2, .orb-3 {
                opacity: 0.5;
            }
        }
    </style>
</head>

<body class="antialiased">
    <!-- Modern Sticky Navigation -->
    <nav id="navbar" class="navbar-sticky glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="h-28 w-auto transition-transform duration-300 hover:scale-105"
                             src="{{ asset('image/logo-bps.png') }}"
                             alt="BPS Logo">
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#home" class="nav-link-modern text-white font-medium">Beranda</a>
                    <a href="#konsultasi" class="nav-link-modern text-white font-medium">Konsultasi</a>
                    @if(session('loginStatus') && session('user'))
                    <a href="{{ route('profile.index') }}" class="nav-link-modern text-white font-medium">Profil</a>
                    @else
                    <button type="button" onclick="showLoginAlert()" class="nav-link-modern text-white font-medium">Profil</button>
                    @endif

                    @if(session('loginStatus') && session('user'))
                    <form action="{{ route('logoutUser') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="btn-modern text-red-500 px-6 py-2 rounded-lg font-medium " onmouseenter="speakOnHover(this)">Logout</button>
                    </form>

                    @else

                    <a href="{{ route('loginUser') }}" class="btn-modern text-white px-6 py-2 rounded-lg font-medium">
                        Login
                    </a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-white hover:text-gray-300 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-slate-800/50 rounded-lg mt-2">
                    <a href="#home" class="block px-3 py-2 text-white hover:bg-white/10 rounded-md">Beranda</a>
                    <a href="#konsultasi" class="block px-3 py-2 text-white hover:bg-white/10 rounded-md">Konsultasi</a>
                    <a href="#profil" class="block px-3 py-2 text-white hover:bg-white/10 rounded-md">Profil</a>
                    <a href="#login" class="block px-3 py-2 text-center bg-blue-800 text-white rounded-md mt-4">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="gradient-hero min-h-screen relative">
        <!-- Floating Orbs -->
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center min-h-screen pt-20">
                <!-- Left Content -->
                <div class="animate-fadeInUp">
                    <div class="space-y-8">
                        <div>
                            <h1 class="text-3xl lg:text-5xl font-black text-white leading-tight">
                                <span class="block">Media Konsultasi</span>
                                <span class="block bg-gradient-to-r from-blue-300 to-blue-100 bg-clip-text text-transparent pb-4">
                                    Statistik Langsung
                                </span>
                            </h1>
                            <p class="mt-6 text-xl text-gray-300 leading-relaxed max-w-2xl">
                                Platform konsultasi statistik terdepan dengan teknologi modern untuk memberikan layanan terbaik bagi masyarakat Indonesia.
                            </p>
                        </div>

                        <!-- Service Hours Card -->
                        <div class="glass-card rounded-2xl p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="flex items-center justify-center w-10 h-10 bg-blue-500/20 rounded-full">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">Jam Layanan</h3>
                            </div>

                            <div class="space-y-3 text-gray-300">

                    @forelse ($jamOperasional as $jam)
                    <div class="flex justify-between items-center text-base">
                        <span class="font-medium">{{ $jam->keterangan_hari }}</span>

                        {{-- Format jam menggunakan titik sesuai permintaan awal --}}
                        <span class="font-medium px-3 py-1 rounded-md text-sm">
                            {{ \Carbon\Carbon::parse($jam->jam_mulai)->format('H.i') }} - {{ \Carbon\Carbon::parse($jam->jam_selesai)->format('H.i') }} WIB
                        </span>
                    </div>
                @empty
                    <div class="text-center text-slate-500 py-4">
                        <p>Informasi jam operasional belum tersedia saat ini.</p>
                    </div>
                @endforelse

                                {{-- <div class="flex justify-between items-center">
                                    <span class="font-medium">Senin - Kamis</span>
                                    <span>08.00 - 16.00 WIB</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Jumat</span>
                                    <span>08.00 - 16.30 WIB</span>
                                </div> --}}
                                <div class="pt-2 border-t border-blue-600">
                                    <p class="text-sm text-blue-200 italic">✨ Tanpa Jeda Pelayanan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="https://wa.me/6282226602929"
                               class="btn-modern flex items-center justify-center px-8 py-4 rounded-xl text-white font-semibold group">
                                <svg class="w-5 h-5 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Hubungi Petugas
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Right Content - Service Image -->
                <div class="animate-slideInRight">
                    <div class="service-image-container animate-float">
                        <div class="relative">
                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/20 to-blue-700/20 rounded-2xl blur-3xl transform scale-110"></div>

                            <!-- Main Image -->
                            <img class="service-image relative z-10 w-full max-w-md mx-auto"
                                 src="{{ asset('image/service.png') }}"
                                 alt="Customer Service">

                            <!-- Status Badge -->
                            <div class="status-badge absolute -top-4 -right-4 px-4 py-2 rounded-full text-white text-sm font-semibold z-20">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                    <span>24/7 Online</span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Gradient -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-primary to-transparent"></div>
    </section>

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
    <!-- Toggle Script -->
<script>

document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 0;
    const carouselWrapper = document.getElementById('carouselWrapper');
    const originalSlides = document.querySelectorAll('.carousel-slide:not(.duplicate-slide)');
    const allSlides = document.querySelectorAll('.carousel-slide');
    const totalOriginalSlides = originalSlides.length;
    let isTransitioning = false;

    // Generate navigation dots based on original slides only
    function generateDots() {
        const dotsContainer = document.getElementById('dotsContainer');
        dotsContainer.innerHTML = '';

        // Only show dots if we have more than one slide
        if (totalOriginalSlides > 1) {
            for (let i = 0; i < totalOriginalSlides; i++) {
                const dot = document.createElement('div');
                dot.className = 'nav-dot';
                if (i === 0) dot.classList.add('active');
                dot.setAttribute('data-slide', i);
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }
        }
    }

    // Update carousel position
    function updateCarousel(smooth = true) {
        if (!smooth) {
            carouselWrapper.style.transition = 'none';
        } else {
            carouselWrapper.style.transition = 'transform 0.5s ease-in-out';
        }

        const translateX = -(currentSlide * 100);
        carouselWrapper.style.transform = `translateX(${translateX}%)`;

        // Update dots
        const dots = document.querySelectorAll('.nav-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    // Go to specific slide
    function goToSlide(slideIndex) {
        if (isTransitioning || slideIndex >= totalOriginalSlides) return;
        currentSlide = slideIndex;
        updateCarousel();
    }

    // Next slide with seamless loop
    function nextSlide() {
        if (isTransitioning) return;
        if (totalOriginalSlides <= 1) return; // Don't slide if only one slide

        isTransitioning = true;
        currentSlide++;
        updateCarousel();

        // Check if we need to loop back
        setTimeout(() => {
            if (currentSlide >= totalOriginalSlides) {
                currentSlide = 0;
                updateCarousel(false); // Jump without animation
            }
            isTransitioning = false;
        }, 500);
    }

    // Previous slide with seamless loop
    function prevSlide() {
        if (isTransitioning) return;
        if (totalOriginalSlides <= 1) return; // Don't slide if only one slide

        isTransitioning = true;

        if (currentSlide <= 0) {
            // Jump to the duplicate slide, then slide back
            currentSlide = totalOriginalSlides;
            updateCarousel(false);
            setTimeout(() => {
                currentSlide = totalOriginalSlides - 1;
                updateCarousel();
                setTimeout(() => {
                    isTransitioning = false;
                }, 500);
            }, 50);
        } else {
            currentSlide--;
            updateCarousel();
            setTimeout(() => {
                isTransitioning = false;
            }, 500);
        }
    }

    // Event listeners
    document.getElementById('nextBtn').addEventListener('click', nextSlide);
    document.getElementById('prevBtn').addEventListener('click', prevSlide);

    // Auto slide every 4 seconds (only if more than one slide)
    let autoSlideInterval;
    if (totalOriginalSlides > 1) {
        autoSlideInterval = setInterval(nextSlide, 4000);

        // Pause auto-slide on hover
        const carouselContainer = document.querySelector('.carousel-container');
        carouselContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        carouselContainer.addEventListener('mouseleave', () => {
            autoSlideInterval = setInterval(nextSlide, 4000);
        });
    }

    // Handle window resize
    window.addEventListener('resize', function() {
        generateDots();
        updateCarousel(false);
    });

    // Initialize
    generateDots();
    updateCarousel(false);

    // Hide navigation if only one slide
    if (totalOriginalSlides <= 1) {
        document.getElementById('nextBtn').style.display = 'none';
        document.getElementById('prevBtn').style.display = 'none';
    }
});

  window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('open');

            // Toggle hamburger icon
            const icon = this.querySelector('svg path');
            if (mobileMenu.classList.contains('open')) {
                icon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                icon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });

  function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }

const carouselStates = {
    mobilePetugasWrapper: { index: 0 }
};

function updateSlide(id) {
    const wrapper = document.getElementById(id);
    const items = wrapper.children;
    const itemWidth = items[0].offsetWidth + 16;
    const index = carouselStates[id].index;
    wrapper.style.transform = `translateX(-${index * itemWidth}px)`;
}

function slideNext(id) {
    const wrapper = document.getElementById(id);
    const maxIndex = wrapper.children.length - 1;

    carouselStates[id].index++;
    if (carouselStates[id].index > maxIndex) carouselStates[id].index = 0;

    updateSlide(id);
}

function slidePrev(id) {
    const wrapper = document.getElementById(id);
    const maxIndex = wrapper.children.length - 1;

    carouselStates[id].index--;
    if (carouselStates[id].index < 0) carouselStates[id].index = maxIndex;

    updateSlide(id);
}

function startAutoSlide(id, interval = 10000) {
    setInterval(() => {
        slideNext(id);
    }, interval);
}

function paginatePetugas(page) {
    const itemsPerPage = 8;
    const cards = document.querySelectorAll(".petugas-card");
    cards.forEach((card, index) => {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        card.style.display = (index >= start && index < end) ? 'block' : 'none';
    });

    document.querySelectorAll(".pagination-btn").forEach(btn => {
        btn.classList.remove('bg-blue-800', 'text-white');
    });
    const activeBtn = document.querySelectorAll(".pagination-btn")[page - 1];
    if (activeBtn) activeBtn.classList.add('bg-blue-800', 'text-white');
}

document.addEventListener("DOMContentLoaded", () => {
    updateSlide("mobilePetugasWrapper");
    startAutoSlide("mobilePetugasWrapper");
    paginatePetugas(1);

    window.addEventListener("resize", () => {
        updateSlide("mobilePetugasWrapper");
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk menginisialisasi sebuah carousel
    function initCarousel(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const wrapper = container.querySelector('.carousel-wrapper');
        const items = container.querySelectorAll('.carousel-item');
        const prevBtn = container.querySelector('button[data-action="prev"]');
        const nextBtn = container.querySelector('button[data-action="next"]');

        if (!wrapper || items.length === 0 || !prevBtn || !nextBtn) {
            if(prevBtn) prevBtn.style.display = 'none';
            if(nextBtn) nextBtn.style.display = 'none';
            return;
        }

        let currentIndex = 0;
        let itemWidth = 0;

        function moveNext() {
            const { maxIndex } = calculateDimensions();
            if (maxIndex < 0) return;
            currentIndex++;
            if (currentIndex > maxIndex) {
                currentIndex = 0;
            }
            updateCarousel();
        }

        function movePrev() {
            const { maxIndex } = calculateDimensions();
            if (maxIndex < 0) return;
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = maxIndex;
            }
            updateCarousel();
        }

        function calculateDimensions() {
            if (items.length > 1) {
                const item1Left = items[0].getBoundingClientRect().left;
                const item2Left = items[1].getBoundingClientRect().left;
                itemWidth = item2Left - item1Left;
            } else if (items.length === 1) {
                itemWidth = items[0].offsetWidth + 16;
            }

            const visibleItems = Math.max(1, Math.round(wrapper.parentElement.offsetWidth / items[0].offsetWidth));
            const maxIndex = items.length - visibleItems;

            const isScrollable = items.length > visibleItems;
            prevBtn.style.display = isScrollable ? 'block' : 'none';
            nextBtn.style.display = isScrollable ? 'block' : 'none';

            return { maxIndex, isScrollable };
        }

        function updateCarousel() {
            wrapper.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }

        prevBtn.addEventListener('click', movePrev);
        nextBtn.addEventListener('click', moveNext);

        window.addEventListener('resize', () => {
            currentIndex = 0;
            updateCarousel();
            calculateDimensions();
        });

        // --- PENAMBAHAN KODE AUTO-SLIDE ---
        const { isScrollable } = calculateDimensions();
        if (isScrollable) {
            setInterval(() => {
                moveNext();
            }, 5000); // Interval 5000 ms = 5 detik
        }
    }

    // Panggil fungsi inisialisasi untuk SETIAP carousel yang ada di halaman
    initCarousel('standarLayananCarousel');
    initCarousel('maklumatCarousel');
});

function showLoginAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak',
        text: 'Kamu belum login, silakan login terlebih dahulu.',
        confirmButtonColor: '#002B6A',
        confirmButtonText: 'Login',
        cancelButtonText: 'Batal',
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('loginUser') }}";
        }
    });
}


    function showKonsultanInfo(nama, posisi, keahlian, no_hp, email, gambarUrl) {
        const container = document.createElement("div");
        container.className = "fixed bottom-4 right-4 bg-white border border-gray-200 rounded-lg shadow-lg p-4 w-80 z-50 animate-fade-in-down";
        container.innerHTML = `
            <div class="flex items-start gap-3">
                <img src="${gambarUrl}" class="w-16 h-16 object-cover rounded-lg border">
                <div>
                    <p class="font-bold text-gray-800">${nama}</p>
                    <p class="text-sm text-gray-600 mb-1">${posisi}</p>
                    <p class="text-sm text-blue-700">${keahlian}</p>
                    <p class="text-sm text-gray-500 mt-2">📞 ${no_hp}<br>✉️ ${email}</p>
                </div>
            </div>
        `;

        document.body.appendChild(container);

        // Hilangkan toast setelah 5 detik
        setTimeout(() => {
            container.remove();
        }, 5000);
    }

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


//     {{-- <scrip>
//     // Fungsi suara saat hover
//     function speakOnHover(element) {
//         const text = element.innerText.trim();
//         if (text.length > 0) {
//             const utterance = new SpeechSynthesisUtterance(text);
//             utterance.lang = 'id-ID';
//             window.speechSynthesis.cancel();
//             window.speechSynthesis.speak(utterance);
//         }
//     }

//     // Fungsi suara saat teks diblok (fix)
//     document.addEventListener('mouseup', () => {
//         const selection = window.getSelection();
//         const selectedText = selection.toString().trim();

//         if (selectedText.length > 0) {
//             const range = selection.getRangeAt(0);
//             const node = range.commonAncestorContainer;
//             const element = node.nodeType === 1 ? node : node.parentElement;

//             if (element.closest('.speak-target')) {
//                 const utterance = new SpeechSynthesisUtterance(selectedText);
//                 utterance.lang = 'id-ID';
//                 window.speechSynthesis.cancel();
//                 window.speechSynthesis.speak(utterance);
//             }
//         }
//     });
// </scrip


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


//  <scrip>
//   function setContrast(mode) {
//     const body = document.getElementById('body');
//     body.classList.remove('default-mode', 'light-mode', 'dark-mode');
//     if (mode === 'light') {
//       body.classList.add('light-mode');
//     } else if (mode === 'dark') {
//       body.classList.add('dark-mode');
//     } else {
//       body.classList.add('default-mode');
//     }

//     // Simpan agar tetap saat reload
//     localStorage.setItem('contrast-mode', mode);
//   }

//   document.addEventListener('DOMContentLoaded', () => {
//     const saved = localStorage.getItem('contrast-mode');
//     if (saved) setContrast(saved);
//   });
// </scrip

{{-- Untuk Cursor --}}

  function setCursorSize(size) {
    // Selalu reset class sebelumnya
    document.body.classList.remove('cursor-medium', 'cursor-large');

    if (size === 'medium') {
      document.body.classList.add('cursor-medium');
      localStorage.setItem('cursorSize', 'medium');
    } else if (size === 'large') {
      document.body.classList.add('cursor-large');
      localStorage.setItem('cursorSize', 'large');
    }
  }

  function resetCursor() {
    document.body.classList.remove('cursor-medium', 'cursor-large');
    localStorage.removeItem('cursorSize');
  }
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>
