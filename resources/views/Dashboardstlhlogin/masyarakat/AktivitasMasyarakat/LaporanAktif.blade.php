@extends('Dashboardstlhlogin.masyarakat.AktivitasMasyarakat')
@section('title', 'laporansaya')

@section('Laporan')

<section>
<div class="mx-12">
    <div class="px-4 sm:px-6 lg:px-8 mt-4 sm:mt-6"> {{-- Removed indent-30 --}}
        <div class="flex items-center gap-2 sm:gap-4 mb-2"> {{-- Adjusted margin-bottom --}}
            <h2 class="text-lg sm:text-xl md:text-[20px] font-bold text-hitam whitespace-nowrap">
                Laporan Aktif
            </h2>
            <span class="block w-full sm:w-[200px] h-[3px] sm:h-[4px] bg-kuning"></span>
        </div>
    </div>
    <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="card group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-blue-500">
            <div class="absolute top-4 right-4 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full z-10 shadow-sm">
                On-Proggres
            </div>
            <a href="/detail-laporan/1" class="block">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/Desain/foto.png') }}" alt="Jalan Rusak" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">Jalan Berlubang di Perumahan</h3>
                        <span class="text-sm text-gray-500">2 jam lalu</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Jalan di depan perumahan Permata Indah sudah berlubang besar dan membahayakan pengendara...</p>
                </div>
            </a>
            <div class="px-5 pb-5 pt-0">
                <div class="flex justify-between items-center">
                    <a href="/detail-laporan/1" class="text-yellow-600 font-medium hover:text-yellow-700 transition-colors">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="card group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-kuning">
            <div class="absolute top-4 right-4 bg-kuning text-white text-xs font-semibold px-3 py-1 rounded-full z-10 shadow-sm">
                Menunggu
            </div>
            <a href="/detail-laporan/1" class="block">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/Desain/foto.png') }}" alt="Jalan Rusak" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">Jalan Berlubang di Perumahan</h3>
                        <span class="text-sm text-gray-500">2 jam lalu</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Jalan di depan perumahan Permata Indah sudah berlubang besar dan membahayakan pengendara...</p>
                </div>
            </a>
            <div class="px-5 pb-5 pt-0">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">
                        <button class="like-btn flex items-center text-gray-500 hover:text-red-500 transition" data-liked="false">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>24</span>
                        </button>
                        <button class="flex items-center text-gray-500 hover:text-blue-500 transition">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>5</span>
                        </button>
                    </div>
                    <a href="/detail-laporan/1" class="text-yellow-600 font-medium hover:text-yellow-700 transition-colors">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="card group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-red-500">
            <div class="absolute top-4 right-4 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full z-10 shadow-sm">
                Di tolak
            </div>
            <a href="/detail-laporan/1" class="block">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/Desain/foto.png') }}" alt="Jalan Rusak" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">Jalan Berlubang di Perumahan</h3>
                        <span class="text-sm text-gray-500">2 jam lalu</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Jalan di depan perumahan Permata Indah sudah berlubang besar dan membahayakan pengendara...</p>
                </div>
            </a>
            <div class="px-5 pb-5 pt-0">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">
                        <button class="like-btn flex items-center text-gray-500 hover:text-red-500 transition" data-liked="false">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>24</span>
                        </button>
                        <button class="flex items-center text-gray-500 hover:text-blue-500 transition">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>5</span>
                        </button>
                    </div>
                    <a href="/detail-laporan/1" class="text-yellow-600 font-medium hover:text-yellow-700 transition-colors">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 sm:px-6 lg:px-8 mt-8 sm:mt-12"> {{-- Removed indent-30 --}}
        <div class="flex items-center gap-2 sm:gap-4 mb-2"> {{-- Adjusted margin-bottom --}}
            <h2 class="text-lg sm:text-xl md:text-[20px] font-bold text-hitam whitespace-nowrap">
                Laporan Selesai
            </h2>
            <span class="block w-full sm:w-[200px] h-[3px] sm:h-[4px] bg-kuning"></span>
        </div>
        {{-- Updated paragraph alignment and margin --}}
        <p class="text-sm sm:text-base mt-2 mb-4 text-gray-600 text-left"> {{-- Changed my-6 to mt-2 mb-4 and added text-left --}}
            Beri ulasan pada laporanmu yang telah selesai dan kumpulkan poin sebagai apresiasi
        </p>
    </div>
    <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="card group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-green-500">
            <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full z-10 shadow-sm">
                Selesai
            </div>
            <a href="/detail-laporan/3" class="block">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/Desain/foto.png') }}" alt="Lampu Jalan Mati" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">Lampu Jalan Mati</h3>
                        <span class="text-sm text-gray-500">3 hari lalu</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Lampu jalan di depan SDN 05 sudah 2 minggu mati, sangat membahayakan pengendara...</p>
                </div>
            </a>
            <div class="px-5 pb-5 pt-0">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">

                        <button class="like-btn flex items-center text-gray-500 hover:text-red-500 transition" data-liked="false">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>18</span>
                        </button>
                        <button class="flex items-center text-gray-500 hover:text-blue-500 transition">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>7</span>
                        </button>
                    </div>
                    <a href="/detail-laporan/3" class="text-yellow-600 font-medium hover:text-yellow-700 transition-colors">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="card group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-green-500">
            <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full z-10 shadow-sm">
                Selesai
            </div>
            <a href="/detail-laporan/3" class="block">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/Desain/foto.png') }}" alt="Lampu Jalan Mati" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">Lampu Jalan Mati</h3>
                        <span class="text-sm text-gray-500">3 hari lalu</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Lampu jalan di depan SDN 05 sudah 2 minggu mati, sangat membahayakan pengendara...</p>
                </div>
            </a>
            <div class="px-5 pb-5 pt-0">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">

                        <button class="like-btn flex items-center text-gray-500 hover:text-red-500 transition" data-liked="false">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>18</span>
                        </button>
                        <button class="flex items-center text-gray-500 hover:text-blue-500 transition">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>7</span>
                        </button>
                    </div>
                    <a href="/detail-laporan/3" class="text-yellow-600 font-medium hover:text-yellow-700 transition-colors">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="card group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-l-4 border-green-500">
            <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full z-10 shadow-sm">
                Selesai
            </div>
            <a href="/detail-laporan/3" class="block">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('img/Desain/foto.png') }}" alt="Lampu Jalan Mati" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">Lampu Jalan Mati</h3>
                        <span class="text-sm text-gray-500">3 hari lalu</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Lampu jalan di depan SDN 05 sudah 2 minggu mati, sangat membahayakan pengendara...</p>
                </div>
            </a>
            <div class="px-5 pb-5 pt-0">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">

                        <button class="like-btn flex items-center text-gray-500 hover:text-red-500 transition" data-liked="false">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>18</span>
                        </button>
                        <button class="flex items-center text-gray-500 hover:text-blue-500 transition">
                            <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>7</span>
                        </button>
                    </div>
                    <a href="/detail-laporan/3" class="text-yellow-600 font-medium hover:text-yellow-700 transition-colors">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<style>
    @keyframes float {
        0%,
        100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
</style>
<script>
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const isLiked = this.getAttribute('data-liked') === 'true';
            const icon = this.querySelector('svg');
            const count = this.querySelector('span:last-child');

            if (isLiked) {
                this.setAttribute('data-liked', 'false');
                this.classList.remove('text-red-500');
                count.textContent = parseInt(count.textContent) - 1;
            } else {
                this.setAttribute('data-liked', 'true');
                this.classList.add('text-red-500');
                count.textContent = parseInt(count.textContent) + 1;
            }
        });
    });

    const expandBtn = document.getElementById('expand-btn');
    const cardsContainer = document.getElementById('cards-container');

    expandBtn.addEventListener('click', function() {
        if (cardsContainer.classList.contains('grid-cols-1')) {
            cardsContainer.classList.remove('grid-cols-1', 'sm:grid-cols-2', 'lg:grid-cols-3');
            cardsContainer.classList.add('grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-4', 'xl:grid-cols-5');
            expandBtn.innerHTML = '<span>Sembunyikan</span><svg class="ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>';
        } else {
            cardsContainer.classList.remove('grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-4', 'xl:grid-cols-5');
            cardsContainer.classList.add('grid-cols-1', 'sm:grid-cols-2', 'lg:grid-cols-3');
            expandBtn.innerHTML = '<span>Lihat Semua</span><svg class="ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
        }
    });

    // Search functionality would be implemented with your backend
</script>

@endsection
