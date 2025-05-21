@extends('Dashboardstlhlogin.masyarakat.AktivitasMasyarakat')
@section('title', 'laporansaya')

@section('Laporan')

<section class="container mx-auto px-8 py-4">
    <div class="flex items-center gap-2 sm:gap-4 mb-3">
        <h2 class="text-lg sm:text-xl md:text-[20px] font-bold text-hitam whitespace-wrap">
            Statik peringkat layanan Dinas terhadap penyelesaian pengaduan
        </h2>
        <span class="block w-full sm:w-[200px] h-[3px] sm:h-[4px] bg-kuning"></span>
    </div>
<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4 md:mb-0">Statistik Penilaian Dinas</h3>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Dinas</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PERSENTASE</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Row 1 -->
                <tr>
                    <td class="py-4 px-4 whitespace-nowrap">1</td>
                    <td class="py-4 px-4 whitespace-nowrap font-medium">Dinas Bina Marga</td>
                    <td class="py-4 px-4 whitespace-nowrap">B+</td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="ml-4">75%</span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</section>

@endsection
