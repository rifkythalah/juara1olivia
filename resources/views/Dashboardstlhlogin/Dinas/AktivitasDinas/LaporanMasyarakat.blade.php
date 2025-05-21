@extends('Dashboardstlhlogin.Dinas.DasboardDinas')
@section('title', 'laporansaya')

@section('Laporan')

<section class="bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search and Filter Section -->
        <div class="max-w-6xl mx-auto mb-8">
            <form method="GET" action="{{ route('dinas.laporan.masyarakat') }}" class="flex flex-col md:flex-row gap-4">
                <div class="relative flex-1">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari laporan..."
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <svg class="absolute right-3 top-3.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <select name="status" class="px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="">Semua Status</option>
                    <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Di Proses" {{ request('status') == 'Di Proses' ? 'selected' : '' }}>Di Proses</option>
                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                <button type="submit" class="px-6 py-3 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition">
                    Terapkan
                </button>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Desktop Table -->
            <div class="hidden md:block">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-yellow-400">
                        <tr>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">No</th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">Foto</th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">Keterangan</th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">Alamat</th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">Tanggal</th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">Status</th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-black uppercase border">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($laporanUtama as $laporan)
                            <tr>
                                <td class="px-4 py-4 text-center align-top">{{ $loop->iteration }}</td>
                                <td class="px-4 py-4 text-center align-top">
                                    <img src="{{ asset('storage/'.$laporan->foto_video) }}" alt="Foto" class="w-12 h-12 object-cover rounded mx-auto">
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-700 align-top" style="max-width: 180px; white-space: normal; word-break: break-word;">
                                    {{ \Illuminate\Support\Str::words($laporan->deskripsi, 10, '') }}
                                    @if(\Illuminate\Support\Str::wordCount($laporan->deskripsi) > 10)
                                        <br><span class="text-xs text-gray-400">...</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-700 align-top" style="max-width: 180px; white-space: normal; word-break: break-word;">
                                    {{ \Illuminate\Support\Str::words($laporan->lokasi, 10, '') }}
                                    @if(\Illuminate\Support\Str::wordCount($laporan->lokasi) > 10)
                                        <br><span class="text-xs text-gray-400">...</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-center align-top text-gray-500">{{ $laporan->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-4 text-center align-top font-semibold"
                                    @if($laporan->status == 'Menunggu')
                                        style="color: #F9A825;"  {{-- Kuning --}}
                                    @elseif($laporan->status == 'Di Proses')
                                        @php
                                            $trackProses = $laporan->tracking->where('status', 'Di Proses')->last();
                                        @endphp
                                        @if($trackProses && $trackProses->sub_status == 'menunggu_verifikasi_admin')
                                            style="color: #093456;"  {{-- Biru Tua --}}
                                        @else
                                            style="color: #2196F3;"  {{-- Biru --}}
                                        @endif
                                    @elseif($laporan->status == 'Selesai')
                                        style="color: #43A047;"  {{-- Hijau --}}
                                    @elseif($laporan->status == 'Ditolak')
                                        style="color: #E53935;"  {{-- Merah --}}
                                    @endif
                                >
                                    @php
                                        $trackProses = $laporan->tracking->last();
                                    @endphp
                                    @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                                        <span class="px-3 py-1 text-sm font-medium text-green-900 bg-green-100 rounded-full">Selesai</span>
                                    @elseif($laporan->status == 'Ditolak')
                                        <span class="px-3 py-1 text-sm font-medium text-red-900 bg-red-100 rounded-full">Ditolak</span>
                                    @elseif($laporan->status == 'Menunggu')
                                        <span class="px-3 py-1 text-sm font-medium text-yellow-900 bg-yellow-100 rounded-full">Menunggu</span>
                                    @elseif($trackProses && $trackProses->sub_status == 'menunggu_verifikasi_admin')
                                        <span class="px-3 py-1 text-sm font-medium text-blue-900 bg-blue-100 rounded-full">Menunggu Verifikasi Admin</span>
                                    @elseif($trackProses && $trackProses->sub_status == 'proses')
                                        <span class="px-3 py-1 text-sm font-medium text-blue-900 bg-blue-100 rounded-full">Sedang Diproses</span>
                                    @endif
                                    @if($trackProses && $trackProses->status == 'Tidak Terselesaikan')
                                        <span class="px-3 py-1 text-sm font-medium text-red-900 bg-red-100 rounded-full">Terlambat Terselesaikan</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-center align-top">
                                    @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                                        <a href="{{ route('dinas.laporan.selesai', $laporan->id) }}" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                            </svg>
                                        </a>
                                    @elseif($laporan->status == 'Ditolak')
                                        <a href="{{ route('dinas.laporan.step2.ditolak', $laporan->id) }}" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                            </svg>
                                        </a>
                                    @elseif($laporan->status == 'Menunggu')
                                        <a href="{{ route('dinas.laporan.detail', $laporan->id) }}" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                            </svg>
                                        </a>
                                    @elseif($laporan->status == 'Di Proses')
                                        @php
                                            $penyelesaian = $laporan->penyelesaian;
                                            $trackProses = $laporan->tracking->where('status', 'Di Proses')->last();
                                        @endphp
                                        @if($trackProses && $trackProses->sub_status == 'menunggu_verifikasi_admin')
                                            <a href="{{ route('dinas.laporan.step7.lanjutan', $laporan->id) }}" title="Lihat Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                                </svg>
                                            </a>
                                        @elseif($penyelesaian)
                                            <a href="{{ route('dinas.laporan.lanjutan', $laporan->id) }}" title="Lihat Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                                </svg>
                                            </a>
                                        @else
                                            <a href="{{ route('dinas.laporan.step4.diproses', $laporan->id) }}" title="Lihat Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                                </svg>
                                            </a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="md:hidden space-y-4 p-4">
                @foreach($laporanUtama as $laporan)
                    <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                        <div class="flex items-start space-x-4">
                            <img src="{{ asset('storage/'.$laporan->foto_video) }}" alt="Foto {{ $loop->iteration }}" class="w-16 h-16 object-cover rounded-md border border-gray-200">
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-medium text-gray-900">{{ $laporan->deskripsi }}</h3>
                                    <div>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                            @php
                                                $trackProses = $laporan->tracking->last();
                                            @endphp
                                            @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                                                <span class="px-3 py-1 text-sm font-medium text-green-900 bg-green-100 rounded-full">Selesai</span>
                                            @elseif($laporan->status == 'Ditolak')
                                                <span class="px-3 py-1 text-sm font-medium text-red-900 bg-red-100 rounded-full">Ditolak</span>
                                            @elseif($laporan->status == 'Menunggu')
                                                <span class="px-3 py-1 text-sm font-medium text-yellow-900 bg-yellow-100 rounded-full">Menunggu</span>
                                            @elseif($trackProses && $trackProses->sub_status == 'menunggu_verifikasi_admin')
                                                <span class="px-3 py-1 text-sm font-medium text-blue-900 bg-blue-100 rounded-full">Menunggu Verifikasi Admin</span>
                                            @elseif($trackProses && $trackProses->sub_status == 'proses')
                                                <span class="px-3 py-1 text-sm font-medium text-blue-900 bg-blue-100 rounded-full">Sedang Diproses</span>
                                            @endif
                                            @if($trackProses && $trackProses->status == 'Tidak Terselesaikan')
                                                <span class="px-3 py-1 text-sm font-medium text-red-900 bg-red-100 rounded-full">Terlambat Terselesaikan</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">{{ $laporan->lokasi }}</p>
                                <p class="text-sm text-gray-500">{{ $laporan->created_at->format('d/m/Y') }}</p>
                                <a href="#" class="mt-2 inline-block text-sm text-blue-600 hover:text-blue-900">Lihat detail →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@endsection
