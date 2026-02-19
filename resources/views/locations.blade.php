@extends('layouts.app')

@section('title', 'Our Locations | Safe World Telecom')

@push('styles')
<style>
    #map {
        height: 500px;
        width: 100%;
        border-radius: 1rem;
        z-index: 10;
    }
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    .branch-card.active {
        border-color: #2563eb; /* blue-600 */
        background-color: #eff6ff; /* blue-50 */
    }
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f8fafc;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen py-10 px-4 md:px-8 flex flex-col items-center">

    {{-- 1. Header (Compact) --}}
    <div class="w-full max-w-7xl mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Find a Store</h1>
            <p class="text-gray-500">Visit our retail outlets & agents.</p>
        </div>

        {{-- Search Bar --}}
        <div class="relative w-full md:w-96">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" id="locationSearch" placeholder="Search by city or branch..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>
        </div>
    </div>

    {{-- 2. Main Card Container --}}
    <div class="w-full max-w-7xl bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row h-[600px]">

        {{-- Left: Map --}}
        <div class="w-full md:w-2/3 h-full relative bg-gray-100">
            <div id="map" class="h-full w-full z-10"></div>
            {{-- Loading Indicator --}}
            <div id="mapLoading" class="absolute inset-0 bg-white/80 z-20 flex items-center justify-center hidden">
                <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-600"></div>
            </div>
        </div>

        {{-- Right: Sidebar (Details + List) --}}
        <div class="w-full md:w-1/3 h-full bg-white border-l border-gray-200 flex flex-col z-20">

            {{-- Selected Location Details --}}
            <div id="locationDetails" class="p-6 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-700 text-[10px] font-bold rounded mb-1 uppercase tracking-wide" id="detailType">Head Office</span>
                        <h2 class="text-xl font-bold text-gray-900 leading-tight" id="detailName">Phoenix House</h2>
                    </div>
                </div>

                <div class="space-y-2 mb-4 text-sm text-gray-600">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span id="detailAddress">Kenyatta Avenue, Nairobi</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span id="detailPhone">+254 727 300 722</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="detailHours">Mon - Fri: 8:00 AM - 5:00 PM</span>
                    </div>
                </div>

                <a href="#" id="detailDirections" target="_blank" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg text-sm transition duration-300 flex items-center justify-center shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    Get Directions
                </a>
            </div>

            {{-- List Header --}}
            <div class="px-6 py-3 bg-white border-b border-gray-100">
                <h3 class="font-bold text-gray-800 text-xs uppercase tracking-wider">Other Locations</h3>
            </div>

            {{-- Scrollable List --}}
            <div class="flex-1 overflow-y-auto p-4 space-y-3 bg-white custom-scrollbar" id="branchesList">
                <!-- List items will be injected here via JS -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Data ---
        const branches = [
            {
                id: 1,
                name: "Phoenix House HQ",
                type: "Head Office",
                lat: -1.285790,
                lng: 36.821945,
                phone: "+254 727 300 722",
                hours: "Mon - Fri: 8:00 AM - 5:00 PM",
                days: "Weekdays & Sat",
                address: "Kenyatta Avenue, Nairobi"
            },
            {
                id: 2,
                name: "Moi Avenue Branch",
                type: "Retail Outlet",
                lat: -1.2841,
                lng: 36.8255,
                phone: "+254 722 000 001",
                hours: "Mon - Sat: 9:00 AM - 6:00 PM",
                days: "Mon - Sat",
                address: "Moi Avenue, Nairobi CBD"
            },
            {
                id: 3,
                name: "Westlands Mall",
                type: "Experience Center",
                lat: -1.2683,
                lng: 36.8066,
                phone: "+254 722 000 002",
                hours: "Mon - Sun: 10:00 AM - 8:00 PM",
                days: "Daily",
                address: "Sarit Centre, Westlands"
            },
            {
                id: 4,
                name: "Thika Road Mall (TRM)",
                type: "Retail Outlet",
                lat: -1.2196,
                lng: 36.8887,
                phone: "+254 722 000 003",
                hours: "Mon - Sun: 9:00 AM - 9:00 PM",
                days: "Daily",
                address: "Thika Road, Roysambu"
            },
            {
                id: 5,
                name: "Karen Hub",
                type: "Franchise",
                lat: -1.3211,
                lng: 36.7042,
                phone: "+254 722 000 004",
                hours: "Mon - Sat: 9:00 AM - 6:00 PM",
                days: "Mon - Sat",
                address: "The Hub, Karen"
            },
            {
                id: 6,
                name: "Mombasa Town",
                type: "Regional Office",
                lat: -4.0435,
                lng: 39.6682,
                phone: "+254 722 000 005",
                hours: "Mon - Fri: 8:30 AM - 5:30 PM",
                days: "Weekdays",
                address: "Moi Avenue, Mombasa"
            },
            {
                id: 7,
                name: "Kisumu CBD",
                type: "Retail Outlet",
                lat: -0.0917,
                lng: 34.7680,
                phone: "+254 722 000 006",
                hours: "Mon - Sat: 9:00 AM - 6:00 PM",
                days: "Mon - Sat",
                address: "Oginga Odinga St, Kisumu"
            },
            {
                id: 8,
                name: "Eldoret Town",
                type: "Retail Outlet",
                lat: 0.5143,
                lng: 35.2698,
                phone: "+254 722 000 007",
                hours: "Mon - Sat: 9:00 AM - 6:00 PM",
                days: "Mon - Sat",
                address: "Uganda Road, Eldoret"
            },
            {
                id: 9,
                name: "Nakuru West",
                type: "Franchise",
                lat: -0.3031,
                lng: 36.0800,
                phone: "+254 722 000 008",
                hours: "Mon - Sat: 8:00 AM - 5:00 PM",
                days: "Mon - Sat",
                address: "Kenyatta Avenue, Nakuru"
            }
        ];

        let map;
        let markers = [];
        let currentBranchId = branches[0].id;

        // --- Initialization ---
        function initMap() {
            // Default center (Nairobi)
            map = L.map('map').setView([-1.285790, 36.821945], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Add markers
            renderMarkers(branches);
        }

        function renderMarkers(data) {
            // Clear existing markers
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];

            data.forEach(branch => {
                const marker = L.marker([branch.lat, branch.lng])
                    .addTo(map)
                    .bindPopup(`<b>${branch.name}</b><br>${branch.type}`)
                    .on('click', () => selectBranch(branch.id)); // Clicking marker also updates sidebar

                markers.push(marker);
            });
        }

        function renderList(data) {
            const listContainer = document.getElementById('branchesList');
            listContainer.innerHTML = '';

            data.forEach(branch => {
                if (branch.id === currentBranchId) return; // Skip currently selected one in the list (optional, but requested layout implies "other" branches)

                const item = document.createElement('div');
                item.className = `branch-card p-4 rounded-xl border border-gray-100 cursor-pointer hover:bg-gray-50 hover:border-blue-200 transition duration-200`;
                item.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm">${branch.name}</h4>
                            <p class="text-xs text-blue-600 font-medium mb-1">${branch.type}</p>
                            <p class="text-xs text-gray-500 truncate max-w-[180px]">${branch.address}</p>
                        </div>
                        <div class="bg-gray-100 p-1.5 rounded-full text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                `;
                item.addEventListener('click', () => selectBranch(branch.id));
                listContainer.appendChild(item);
            });
        }

        function selectBranch(id) {
            currentBranchId = id;
            const branch = branches.find(b => b.id === id);

            if (!branch) return;

            // Update Details View
            document.getElementById('detailName').textContent = branch.name;
            document.getElementById('detailType').textContent = branch.type;
            document.getElementById('detailPhone').textContent = branch.phone;
            document.getElementById('detailHours').textContent = branch.hours;
            document.getElementById('detailDays').textContent = branch.days;

            // Update Directions Link (Google Maps)
            const dirLink = `https://www.google.com/maps/dir/?api=1&destination=${branch.lat},${branch.lng}`;
            document.getElementById('detailDirections').href = dirLink;

            // Pan Map
            map.flyTo([branch.lat, branch.lng], 15);

            // Open Popup for the selected marker
            const marker = markers.find(m => m.getLatLng().lat === branch.lat && m.getLatLng().lng === branch.lng);
            if (marker) {
                marker.openPopup();
            }

            // Re-render list to exclude selected and show others
            // Note: In some designs, you keep the list static and highlight.
            // The prompt said "showcasing the OTHER branches", so filtering out the current one makes sense,
            // OR we just keep all and highlight active. Let's keep all but highlight active for better UX?
            // Actually prompt said "scrollable right section showcasing the OTHER branches". I'll filter.
            renderList(branches);
        }

        // --- Search Functionality ---
        const searchInput = document.getElementById('locationSearch');
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            const filtered = branches.filter(b =>
                b.name.toLowerCase().includes(query) ||
                b.address.toLowerCase().includes(query) ||
                b.type.toLowerCase().includes(query)
            );

            // Update map markers
            renderMarkers(filtered);

            // If filtered has results, re-render list with filtered results
            // We might need to reset selected ID if it's not in filtered
            if (filtered.length > 0) {
                 // Don't auto-select, just show in list
                 const listContainer = document.getElementById('branchesList');
                 listContainer.innerHTML = '';
                 filtered.forEach(branch => {
                    // Even if it's the current one, if we are searching, show everything found
                    const item = document.createElement('div');
                item.className = `branch-card p-4 rounded-xl border border-gray-100 cursor-pointer hover:bg-gray-50 hover:border-blue-200 transition duration-200 ${branch.id === currentBranchId ? 'bg-blue-50 border-blue-300' : ''}`;
                item.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm">${branch.name}</h4>
                            <p class="text-xs text-blue-600 font-medium mb-1">${branch.type}</p>
                            <p class="text-xs text-gray-500 truncate max-w-[180px]">${branch.address}</p>
                        </div>
                    </div>
                `;
                item.addEventListener('click', () => selectBranch(branch.id));
                listContainer.appendChild(item);
                 });
            } else {
                document.getElementById('branchesList').innerHTML = '<div class="p-4 text-center text-gray-500 text-sm">No locations found.</div>';
            }
        });

        // Initialize
        initMap();
        selectBranch(branches[0].id); // Select first by default
    });
</script>
@endpush
