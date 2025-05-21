@extends('Dashboardstlhlogin.Dinas.Template.Template')
@section('title', 'Kinggg')

@section('content')

<section class="bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen py-12">
    <div class="container mx-auto px-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-4 sm:mb-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Detail Laporan Pengaduan</h2>
        <a href="/dinas/laporan/step1" class="text-hitam hover:text-kuning transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
    </div>
    <div class="w-full h-1 bg-yellow-400 mb-4 sm:mb-6"></div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Image Section -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-xl shadow-xl overflow-hidden border-4 border-white">
                    <img id="image-modal-trigger" src="/img/Desain/foto.png" alt="Foto Laporan" class="w-full h-96 md:h-[500px] object-cover rounded-xl transform hover:scale-105 transition duration-500 cursor-pointer">
                </div>
                <!-- Halaman Detail dengan Tambahan Formulir dan Tombol -->
                <div class="container mx-auto my-6">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <!-- Formulir Tindak Lanjut -->
                        <form id="tindakLanjutForm" action="#" method="POST" class="space-y-4" onsubmit="return validateForm()">
                            <!-- Tanggal Pengerjaan -->
                            <div>
                                <label for="tanggal_pengerjaan" class="block text-sm font-medium text-gray-700">Tanggal Pengerjaan*</label>
                                <input type="date" id="tanggal_pengerjaan" name="tanggal_pengerjaan" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="tanggalError" class="text-red-500 text-xs mt-1 hidden">Tanggal pengerjaan harus diisi</p>
                            </div>

                            <!-- Tanggal Estimasi Selesai -->
                            <div>
                                <label for="tanggal_estimasi_selesai" class="block text-sm font-medium text-gray-700">Tanggal Estimasi Selesai*</label>
                                <input type="date" id="tanggal_estimasi_selesai" name="tanggal_estimasi_selesai" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="estimasiError" class="text-red-500 text-xs mt-1 hidden">Tanggal estimasi selesai harus diisi</p>
                            </div>

                            <!-- Deskripsi Detail Pengerjaan -->
                            <div>
                                <label for="deskripsi_pengerjaan" class="block text-sm font-medium text-gray-700">Deskripsi Detail Pengerjaan*</label>
                                <textarea id="deskripsi_pengerjaan" name="deskripsi_pengerjaan" rows="4" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Deskripsikan detail pengerjaan..."></textarea>
                                <p id="deskripsiError" class="text-red-500 text-xs mt-1 hidden">Deskripsi pengerjaan harus diisi</p>
                            </div>

                            <!-- Tombol Proses Laporan -->
                            <div class="mt-4">
                                <button type="submit" class="flex-1 px-6 py-3 w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-600 transition duration-300 flex items-center justify-center shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Proses Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            <div id="image-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 hidden justify-center items-center z-50">
                <div class="relative bg-white p-8 rounded-lg">
                    <span id="close-modal" class="absolute top-2 right-2 text-2xl font-bold text-gray-500 cursor-pointer">&times;</span>
                    <img id="modal-image" src="/img/Desain/foto.png" alt="Foto Laporan" class="w-full h-auto max-h-[90vh] object-contain rounded-xl">
                </div>
            </div>

            <!-- Detail Section -->
            <div class="lg:col-span-5">
                <div class="bg-white rounded-xl shadow-xl p-8 h-full">
                    <!-- Problem Section -->
                    <div class="mb-8 pb-6 border-b border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="bg-yellow-100 p-2 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Permasalahan</h3>
                        </div>
                        <p class="text-gray-700 text-lg pl-14">Jalan Berlubang</p>
                    </div>

                    <!-- Location Section -->
                    <div class="mb-8 pb-6 border-b border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Lokasi</h3>
                        </div>
                        <p class="text-gray-700 text-lg pl-14">Jl.ndm desa padanan, kecamatan pakishaji</p>
                    </div>

                    <!-- Status Section -->
                    <div class="mb-10">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b-2 border-yellow-400 pb-2 inline-block">Status Laporan</h2>

                        <div class="relative mt-8 pl-6">
                            <!-- Vertical Timeline Line -->
                            <div class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-yellow-400 via-gray-200 to-gray-200 rounded-full"></div>

                            <!-- Status Items -->
                            <div class="space-y-10">
                                <!-- Status 1 - Active -->
                                <div class="relative flex items-start group">
                                    <div class="absolute left-0 flex items-center justify-center transform -translate-x-1/2 -translate-y-3">
                                        <div class="h-6 w-6 rounded-full bg-yellow-400 border-4 border-white shadow-lg flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="pl-8">
                                        <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-100 shadow-sm">
                                            <div class="flex items-center">
                                                <span class="flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </span>
                                                <h3 class="text-lg font-semibold text-gray-800">Menunggu Verifikasi</h3>
                                            </div>
                                            <p class="text-gray-600 mt-2 ml-11">Laporan telah diterima dan sedang menunggu verifikasi</p>
                                            <p class="text-sm text-gray-400 mt-2 ml-11">14 Jan 2024 • 09:30 WIB</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status 2 - Next -->
                                <div class="relative flex items-start group">
                                    <div class="absolute left-0 flex items-center justify-center transform -translate-x-1/2 -translate-y-3">
                                        <div class="h-6 w-6 rounded-full bg-gray-200 border-4 border-white shadow-lg"></div>
                                    </div>
                                    <div class="pl-8">
                                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                            <div class="flex items-center">
                                                <span class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                    </svg>
                                                </span>
                                                <h3 class="text-lg font-semibold text-gray-500">Dalam Proses</h3>
                                            </div>
                                            <p class="text-gray-400 mt-2 ml-11">Laporan akan diverifikasi oleh petugas</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status 3 - Future -->
                                <div class="relative flex items-start group">
                                    <div class="absolute left-0 flex items-center justify-center transform -translate-x-1/2 -translate-y-3">
                                        <div class="h-6 w-6 rounded-full bg-gray-200 border-4 border-white shadow-lg"></div>
                                    </div>
                                    <div class="pl-8">
                                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                            <div class="flex items-center">
                                                <span class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </span>
                                                <h3 class="text-lg font-semibold text-gray-500">Selesai</h3>
                                            </div>
                                            <p class="text-gray-400 mt-2 ml-11">Laporan akan ditandai selesai setelah proses</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- form wajib -->
<script>
    function validateForm() {
        let isValid = true;

        // Validasi Tanggal Pengerjaan
        const tanggalPengerjaan = document.getElementById('tanggal_pengerjaan').value;
        const tanggalError = document.getElementById('tanggalError');
        if (!tanggalPengerjaan) {
            tanggalError.classList.remove('hidden');
            isValid = false;
        } else {
            tanggalError.classList.add('hidden');
        }

        // Validasi Tanggal Estimasi Selesai
        const tanggalEstimasi = document.getElementById('tanggal_estimasi_selesai').value;
        const estimasiError = document.getElementById('estimasiError');
        if (!tanggalEstimasi) {
            estimasiError.classList.remove('hidden');
            isValid = false;
        } else {
            estimasiError.classList.add('hidden');
        }

        // Validasi Deskripsi
        const deskripsi = document.getElementById('deskripsi_pengerjaan').value;
        const deskripsiError = document.getElementById('deskripsiError');
        if (!deskripsi.trim()) {
            deskripsiError.classList.remove('hidden');
            isValid = false;
        } else {
            deskripsiError.classList.add('hidden');
        }

        // Jika valid, lanjutkan ke halaman berikutnya
        if (isValid) {
            window.location.href = '/dinas/laporan/step4/diproses';
        }

        return false; // Mencegah form submit default
    }

    // Tambahkan event listener untuk validasi real-time
    document.getElementById('tanggal_pengerjaan').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('tanggalError').classList.add('hidden');
        }
    });

    document.getElementById('tanggal_estimasi_selesai').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('estimasiError').classList.add('hidden');
        }
    });

    document.getElementById('deskripsi_pengerjaan').addEventListener('input', function() {
        if (this.value.trim()) {
            document.getElementById('deskripsiError').classList.add('hidden');
        }
    });
</script>

<!-- script gambar -->
<script>
    // Get the modal
    const modal = document.getElementById("image-modal");
    const modalImage = document.getElementById("modal-image");
    const triggerImage = document.getElementById("image-modal-trigger");
    const closeModal = document.getElementById("close-modal");

    // When the image is clicked, open the modal
    triggerImage.addEventListener("click", function() {
        modal.classList.remove("hidden");
        modalImage.src = triggerImage.src; // Set the image source in modal to be the same as the clicked image
    });

    // When the user clicks the close button, close the modal
    closeModal.addEventListener("click", function() {
        modal.classList.add("hidden");
    });

    // Optional: Close modal if clicked outside of the image
    modal.addEventListener("click", function(e) {
        if (e.target === modal) {
            modal.classList.add("hidden");
        }
    });
</script>



@endsection