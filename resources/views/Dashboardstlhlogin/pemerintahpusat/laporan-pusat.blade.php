@extends('Dashboardstlhlogin.pemerintahpusat.template.template')
@section('title', 'pusat')

@section('content')

<section class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 py-4">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-2">
            <div class="flex-1 min-w-0">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 truncate">Laporan Daerah</h2>
                <p class="text-sm md:text-base font-light text-gray-600 mt-1">Notification/ Laporan Daerah</p>
            </div>
        </div>
        <div class="w-full h-1 bg-yellow-400 mb-4 sm:mb-6"></div>
    </div>

    <!-- Search and Filter Section -->
    <div class="container mx-auto px-4 sm:px-6 py-4">
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
            <!-- Search Bar -->
            <div class="flex-1 relative">
                <input type="text" placeholder="Cari Jalan laporan..."
                    class="w-full pl-10 pr-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 text-sm sm:text-base">
                <svg class="absolute left-3 top-2.5 sm:top-3 h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Filter Dropdown -->
            <div class="w-full sm:w-48">
                <select class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 text-sm sm:text-base">
                    <option value="">Status</option>
                    <option value="belum-direspon">Belum direspon</option>
                    <option value="belum-terselesaikan">Belum selesai</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="container mx-auto px-4 sm:px-6 pb-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-yellow-400">
                        <tr>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black">No</th>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black">Foto</th>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black hidden sm:table-cell">Keterangan</th>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black hidden md:table-cell">Alamat</th>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black">Tanggal</th>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black">Status</th>
                            <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-medium text-black">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($laporans as $laporan)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 sm:px-4 py-4 text-xs sm:text-sm text-gray-900">{{ $loop->iteration }}</td>
                                <td class="px-3 sm:px-4 py-4">
                                    <img src="{{ asset('storage/' . $laporan->foto_video) }}" alt="Laporan"
                                        class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded shadow">
                                </td>
                                <td class="px-3 sm:px-4 py-4 text-xs sm:text-sm text-gray-900 hidden sm:table-cell">{{ $laporan->deskripsi }}</td>
                                <td class="px-3 sm:px-4 py-4 text-xs sm:text-sm text-gray-900 hidden md:table-cell">{{ $laporan->lokasi }}</td>
                                <td class="px-3 sm:px-4 py-4 text-xs sm:text-sm text-gray-900">{{ $laporan->created_at->format('d/m/Y') }}</td>
                                <td class="px-3 sm:px-4 py-4">
                                    @php
                                        $lastTracking = $laporan->tracking->last();
                                    @endphp
                                    @if($laporan->status == 'Menunggu' && $laporan->escalated_to_pusat)
                                        <span>Belum Respon</span>
                                    @elseif($lastTracking && $lastTracking->status == 'Tidak Terselesaikan')
                                        <span>Tidak Terselesaikan</span>
                                    @endif
                                </td>
                                <td class="px-3 sm:px-4 py-4">
                                    @if($laporan->status == 'Menunggu' && $laporan->escalated_to_pusat)
                                        <a href="{{ route('pemerintahpusat.laporan.belumdirespon.detail', $laporan->id) }}" class="text-yellow-500 hover:text-yellow-600" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    @elseif($lastTracking && $lastTracking->status == 'Tidak Terselesaikan')
                                        <a href="{{ route('pemerintahpusat.laporan.belumterselesaikan.detail', $laporan->id) }}" class="text-yellow-500 hover:text-yellow-600" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada laporan yang belum direspon.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection