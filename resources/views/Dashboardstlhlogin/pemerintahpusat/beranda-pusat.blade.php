@extends('Dashboardstlhlogin.pemerintahpusat.template.template')
@section('title', 'pusat')

@section('content')


<section class="min-h-screen">
    <div class="container mx-auto px-8 py-4">
        <!-- Header Section -->
    <div class="flex justify-between items-center mb-2 sm:mb-3">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 ">Beranda</h2>
    </div>
    <p class="font-light mb-2">Penilaian Dinas terhadap penyelesaian Laporan </p>
    <div class="w-full h-1 bg-yellow-400 mb-4 sm:mb-6"></div>

    <!-- Main Content Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mt-6">
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KECAMATAN</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">JENIS</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PERSENTASE</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">1</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Ampelgading</td>
                        <td class="py-4 px-4 whitespace-nowrap">Batu</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                                <span class="ml-4">75%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">2</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Bantur</td>
                        <td class="py-4 px-4 whitespace-nowrap">Batu Salah</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 85%"></div>
                                </div>
                                <span class="ml-4">85%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">3</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Lawang</td>
                        <td class="py-4 px-4 whitespace-nowrap">Sangat Batu</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 90%"></div>
                                </div>
                                <span class="ml-4">90%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">4</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Gondanglegi</td>
                        <td class="py-4 px-4 whitespace-nowrap">Kurang</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 40%"></div>
                                </div>
                                <span class="ml-4">40%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">5</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Dau</td>
                        <td class="py-4 px-4 whitespace-nowrap">Kurang</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 30%"></div>
                                </div>
                                <span class="ml-4">30%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 6 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">6</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Dampit</td>
                        <td class="py-4 px-4 whitespace-nowrap">Batu</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                                <span class="ml-4">75%</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 7 -->
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">7</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">Pakis</td>
                        <td class="py-4 px-4 whitespace-nowrap">Sangat Batu</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 90%"></div>
                                </div>
                                <span class="ml-4">90%</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <p class="text-sm text-gray-600">1 - 8 of 30 items</p>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">Previous</button>
                <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
