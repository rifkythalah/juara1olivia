@extends('Dashboardstlhlogin.masyarakat.templatemasyarakat')
@section('title', 'Edit Alamat & Deskripsi Laporan')

@section('content')

<section class="py-8">
    {{-- Header Pengaduan --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mb-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Pengaduan</h2>
        <div class="w-full h-1 bg-yellow-400"></div>
    </div>

    {{-- Konten Utama --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center">
        <div class="max-w-lg w-full bg-white rounded-xl shadow-md overflow-hidden">
            {{-- Judul Form --}}
            <div class="p-4 text-center">
                <h1 class="text-lg sm:text-xl font-bold text-gray-800">Edit Alamat & Deskripsi Laporan</h1>
            </div>

            {{-- Konten Form --}}
            <div class="p-6">
                <!-- Preview Foto -->
                <div class="mb-6">
                    <img id="previewImage" class="w-full h-auto object-contain rounded-lg border ring-4 ring-kuning border-kuning" src="" alt="Preview foto laporan">
                    <div class="mt-4 flex justify-center">
                        {{-- Tombol Ambil Foto Ulang --}}
                        <button onclick="window.location.href='/masyarakat/pengaduan/buat/1'" class="flex items-center gap-2 bg-yellow-400 hover:bg-putih hover:text-kuning hover:ring-2 ring-kuning text-black font-semibold py-2 px-4 rounded-lg text-sm shadow cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13l-7 7-7-7m14-8l-7 7-7-7" /> {{-- Icon pensil/edit --}}
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            Ambil foto ulang
                        </button>
                    </div>
                </div>

                <!-- Form Input Area -->
                <div class= "p-5 rounded-lg shadow-inner">
                    <form id="reportForm" action="/masyarakat/pengaduan/buat/3" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" id="imageData" name="imageData">
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        {{-- Alamat --}}
                        <div>
                            <label for="alamat" class="block text-sm font-bold text-gray-700 mb-1">Edit Alamat Laporan Jika tidak sesuai dengan Gmaps <span class="text-red-500">*</span></label>
                            <textarea id="alamat" name="alamat" placeholder="Memuat alamat otomatis..." class="w-full p-3 border border-gray-300 rounded-lg resize-none bg-white text-sm" rows="3"></textarea>
                            {{-- Garis pemisah --}}
                            <hr class="border-yellow-400 my-2">
                            <small class="text-xs text-gray-600 italic">Alamat diisi otomatis berdasarkan lokasi foto. Anda bisa mengeditnya jika perlu.</small>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label for="deskripsi" class="block text-sm font-bold text-gray-700 mb-1">Deskripsikan detail Permasalahan laporan</label>
                            <textarea id="deskripsi" name="deskripsi" placeholder="Contoh : Jalan Rusak berlubang sangat parah." class="w-full p-3 border border-gray-300 rounded-lg resize-none bg-white text-sm" rows="4"></textarea>
                             {{-- Garis pemisah --}}
                             <hr class="border-yellow-400 my-2">
                        </div>
                    </form>
                </div>

                 {{-- Tombol Lanjutkan --}}
                 <div class="mt-6 flex justify-end">
                    <button
                        type="button"
                        onclick="prepareAndSubmit()"
                        class="font-bold py-2 px-6  transition-colors flex items-center justify-center gap-2 shadow bg-kuning hover:ring-2 ring-yellow-300 hover:bg-white hover:text-kuning  text-white  rounded-full cursor-pointer"
                    >
                        Lanjutkan
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                 </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const previewImage = document.getElementById('previewImage');
        const imageDataInput = document.getElementById('imageData');
        const latitudeInput = document.getElementById('latitude');
        const longitudeInput = document.getElementById('longitude');
        const alamatTextarea = document.getElementById('alamat');

        // Ambil data dari localStorage
        const capturedImageData = localStorage.getItem('capturedImageData');
        const capturedLatitude = localStorage.getItem('capturedLatitude'); // <-- Mengambil Latitude dari penyimpanan
        const capturedLongitude = localStorage.getItem('capturedLongitude'); // <-- Mengambil Longitude dari penyimpanan

        // Tampilkan Gambar
        if (capturedImageData) {
            previewImage.src = capturedImageData;
            imageDataInput.value = capturedImageData; // Tetap simpan data gambar di input hidden
        } else {
            console.log('Tidak ada data gambar ditemukan di localStorage.');
            previewImage.alt = 'Tidak ada preview gambar';

        }

        // Isi Latitude dan Longitude (dan coba ambil alamat)
        if (capturedLatitude && capturedLongitude) {
            latitudeInput.value = capturedLatitude;
            longitudeInput.value = capturedLongitude;
            // Panggil fungsi untuk mengambil alamat berdasarkan koordinat yang disimpan
            fetchAddressFromCoordinates(capturedLatitude, capturedLongitude); // <-- Mengambil alamat sesuai koordinat foto
        } else {
            alamatTextarea.placeholder = 'Koordinat lokasi tidak ditemukan. Isi alamat manual.';
            console.log('Koordinat (latitude/longitude) tidak ditemukan di localStorage.');
        }
    });

    // Fungsi untuk mengambil alamat dari koordinat menggunakan Nominatim API
    async function fetchAddressFromCoordinates(lat, lon) {
        const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;
        const alamatTextarea = document.getElementById('alamat');
        alamatTextarea.placeholder = 'Mencari alamat...'; // Update placeholder

        try {
            const response = await fetch(apiUrl, {
                headers: {
                    'Accept': 'application/json',
                    'Accept-Language': 'id-ID,id;q=0.9' // Request bahasa Indonesia jika tersedia
                }
            });
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();

            if (data && data.display_name) {
                alamatTextarea.value = data.display_name; // <-- Mengisi textarea dengan alamat dari API
            } else {
                alamatTextarea.value = ''; // Kosongkan jika tidak ditemukan
                alamatTextarea.placeholder = 'Alamat tidak ditemukan. Silakan isi manual.';
                console.warn('Tidak dapat menemukan alamat untuk koordinat:', lat, lon, data);
            }
        } catch (error) {
            alamatTextarea.value = ''; // Kosongkan jika error
            alamatTextarea.placeholder = 'Gagal mengambil alamat. Silakan isi manual.';
            console.error('Error fetching address:', error);
        }
    }

    function prepareAndSubmit() {
        // Ambil data dari form
        const imageData = document.getElementById('imageData').value;
        const latitude = document.getElementById('latitude').value;
        const longitude = document.getElementById('longitude').value;
        const alamat = document.getElementById('alamat').value;
        const deskripsi = document.getElementById('deskripsi').value;

        // Validasi sederhana sebelum lanjut
        if (!alamat.trim()) {
            alert('Alamat laporan tidak boleh kosong.');
            document.getElementById('alamat').focus();
            return;
        }
        if (!deskripsi.trim()) {
            alert('Harap isi deskripsi permasalahan laporan.');
            document.getElementById('deskripsi').focus();
            return;
        }

        // Simpan ke localStorage
        localStorage.setItem('capturedImageData', imageData);
        localStorage.setItem('capturedLatitude', latitude);
        localStorage.setItem('capturedLongitude', longitude);
        localStorage.setItem('capturedAlamat', alamat);
        localStorage.setItem('capturedDeskripsi', deskripsi);

        // Redirect ke BuatLaporan3 (GET)
        window.location.href = '/masyarakat/pengaduan/buat/3';
    }

</script>

@endsection
