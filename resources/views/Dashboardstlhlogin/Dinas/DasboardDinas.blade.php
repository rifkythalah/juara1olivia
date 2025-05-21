@extends('Dashboardstlhlogin.Dinas.Template.Template')
@section('title', 'Aktivitas')

@section('content')

<section class="bg-gray-50">
    <div class="container mx-auto px-8 py-4">
        <!-- Header Section -->
    <div class="flex justify-between items-center mb-4 sm:mb-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Dashboard</h2>
    </div>
    <div class="w-full h-1 bg-yellow-400 mb-4 sm:mb-6"></div>
</section>



<section class="p-1 flex justify-center">
  <div class="inline-flex flex-wrap justify-center gap-6 md:gap-20 rounded-xl p-1 ">
    <!-- Laporan Saya -->
    <a href="/dinas/laporan/masyarakat" 
       class="nav-link px-6 py-3 font-bold rounded-lg border-2 border-yellow-500 transition-all duration-300 
       {{ Request::is('dinas.laporan.masyarakat') ? 'active-nav' : '' }}">
      <span class="block relative">
        <span class="nav-text">Laporan Masyarakat</span>
      </span>
    </a>

    <!-- Statik Pemerintah -->
    <a href="/dinas/statistik" 
       class="nav-link px-6 py-3 font-bold rounded-lg border-2 border-yellow-500 transition-all duration-300 
       {{ Request::is('dinas.statistik') ? 'active-nav' : '' }}">
      <span class="block relative">
        <span class="nav-text">Statistik Dinas</span>
      </span>
    </a>
  </div>
</section>


<style>
  .nav-link {
    background: white;
    color: black;
    position: relative;
    overflow: hidden;
  }

  .active-nav {
    background: #ffc43d !important;
    color: white !important;
    border-color: transparent !important;
    transform: scale(1.05);
  }

  .nav-text {
    position: relative;
    z-index: 1;
  }

  .nav-link:hover {
    transform: scale(1.03);
  }

  .active-nav:hover {
    transform: scale(1.05) !important;
  }
</style>



<main class="pt-[100px] flex-grow container mx-auto px-0 py-8">
        @yield('Laporan') <!-- This is where content will be injected -->
    </main>


@endsection