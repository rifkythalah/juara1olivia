@extends('Dashboardstlhlogin.Admin.Template.Template')

@section('content')
<div class="container mx-auto px-6 py-4">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
        <!-- Tombol Buat Akun -->
        <button id="buatAkunBtn" class="px-6 py-3 bg-kuning text-hitam font-semibold rounded-lg hover:bg-yellow-500 transition duration-150 shadow-sm">
            Buat akun
        </button>

        <!-- Search and Filter Section -->
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <!-- Search Bar -->
            <div class="relative w-full md:w-64">
                <input type="text" id="searchInput" placeholder="Cari nama atau username..." 
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kuning focus:border-transparent">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Role Filter Dropdown -->
            <div class="relative">
                <select id="roleFilter" class="w-full md:w-48 pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kuning focus:border-transparent appearance-none bg-white">
                    <option value="">Semua Role</option>
                    <option value="admin">Admin</option>
                    <option value="dinas">Dinas</option>
                    <option value="pemerintahpusat">Pemerintah Pusat</option>
                    <option value="masyarakat">Masyarakat</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Sort Dropdown -->
            <div class="relative">
                <select id="sortBy" class="w-full md:w-48 pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-kuning focus:border-transparent appearance-none bg-white">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="name_asc">Nama (A-Z)</option>
                    <option value="name_desc">Nama (Z-A)</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tags -->
    <div id="activeFilters" class="flex flex-wrap gap-2 mb-4">
        <!-- Active filters will be added here dynamically -->
    </div>

    <!-- Tabel Data Role -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-kuning">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold text-hitam">No</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-hitam">Nama</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-hitam">Username</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-hitam">Password</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-hitam">Role</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-hitam">Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($users as $index => $user)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $user->nama_lengkap }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $user->username }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">********</td>
                        <td class="px-6 py-4">
                            @if($user->role === 'admin')
                                <span class="px-4 py-1.5 text-sm font-medium text-red-600 bg-red-100 rounded-full">Admin</span>
                            @elseif($user->role === 'dinas')
                                <span class="px-4 py-1.5 text-sm font-medium text-green-600 bg-green-100 rounded-full">Dinas</span>
                            @elseif($user->role === 'pemerintahpusat')
                                <span class="px-4 py-1.5 text-sm font-medium text-blue-600 bg-blue-100 rounded-full">Pemerintah Pusat</span>
                            @else
                                <span class="px-4 py-1.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-full">{{ ucfirst($user->role) }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data akun
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Buat Akun -->
<div id="modalBuatAkun" class="fixed inset-0 bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative">
            <!-- Tombol Close -->
            <button id="closeModal" class="absolute top-4 right-4">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-hitam">Buat Akun</h2>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="openDaerah()" class="px-6 py-3 bg-kuning text-hitam font-semibold rounded-lg hover:bg-yellow-500 transition duration-150 w-full sm:w-auto">
                    Dinas
                </button>
                <button onclick="openPusat()" class="px-6 py-3 bg-kuning text-hitam font-semibold rounded-lg hover:bg-yellow-500 transition duration-150 w-full sm:w-auto">
                    Pemerintah Pusat
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openPusat() {
    window.location.href = '/admin/akun/pusat';
}

function openDaerah() {
    window.location.href = '/admin/akun/dinas';
}

// Modal functionality
const modal = document.getElementById('modalBuatAkun');
const buatAkunBtn = document.getElementById('buatAkunBtn');
const closeModal = document.getElementById('closeModal');
const searchInput = document.getElementById('searchInput');
const roleFilter = document.getElementById('roleFilter');
const sortBy = document.getElementById('sortBy');
const activeFilters = document.getElementById('activeFilters');

// Search functionality
searchInput.addEventListener('input', function() {
    filterTable();
});

// Role filter functionality
roleFilter.addEventListener('change', function() {
    filterTable();
    updateActiveFilters();
});

// Sort functionality
sortBy.addEventListener('change', function() {
    filterTable();
});

function filterTable() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedRole = roleFilter.value;
    const sortValue = sortBy.value;
    const rows = document.querySelectorAll('tbody tr');
    let visibleRows = [];

    // Mapping untuk role dropdown
    const roleMapping = {
        'admin': 'Admin',
        'dinas': 'Dinas',
        'pemerintahpusat': 'Pemerintah Pusat',
        'masyarakat': 'Masyarakat'
    };

    rows.forEach(row => {
        const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const username = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const roleElement = row.querySelector('td:nth-child(5) span');
        const roleText = roleElement ? roleElement.textContent.toLowerCase() : '';
        const date = row.querySelector('td:nth-child(6)').textContent;

        // Pencarian yang lebih sederhana
        const matchesSearch = 
            name.includes(searchTerm) || 
            username.includes(searchTerm) ||
            roleText.includes(searchTerm);

        // Perbaikan untuk filter role
        let matchesRole = true;
        if (selectedRole) {
            const roleDisplayText = roleMapping[selectedRole].toLowerCase();
            matchesRole = roleText.includes(roleDisplayText);
        }

        if (matchesSearch && matchesRole) {
            row.style.display = '';
            visibleRows.push({
                element: row,
                name: name,
                date: date
            });
        } else {
            row.style.display = 'none';
        }
    });

    // Sort visible rows
    visibleRows.sort((a, b) => {
        switch(sortValue) {
            case 'name_asc':
                return a.name.localeCompare(b.name);
            case 'name_desc':
                return b.name.localeCompare(a.name);
            case 'oldest':
                return a.date.localeCompare(b.date);
            case 'newest':
            default:
                return b.date.localeCompare(a.date);
        }
    });

    // Reorder rows in the table
    const tbody = document.querySelector('tbody');
    visibleRows.forEach(row => {
        tbody.appendChild(row.element);
    });

    // Update row numbers
    updateRowNumbers();
}

function updateRowNumbers() {
    const visibleRows = document.querySelectorAll('tbody tr:not([style*="display: none"])');
    visibleRows.forEach((row, index) => {
        row.querySelector('td:first-child').textContent = index + 1;
    });
}

function updateActiveFilters() {
    activeFilters.innerHTML = '';
    const selectedRole = roleFilter.value;
    const searchTerm = searchInput.value;

    if (selectedRole) {
        const roleMapping = {
            'admin': 'Admin',
            'dinas': 'Dinas',
            'pemerintahpusat': 'Pemerintah Pusat',
            'masyarakat': 'Masyarakat'
        };

        const filterTag = document.createElement('div');
        filterTag.className = 'px-3 py-1 bg-kuning text-hitam rounded-full text-sm flex items-center gap-2';
        filterTag.innerHTML = `
            Role: ${roleMapping[selectedRole]}
            <button onclick="removeFilter('role')" class="hover:text-red-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        `;
        activeFilters.appendChild(filterTag);
    }

    if (searchTerm) {
        const filterTag = document.createElement('div');
        filterTag.className = 'px-3 py-1 bg-kuning text-hitam rounded-full text-sm flex items-center gap-2';
        filterTag.innerHTML = `
            Pencarian: ${searchTerm}
            <button onclick="removeFilter('search')" class="hover:text-red-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        `;
        activeFilters.appendChild(filterTag);
    }
}

function removeFilter(type) {
    if (type === 'role') {
        roleFilter.value = '';
    } else if (type === 'search') {
        searchInput.value = '';
    }
    filterTable();
    updateActiveFilters();
}

buatAkunBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

closeModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// Close modal when clicking outside
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('hidden');
    }
});

// Initialize filters
filterTable();
updateActiveFilters();
</script>
@endsection