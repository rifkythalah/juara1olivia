@extends('Dashboardstlhlogin.masyarakat.templatemasyarakat')
@section('title', 'Ubah Profil')

@section('content')

<section class="profil">
    <div class="container mx-auto px-2 py-6 flex flex-col items-center mt-6">

        <!-- Profile Info Title -->
        <div class="w-full max-w-2xl flex flex-col items-start mb-6">
            <span class="text-2xl font-bold text-black mb-4">Profile Information</span>
        </div>

        <!-- Profile Form Card -->
        <div class="w-full max-w-2xl bg-kuning border-2 border-yellow-500 rounded-3xl shadow-lg overflow-hidden mb-8 px-8 py-8 relative">
            <form action="{{ route('masyarakat.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf
                @method('PUT')

                @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <p class="font-bold">Error Validasi:</p>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Pesan Validasi untuk Konfirmasi Password -->
                @if($errors->has('password_confirmation'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <p class="font-bold">Error Validasi:</p>
                    <ul class="list-disc list-inside">
                        <li>Konfirmasi password harus diisi jika password diubah.</li>
                    </ul>
                </div>
                @endif

                <!-- Pesan Validasi untuk Ukuran Foto -->
                @if($errors->has('foto_profil'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <p class="font-bold">Error Validasi:</p>
                    <ul class="list-disc list-inside">
                        <li>Ukuran foto maksimal 5 MB.</li>
                    </ul>
                </div>
                @endif

                <!-- Ganti Foto Profil -->
                <div class="w-full flex justify-center mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 rounded-full overflow-hidden mb-4 border-2 border-yellow-500">
                            <img src="{{ $user->masyarakat->foto_profil ? 'data:image;base64,' . base64_encode($user->masyarakat->foto_profil) : asset('img/logo/profil.png') }}"
                                alt="Foto Profil"
                                class="w-full h-full object-cover"
                                id="previewImage">
                        </div>
                        <div class="text-center">
                            <label class="font-semibold text-black block mb-2">Ganti foto profil</label>
                            <label class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 transition-colors">
                                <span class="mr-2 text-gray-700">Pilih file foto</span>
                                <img src="{{ asset('/img/icon/upload.svg') }}" alt="upload" class="w-6 h-4" />
                                <input type="file" name="foto_profil" id="foto_profil" class="hidden" accept="image/jpeg,image/png,image/gif">
                            </label>
                            <p class="mt-1 text-sm text-gray-500">Ukuran foto maksimal 2 MB.</p>
                        </div>
                    </div>
                </div>

                <!-- Data Diri -->
                <h2 class="text-xl font-bold text-hitam mb-4">Data Diri</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="nik" class="block text-base font-semibold mb-2">NIK</label>
                        <input type="text" id="nik" name="nik" value="{{ $user->nik }}" readonly
                            class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-hitam cursor-not-allowed">
                    </div>
                    <div>
                        <label for="nama_lengkap" class="block text-base font-semibold mb-2">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}"
                            class="w-full px-4 py-3 rounded-lg bg-white border border-hitam focus:ring-2 focus:ring-[#FFC436] focus:border-transparent transition-all">
                    </div>
                </div>

                <!-- Data Kontak -->
                <h2 class="text-xl font-bold text-hitam mb-4">Data Kontak</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="nomor_telepon" class="block text-base font-semibold mb-2">Nomer Telepon</label>
                        <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ $user->nomor_telepon }}"
                            class="w-full px-4 py-3 rounded-lg bg-white border border-hitam focus:ring-2 focus:ring-[#FFC436] focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="email" class="block text-base font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                            class="w-full px-4 py-3 rounded-lg bg-white border border-hitam focus:ring-2 focus:ring-[#FFC436] focus:border-transparent transition-all">
                    </div>
                </div>

                <!-- Data Akun -->
                <h2 class="text-xl font-bold text-hitam mb-4">Data Akun</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="username" class="block text-base font-semibold mb-2">User Name</label>
                        <input type="text" id="username" name="username" value="{{ $user->username }}"
                            class="w-full px-4 py-3 rounded-lg bg-white border border-hitam focus:ring-2 focus:ring-[#FFC436] focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="password" class="block text-base font-semibold mb-2">Password Baru (Opsional)</label>
                        <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin diubah"
                            class="w-full px-4 py-3 rounded-lg bg-white border border-hitam focus:ring-2 focus:ring-[#FFC436] focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-base font-semibold mb-2">Konfirmasi Password Baru (Wajib jika password diubah)</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru"
                            class="w-full px-4 py-3 rounded-lg bg-white border border-hitam focus:ring-2 focus:ring-[#FFC436] focus:border-transparent transition-all" required>
                    </div>
                </div>

                <!-- Simpan Pembaruan button -->
                <div class="w-full max-w-2xl flex justify-end">
                    <button type="submit" class="bg-white text-yellow-500 font-bold py-3 px-8 rounded-lg  hover:text-white hover:bg-kuning hover:ring-2 ring-white hover:bg-opacity-90 transform hover:scale-[0.98]  duration-200 text-base shadow-lg transition-colors">
                     Simpan Pembaruan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // Preview image before upload
    document.getElementById('foto_profil').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validasi ukuran file (2 MB = 2 * 1024 * 1024 bytes)
            if (file.size > 2 * 1024 * 1024) {
                alert("Ukuran foto maksimal 2 MB.");
                e.target.value = "";
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
