@extends('Dashboardstlhlogin.Admin.Template.Template')
@section('title', 'Dashboard Admin - LAPOR PAL')
@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-hitam mb-8">Dashboard Admin</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Statistik Laporan -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-hitam mb-4">Statistik Laporan</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Total Laporan</span>
                    <span class="font-bold text-hitam">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Laporan Baru</span>
                    <span class="font-bold text-hitam">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Laporan Diproses</span>
                    <span class="font-bold text-hitam">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Laporan Selesai</span>
                    <span class="font-bold text-hitam">0</span>
                </div>
            </div>
        </div>

        <!-- Manajemen Akun -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-hitam mb-4">Manajemen Akun</h2>
            <div class="space-y-4">
                <a href="{{ route('admin.akun') }}" class="block p-4 bg-kuning hover:bg-opacity-90 rounded-lg transition-all">
                    <span class="font-semibold text-hitam">Kelola Akun</span>
                </a>
                <a href="{{ route('admin.akun.pusat') }}" class="block p-4 bg-kuning hover:bg-opacity-90 rounded-lg transition-all">
                    <span class="font-semibold text-hitam">Buat Akun Pemerintah Pusat</span>
                </a>
                <a href="{{ route('admin.akun.dinas') }}" class="block p-4 bg-kuning hover:bg-opacity-90 rounded-lg transition-all">
                    <span class="font-semibold text-hitam">Buat Akun Dinas</span>
                </a>
            </div>
        </div>

        <!-- Notifikasi -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-hitam mb-4">Notifikasi</h2>
            <div class="space-y-4">
                <a href="{{ route('admin.notifikasi') }}" class="block p-4 bg-kuning hover:bg-opacity-90 rounded-lg transition-all">
                    <span class="font-semibold text-hitam">Lihat Semua Notifikasi</span>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection