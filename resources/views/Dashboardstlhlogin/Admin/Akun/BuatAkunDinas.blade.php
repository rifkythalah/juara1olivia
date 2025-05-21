@extends('Dashboardstlhlogin.Admin.Template.Template')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Judul Halaman -->
    <div class="mb-6">
        <div class="flex justify-between items-center mb-4 sm:mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Akun Dinas</h2>
            <a href="/admin/akun" class="text-hitam hover:text-kuning transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
        <div class="w-full h-1 bg-kuning mt-2"></div>
    </div>

    <!-- Form Container -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-kuning rounded-2xl p-8 shadow-lg">
            <h2 class="text-2xl font-bold text-hitam mb-6">Akun Dinas</h2>
            
            <form id="formBuatAkun" action="{{ route('admin.akun.dinas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div class="space-y-6">
                        <!-- Nama Dinas -->
                        <div class="space-y-2">
                            <label for="name" class="block text-hitam font-medium">Nama Dinas</label>
                            <input type="text" id="name" name="name" placeholder="Nama Dinas" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- Username -->
                        <div class="space-y-2">
                            <label for="username" class="block text-hitam font-medium">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="block text-hitam font-medium">Email</label>
                            <input type="email" id="email" name="email" placeholder="dinas@example.com" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                            <p class="text-sm text-gray-500">Gunakan email yang belum terdaftar</p>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="space-y-2">
                            <label for="nomor_telepon" class="block text-hitam font-medium">Nomor Telepon</label>
                            <input type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="081234567890" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="block text-hitam font-medium">Password</label>
                            <input type="password" id="password" name="password" placeholder="********" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- Wilayah -->
                        <div class="space-y-2">
                            <label for="wilayah" class="block text-hitam font-medium">Wilayah</label>
                            <input type="text" id="wilayah" name="wilayah" placeholder="Nama Wilayah" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-6">
                        <!-- Latitude -->
                        <div class="space-y-2">
                            <label for="latitude" class="block text-hitam font-medium">Latitude</label>
                            <input type="number" step="any" id="latitude" name="latitude" placeholder="Latitude" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- Longitude -->
                        <div class="space-y-2">
                            <label for="longitude" class="block text-hitam font-medium">Longitude</label>
                            <input type="number" step="any" id="longitude" name="longitude" placeholder="Longitude" required
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- GeoJSON File -->
                        <div class="space-y-2">
                            <label for="polygon_wilayah" class="block text-hitam font-medium">File GeoJSON Wilayah</label>
                            <input type="file" id="polygon_wilayah" name="polygon_wilayah" accept=".json,.geojson"
                                class="w-full px-4 py-3 rounded-lg bg-white border-none focus:ring-2 focus:ring-hitam">
                        </div>

                        <!-- Hidden fields for grade and point -->
                        <input type="hidden" name="grade" value="A">
                        <input type="hidden" name="point" value="0">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" id="submitBtn" class="w-full bg-white text-hitam font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition duration-200">
                        Buat Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Sukses -->
<div id="successModal" class="fixed inset-0  hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-auto text-center">
            <div class="mb-4">
                <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Pendaftaran Berhasil!</h3>
            <p class="text-gray-500 mb-6">Akun baru telah berhasil dibuat.</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formBuatAkun');
    const submitBtn = document.getElementById('submitBtn');
    const successModal = document.getElementById('successModal');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Disable submit button
        submitBtn.disabled = true;
        submitBtn.textContent = 'Memproses...';
        
        const formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    if (data.errors) {
                        // Format validation errors
                        const errorMessages = Object.entries(data.errors)
                            .map(([field, messages]) => {
                                const fieldName = field.charAt(0).toUpperCase() + field.slice(1);
                                return `${fieldName}: ${messages.join(', ')}`;
                            })
                            .join('\n');
                        throw new Error(errorMessages);
                    }
                    throw new Error(data.message || 'Terjadi kesalahan');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.message) {
                successModal.classList.remove('hidden');
                setTimeout(() => {
                    window.location.href = '/admin/akun';
                }, 2000);
            }
        })
        .catch(error => {
            alert(error.message);
            submitBtn.disabled = false;
            submitBtn.textContent = 'Buat Akun';
        });
    });

    // Close modal when clicking outside
    successModal.addEventListener('click', function(event) {
        if (event.target === this) {
            this.classList.add('hidden');
        }
    });
});
</script>
@endsection