@extends('Dashboardstlhlogin.pemerintahpusat.template.template')
@section('title', 'pusat')

@section('content')
<section class="min-h-screen">
    <div class="container mx-auto px-4 sm:px-8 py-8">
        <!-- Header Section dengan efek gradien -->
        <div class="bg-kuning rounded-lg p-6 shadow-lg mb-8">
            <h2 class="text-3xl sm:text-4xl font-bold text-hitam mb-2">Beranda</h2>
            <p class="text-hitam/80">Pantau statistik seluruh daerah</p>
        </div>

        <!-- Main Content Section -->
        <div class="bg-white rounded-xl shadow-xl p-6 sm:p-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div class="flex items-center space-x-3">
                    <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-800">Statistik Seluruh Daerah</h3>
                </div>
            </div>

            <!-- Table dan Chart Container dengan Grid Responsif -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-6 lg:gap-8">
                <!-- Table Container -->
                <div class="w-full overflow-x-auto bg-white p-4 rounded-lg shadow-sm">
                    <div class="min-w-full overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kecamatan</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Persentase</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="py-4 px-6">1</td>
                                    <td class="py-4 px-6 font-medium text-gray-900">Ampelgading</td>
                                    <td class="py-4 px-6 text-gray-600">Batu</td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-1 bg-gray-200 rounded-full h-2.5 max-w-xs">
                                                <div class="bg-yellow-500 h-2.5 rounded-full transition-all duration-500"
                                                     style="width: 75%"></div>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-700">75%</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Chart Container dengan Responsif Height -->
                <div class="w-full bg-white p-4 rounded-lg shadow-sm min-h-[300px] md:min-h-[400px] flex flex-col">
                    <div class="flex-grow relative">
                        <canvas id="statistikChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                @push('scripts')
                <script src="{{ asset('js/chart.js/chart.umd.min.js') }}"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('statistikChart').getContext('2d');
                        
                        const chartConfig = {
                            type: 'doughnut',
                            data: {
                                labels: ['Ampelgading', 'Daerah 2', 'Daerah 3', 'Daerah 4'],
                                datasets: [{
                                    data: [75, 25, 35, 45],
                                    backgroundColor: [
                                        '#FF92A5',  // Pink
                                        '#FFD66B',  // Kuning
                                        '#7FD6C2',  // Turquoise
                                        '#74B3FF'   // Biru
                                    ],
                                    borderWidth: 0,
                                    hoverOffset: 4
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            boxWidth: window.innerWidth < 768 ? 10 : 12,
                                            padding: window.innerWidth < 768 ? 10 : 20,
                                            font: {
                                                size: window.innerWidth < 768 ? 10 : 12
                                            }
                                        }
                                    },
                                    title: {
                                        display: true,
                                        text: 'Statistik Daerah',
                                        font: {
                                            size: window.innerWidth < 768 ? 14 : 16,
                                            weight: 'bold'
                                        },
                                        padding: {
                                            bottom: window.innerWidth < 768 ? 5 : 10
                                        }
                                    },
                                    subtitle: {
                                        display: true,
                                        text: 'Persentase per Kecamatan',
                                        font: {
                                            size: window.innerWidth < 768 ? 12 : 14
                                        },
                                        padding: {
                                            bottom: window.innerWidth < 768 ? 10 : 20
                                        }
                                    }
                                },
                                cutout: '60%',
                                layout: {
                                    padding: {
                                        top: window.innerWidth < 768 ? 5 : 10,
                                        bottom: window.innerWidth < 768 ? 5 : 10
                                    }
                                }
                            }
                        };
                        
                        const chart = new Chart(ctx, chartConfig);
                        
                        // Resize handler untuk responsivitas
                        window.addEventListener('resize', function() {
                            chart.options.plugins.legend.labels.boxWidth = window.innerWidth < 768 ? 10 : 12;
                            chart.options.plugins.legend.labels.padding = window.innerWidth < 768 ? 10 : 20;
                            chart.options.plugins.legend.labels.font.size = window.innerWidth < 768 ? 10 : 12;
                            chart.options.plugins.title.font.size = window.innerWidth < 768 ? 14 : 16;
                            chart.options.plugins.subtitle.font.size = window.innerWidth < 768 ? 12 : 14;
                            chart.update();
                        });
                    });
                </script>
                @endpush
            </div>

            <!-- Chart JS Script dengan Konfigurasi Responsif -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('statistikChart').getContext('2d');
                    
                    const chartConfig = {
                        type: 'doughnut',
                        data: {
                            labels: ['Ampelgading', 'Daerah 2', 'Daerah 3', 'Daerah 4'],
                            datasets: [{
                                data: [75, 25, 35, 45],
                                backgroundColor: [
                                    '#FF92A5',  // Pink
                                    '#FFD66B',  // Kuning
                                    '#7FD6C2',  // Turquoise
                                    '#74B3FF'   // Biru
                                ],
                                borderWidth: 0,
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        boxWidth: window.innerWidth < 768 ? 10 : 12,
                                        padding: window.innerWidth < 768 ? 10 : 20,
                                        font: {
                                            size: window.innerWidth < 768 ? 10 : 12
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Statistik Daerah',
                                    font: {
                                        size: window.innerWidth < 768 ? 14 : 16,
                                        weight: 'bold'
                                    },
                                    padding: {
                                        bottom: window.innerWidth < 768 ? 5 : 10
                                    }
                                },
                                subtitle: {
                                    display: true,
                                    text: 'Persentase per Kecamatan',
                                    font: {
                                        size: window.innerWidth < 768 ? 12 : 14
                                    },
                                    padding: {
                                        bottom: window.innerWidth < 768 ? 10 : 20
                                    }
                                }
                            },
                            cutout: '60%',
                            layout: {
                                padding: {
                                    top: window.innerWidth < 768 ? 5 : 10,
                                    bottom: window.innerWidth < 768 ? 5 : 10
                                }
                            }
                        }
                    };

                    const chart = new Chart(ctx, chartConfig);

                    // Resize handler untuk responsivitas
                    window.addEventListener('resize', function() {
                        chart.options.plugins.legend.labels.boxWidth = window.innerWidth < 768 ? 10 : 12;
                        chart.options.plugins.legend.labels.padding = window.innerWidth < 768 ? 10 : 20;
                        chart.options.plugins.legend.labels.font.size = window.innerWidth < 768 ? 10 : 12;
                        chart.options.plugins.title.font.size = window.innerWidth < 768 ? 14 : 16;
                        chart.options.plugins.subtitle.font.size = window.innerWidth < 768 ? 12 : 14;
                        chart.update();
                    });
                });
            </script>
        </div>
    </div>
</section>

@endsection
