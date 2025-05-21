@extends('Dashboardstlhlogin.Admin.Template.Template')

@php use Illuminate\Support\Str; @endphp

@section('content')
<!-- Search and Filter Section -->
<div class="container mx-auto px-4 sm:px-6 py-4">
    <form method="GET" action="{{ route('admin.laporan') }}" class="flex flex-col sm:flex-row gap-4 mb-6">
        <div class="relative flex-grow">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari laporan..." 
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kuning focus:border-transparent text-sm">
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <div class="w-full sm:w-48">
            <select name="status" onchange="this.form.submit()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kuning focus:border-transparent bg-white text-sm">
                <option value="">Semua Status</option>
                <option value="menunggu_verifikasi_admin" {{ request('status') == 'menunggu_verifikasi_admin' ? 'selected' : '' }}>Menunggu Verifikasi Admin</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
    </form>

    <!-- Mobile View Cards -->
    <div class="block sm:hidden space-y-4">
        @foreach($laporans as $laporan)
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('storage/'.$laporan->foto_video) }}" alt="Laporan" class="w-20 h-20 object-cover rounded-lg">
                <div class="flex-grow">
                    <div class="text-sm font-medium">{{ $laporan->deskripsi }}</div>
                    <div class="text-xs text-gray-500 mt-1">{{ $laporan->lokasi }}</div>
                    <div class="text-xs text-gray-500">{{ $laporan->created_at->format('d/m/Y') }}</div>
                    <div class="mt-2">
                        @php
                            $trackProses = $laporan->tracking->last();
                        @endphp
                        @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                            <span class="px-3 py-1 text-sm font-medium text-green-900 bg-green-100 rounded-full">Selesai</span>
                        @elseif($trackProses && $trackProses->sub_status == 'menunggu_verifikasi_admin')
                            <span class="px-3 py-1 text-sm font-medium text-blue-900 bg-blue-100 rounded-full">Menunggu Verifikasi Admin</span>
                        @endif
                    </div>
                </div>
                @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                    <a href="{{ route('admin.laporan.selesai', ['id' => $laporan->id]) }}" class="text-kuning hover:text-blue-800" title="Detail">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('admin.laporan.detail', ['id' => $laporan->id]) }}" class="text-kuning hover:text-blue-800" title="Detail">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 hover:text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Desktop/Tablet View Table -->
    <div class="hidden sm:block bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-kuning">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">No</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">Foto</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">Keterangan</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">Alamat</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">Tanggal</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-hitam">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($laporans as $laporan)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/'.$laporan->foto_video) }}" width="60">
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $laporan->deskripsi }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words" style="max-width: 300px; word-break: break-word;">
                        {{ \Illuminate\Support\Str::words($laporan->lokasi, 15, '...') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $laporan->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        @php
                            $trackProses = $laporan->tracking->last();
                        @endphp
                        @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                            <span class="px-3 py-1 text-sm font-medium text-green-900 bg-green-100 rounded-full">Selesai</span>
                        @elseif($trackProses && $trackProses->sub_status == 'menunggu_verifikasi_admin')
                            <span class="px-3 py-1 text-sm font-medium text-blue-900 bg-blue-100 rounded-full">Menunggu Verifikasi Admin</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($laporan->status == 'Selesai' || ($trackProses && $trackProses->status == 'Selesai'))
                            <a href="{{ route('admin.laporan.selesai', ['id' => $laporan->id]) }}" class="text-kuning hover:text-blue-800" title="Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('admin.laporan.detail', ['id' => $laporan->id]) }}" class="text-kuning hover:text-blue-800" title="Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 hover:text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7z" />
                                </svg>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection