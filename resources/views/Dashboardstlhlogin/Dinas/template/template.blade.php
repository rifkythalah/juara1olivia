<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <title>Lapor.pal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo/icon.png') }}" type="image/png">

    {{-- Link Google Fonts Poppins jika belum pakai @fontsource --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,600&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="path/to/swiper/swiper-bundle.min.css" />
    <!-- Link CSS untuk Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Link ke Swiper CDN -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>

    <!-- Header -->
    <header class="bg-white absolute top-0 h-[90px] left-0 w-full flex items-center shadow-lg lg:py-0">
        <div class="container">
            <div class="flex items-center justify-between w-full">
                <!-- Logo -->
                <div class="px-4">
                    <a href="/home" class="font-bold text-black mx-8 flex items-center py-6 pl-4">
                        <img src="{{ asset('img/logo/Hitam2.png') }}" alt="Logo Lapor.Pal!" class="custom-logo resize-logo" />
                    </a>
                </div>

                <!-- Menu Navigasi -->
                <div class="flex items-center ml-auto px-4 lg:px-8 space-x-6">
                    <!-- Hamburger Button (Mobile Only) -->
                    <button id="hamburger" type="button" class="lg:hidden focus:outline-none z-50">
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    </button>

                    <!-- Navigation Menu -->
                    <nav id="nav-menu" class="hidden absolute lg:static top-0 left-0 right-0 lg:block mt-16 lg:mt-0 py-5 lg:py-0 bg-white lg:bg-transparent shadow-lg lg:shadow-none rounded-lg lg:rounded-none w-full lg:w-auto">
                        <ul class="flex flex-col lg:flex-row items-center space-y-4 lg:space-y-0">
                            <!-- Main Menu Group -->
                            <div class="flex flex-col lg:flex-row w-full lg:w-auto space-y-4 lg:space-y-0 lg:space-x-7 px-8 lg:px-0">
                                <li class="w-full lg:w-auto">
                                    <a href="/dinas/laporan/masyarakat" class="block text-[18px] font-bold py-2 relative
            {{ request()->is('/') || request()->is('home') ? 'text-hitam after:content-[\"\"] after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-kuning' : 'text-hitam/70 hover:text-hitam' }}">
                                        Beranda
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </nav>

                    <!-- Ikon Notifikasi & Profil -->
                    <div class="flex items-center space-x-4 relative">
                        <!-- Notification Icon (Heroicons) -->
                        <a href="/dinas/notifikasi" class="relative text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                            @if($unreadNotifCount > 0)
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                                    {{ $unreadNotifCount }}
                                </span>
                            @endif
                        </a>

                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button class="profile-button flex items-center focus:outline-none">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-gray-300">
                                    <img src="{{ asset('img/logo/pupr.jpg') }}" alt="Profil Lapor.Pal" class="w-full h-full object-cover" />
                                </div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="profile-dropdown hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <form action="{{ route('logout') }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:bg-kuning w-ful w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-[100px] flex-grow container mx-auto px-0 py-8">
        @yield('content') <!-- This is where content will be injected -->
    </main>


    <footer class="w-full">
        <!-- Gambar di atas teks -->
        <img src="{{ asset('img/logo/Footer.png') }}" alt="Logo Lapor.Pal!" class="mx-auto mb-4" width="1441.44" height="387.79">
        <!-- Background kuning memenuhi seluruh lebar layar -->
        <div class="w-full bg-kuning text-center py-4">
            <!-- Teks di bawah gambar -->
            <p class="text-hitam text-[18px] font-bold">&copy; 2025 Pemerintah Kota Malang - All Rights Reserved.</p>
        </div>
    </footer>


    <!-- Script untuk Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>

</html>
