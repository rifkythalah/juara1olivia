@extends('Dashboardstlhlogin.masyarakat.templatemasyarakat')
@section('title', 'Profil Masyarakat')

@section('content')

<section class="profil">
    <div class="container mx-auto px-2 py-6 flex flex-col items-center mt-6">

        <!-- Poin Card -->
        <div class="w-full max-w-md bg-kuning rounded-3xl shadow-lg mb-8 p-8 text-center border border-gray-300">
            <div class="text-lg font-semibold mb-2">Yeay kamu sudah mendapat</div>
            <div class="text-lg font-bold mb-1">958</div>
            <div class="text-lg italic">Poin</div>
        </div>

        <!-- Profile Info Title & Avatar -->
        <div class="w-full max-w-md flex flex-col items-center mb-4">
            <div class="flex items-center self-start mb-2">
                <span class="text-xl font-bold text-black">Profile Information</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-24 h-24 rounded-full overflow-hidden">
                    <img src="{{ $user->masyarakat->foto_profil ? 'data:image;base64,' . base64_encode($user->masyarakat->foto_profil) : asset('img/logo/profil.png') }}"
                        alt="Avatar"
                        class="w-full h-full object-cover" />
                </div>
            </div>
        </div>

        <!-- Profile Form Card -->
        <div class="w-full max-w-2xl bg-kuning shadow-2xl rounded-3xl overflow-hidden mb-8 border border-gray-300">
            <div class="p-8 md:p-12">
                <form class="space-y-10">
                    @csrf

                    <!-- Data Diri -->
                    <h2 class="text-xl font-bold text-hitam mb-4">Data Diri</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="nik" class="block text-base font-semibold mb-2">NIK</label>
                            <div class="w-full px-4 py-3 rounded-lg bg-white border border-hitam">
                                {{ $user->nik ?? '-' }}
                            </div>
                        </div>
                        <div>
                            <label for="nama" class="block text-base font-semibold mb-2">Nama Lengkap</label>
                            <div class="w-full px-4 py-3 rounded-lg bg-white border border-hitam">
                                {{ $user->nama_lengkap ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <!-- Data Kontak -->
                    <h2 class="text-xl font-bold text-hitam mb-4">Data Kontak</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="telepon" class="block text-base font-semibold mb-2">Nomer Telepon</label>
                            <div class="w-full px-4 py-3 rounded-lg bg-white border border-hitam">
                                {{ $user->nomor_telepon ?? '-' }}
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-base font-semibold mb-2">Email</label>
                            <div class="w-full px-4 py-3 rounded-lg bg-white border border-hitam">
                                {{ $user->email ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <!-- Data Akun -->
                    <h2 class="text-xl font-bold text-hitam mb-4">Data Akun</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="username" class="block text-base font-semibold mb-2">User Name</label>
                            <div class="w-full px-4 py-3 rounded-lg bg-white border border-hitam">
                                {{ $user->username ?? '-' }}
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-base font-semibold mb-2">Password</label>
                            <div class="w-full px-4 py-3 rounded-lg bg-white border border-hitam">
                                ********
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Ubah Profile -->
                    <div>
                        <button type="button" onclick="window.location.href='/masyarakat/profil/ubah'" class="px-8 py-2 bg-white text-yellow-500 font-bold rounded-lg hover:text-white hover:bg-kuning hover:ring-2 ring-white hover:bg-opacity-90 transform hover:scale-[0.98] duration-200 text-base shadow-lg transition-colors ">
                            Ubah Profile
                        </button>
                    </div>

                    <!-- Tombol Keluar -->
                    <div class="w-full px-8 py-3 mt-4 text-center bg-merah text-white hover:bg-kuning hover:ring-2 ring-red-500 hover:text-red-500 font-semibold rounded-lg shadow-md text-sm md:text-base">
                        <button type="button" onclick="showConfirmModal()">Keluar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Konfirmasi Keluar -->
        <div id="confirmModal" class="fixed inset-0 flex bg-opacity-50 z-50 hidden items-center justify-center">
            <div class="bg-white p-8 max-w-sm w-full mx-4 relative" style="border-radius: 10px">
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-4">Apakah anda yakin ingin keluar?</h3>
                    <div class="flex justify-center gap-4">
                        <div>
                            <!-- Tombol Iya dengan Border dan Warna Teks Putih -->
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-8 py-2 text-white font-bold rounded-lg transition-colors" style="background-color: #FF0000">
                                    Iya
                                </button>
                            </form>

                            <!-- Tombol Tidak dengan Warna Latar Kuning -->
                            <button onclick="closeConfirmModal()" class="px-8 py-2 text-black font-bold rounded-lg transition-colors" style="background-color: #FEC23E">
                                Tidak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Menampilkan modal konfirmasi
    function showConfirmModal() {
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    // Menutup modal konfirmasi
    function closeConfirmModal() {
        document.getElementById('confirmModal').classList.add('hidden');
    }
</script>
@endsection
