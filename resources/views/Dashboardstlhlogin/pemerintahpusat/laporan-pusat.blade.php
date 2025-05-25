@extends('Dashboardstlhlogin.pemerintahpusat.template.template')
@section('title', 'pusat')

@section('content')
<section class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 py-8">
        <!-- Header Section dengan efek gradien -->
        <div class="bg-kuning rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-hitam mb-2">Laporan Daerah</h2>
            <p class="text-hitam/80">Pantau dan kelola laporan dari berbagai daerah</p>
        </div>

        <!-- Search and Filter Section dengan desain card -->
        <div class="rounded-xl shadow-md p-6 mb-8">
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                <!-- Search Bar dengan animasi -->
                <div class="relative flex-1 group">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari laporan..."
                        class="w-full px-12 py-3 rounded-lg border-2 border-gray-200 
                               focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200
                               transition duration-200 ease-in-out">
                    <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400 group-hover:text-yellow-500
                              transition duration-200 ease-in-out" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- Filter Dropdown dengan hover effect -->
                <div class="w-full sm:w-48">
                    <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg 
                                 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200
                                 cursor-pointer hover:border-yellow-300 transition duration-200 ease-in-out
                                 text-gray-600">
                        <option value="">Semua Status</option>
                        <option value="belum-direspon">Belum direspon</option>
                        <option value="belum-terselesaikan">Belum selesai</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table Section dengan desain modern -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-kuning">
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam">No</th>
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam">Foto</th>
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam hidden sm:table-cell">Keterangan</th>
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam hidden md:table-cell">Alamat</th>
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam">Tanggal</th>
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam">Status</th>
                            <th class="px-4 py-4 text-left text-xs sm:text-sm font-semibold text-hitam">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($laporans as $laporan)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                <td class="px-4 py-4">
                                    <img src="{{ asset('storage/' . $laporan->foto_video) }}" alt="Laporan"
                                        class="w-16 h-16 object-cover rounded-lg shadow-md hover:shadow-lg 
                                               transition duration-200 ease-in-out">
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-600 hidden sm:table-cell">{{ $laporan->deskripsi }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600 hidden md:table-cell">{{ $laporan->lokasi }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $laporan->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-4">
                                    @php
                                        $lastTracking = $laporan->tracking->last();
                                    @endphp
                                    @if($laporan->status == 'Menunggu' && $laporan->escalated_to_pusat)
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-600">Belum Respon</span>
                                    @elseif($lastTracking && $lastTracking->status == 'Tidak Terselesaikan')
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600">Tidak Terselesaikan</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    <a href="{{ route('pemerintahpusat.laporan.belumdirespon.detail', $laporan->id) }}"
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-full
                                              bg-yellow-100 text-yellow-600 hover:bg-yellow-200
                                              transition duration-150 ease-in-out"
                                       title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="text-gray-600 font-medium">Tidak ada laporan yang belum direspon</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
