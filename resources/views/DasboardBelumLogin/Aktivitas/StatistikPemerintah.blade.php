@extends('DasboardBelumLogin.AktivitasBelumLogin')
@section('title', 'laporansaya')

@section('Laporan')



<section class="container mx-auto px-2 sm:px-4 py-4 mb-52">
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4 mb-3">
        <h2 class="text-base sm:text-lg md:text-xl font-bold text-hitam whitespace-wrap">
            Statik peringkat layanan Daerah terhadap penyelesaian pengaduan
        </h2>
        <span class="block w-full sm:w-[200px] h-[3px] sm:h-[4px] bg-kuning"></span>
    </div>
    <!-- Table Container Responsive -->
    <div class="w-full overflow-x-auto bg-white p-2 sm:p-4 rounded-lg shadow-sm">
        <div class="min-w-full overflow-hidden">
            <table class="min-w-[500px] sm:min-w-full divide-y divide-gray-200 text-xs sm:text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-2 sm:py-4 px-2 sm:px-6 text-left text-[10px] sm:text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="py-2 sm:py-4 px-2 sm:px-6 text-left text-[10px] sm:text-xs font-semibold text-gray-600 uppercase tracking-wider">Kecamatan</th>
                        <th class="py-2 sm:py-4 px-2 sm:px-6 text-left text-[10px] sm:text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis</th>
                        <th class="py-2 sm:py-4 px-2 sm:px-6 text-left text-[10px] sm:text-xs font-semibold text-gray-600 uppercase tracking-wider">Persentase</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                        <td class="py-2 sm:py-4 px-2 sm:px-6">1</td>
                        <td class="py-2 sm:py-4 px-2 sm:px-6 font-medium text-gray-900">Ampelgading</td>
                        <td class="py-2 sm:py-4 px-2 sm:px-6 text-gray-600">Batu</td>
                        <td class="py-2 sm:py-4 px-2 sm:px-6">
                            <div class="flex items-center space-x-2 sm:space-x-4">
                                <div class="flex-1 bg-gray-200 rounded-full h-2 sm:h-2.5 max-w-xs">
                                    <div class="bg-yellow-500 h-2 sm:h-2.5 rounded-full transition-all duration-500"
                                         style="width: 75%"></div>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold text-gray-700">75%</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
