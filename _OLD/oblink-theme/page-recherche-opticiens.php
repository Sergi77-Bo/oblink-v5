<?php
/*
Template Name: Recherche Opticiens
*/

include 'header-inc.php';
?>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<!-- Nav is handled by header.php -->

<!-- Header (Compact) -->
<div class="bg-gradient-to-r from-oblink-blue to-oblink-violet text-white pt-32 pb-8">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-2">Trouvez un opticien</h1>
        <p class="opacity-90">Explorez la carte pour trouver les meilleurs talents disponibles.</p>
    </div>
</div>

<!-- Map & Filters Layout -->
<div class="h-[calc(100vh-200px)] flex flex-col md:flex-row">

    <!-- Sidebar / List (30% width) -->
    <div class="w-full md:w-1/3 bg-white border-r border-gray-200 flex flex-col z-20 shadow-xl">

        <!-- Filters -->
        <div class="p-4 border-b border-gray-100 bg-gray-50">
            <div class="relative">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" id="filter-search" placeholder="Ville, Nom..."
                    class="w-full pl-10 pr-4 py-2 rounded-lg border-gray-200 focus:ring-oblink-blue focus:border-oblink-blue text-sm">
            </div>

            <div class="flex gap-2 mt-2">
                <select id="filter-availability" class="flex-1 text-sm border-gray-200 rounded-lg py-2">
                    <option value="">Tous statuts</option>
                    <option value="available">Disponible</option>
                </select>
                <!-- Add more filters here later -->
            </div>
        </div>

        <!-- Results List -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4" id="opticians-list">
            <!-- Loading State -->
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-circle-notch fa-spin mb-2"></i>
                <p class="text-xs">Chargement des opticiens...</p>
            </div>
        </div>

        <!-- Status Bar -->
        <div class="p-3 border-t border-gray-100 text-xs text-gray-500 flex justify-between bg-gray-50">
            <span id="result-count">0 opticiens trouvés</span>
            <span>France</span>
        </div>
    </div>

    <!-- Map Container (70% width) -->
    <div class="flex-1 relative bg-gray-100 z-10">
        <div id="map" class="absolute inset-0 w-full h-full"></div>

        <!-- Map Overlay Controls -->
        <div class="absolute top-4 right-4 z-[400] bg-white rounded-lg shadow-md p-2">
            <button id="locate-me-btn"
                class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-oblink-blue"
                title="Ma position">
                <i class="fas fa-location-arrow"></i>
            </button>
        </div>
    </div>

</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    document.addEventListener('DOMContentLoaded', async () => {

        // 1. Initialize Map
        const map = L.map('map').setView([46.603354, 1.888334], 6); // Centered on France

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);

        const markersLayer = L.layerGroup().addTo(map);
        let allOpticians = [];

        // 2. Fetch Opticians from Supabase
        async function fetchOpticians() {
            try {
                // Fetch profiles where user_type is opticien
                // Note: We should filter by latitude not null ideally, but client-side filter is fine for MVP size
                const { data: opticians, error } = await window.oblinkSupabase
                    .from('profiles')
                    .select('*')
                    .eq('user_type', 'opticien');

                if (error) throw error;

                // Filter out those without coordinates
                allOpticians = opticians.filter(opt => opt.latitude && opt.longitude);

                updateDisplay(allOpticians);

            } catch (err) {
                console.error("Error loading opticians:", err);
                document.getElementById('opticians-list').innerHTML = '<div class="text-red-500 p-4 text-center">Erreur de chargement des données.</div>';
            }
        }

        // 3. Render Markers & List
        function updateDisplay(opticians) {
            // Clear existing
            markersLayer.clearLayers();
            const listContainer = document.getElementById('opticians-list');
            listContainer.innerHTML = '';

            document.getElementById('result-count').textContent = `${opticians.length} opticiens géolocalisés`;

            if (opticians.length === 0) {
                listContainer.innerHTML = `
                    <div class="text-center py-10 px-4">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">🌍</div>
                        <h3 class="font-bold text-gray-500">Aucun opticien sur la carte</h3>
                        <p class="text-xs text-gray-400 mt-2">Invitez des opticiens à mettre à jour leur localisation dans "Paramètres".</p>
                    </div>
                `;
                return;
            }

            // Loop
            opticians.forEach(opt => {
                // Add Marker
                const customIcon = L.divIcon({
                    className: 'custom-div-icon',
                    html: `<div class="w-8 h-8 rounded-full bg-oblink-blue border-2 border-white shadow-lg flex items-center justify-center text-white font-bold text-xs">${opt.first_name ? opt.first_name.charAt(0) : 'O'}</div>`,
                    iconSize: [32, 32],
                    iconAnchor: [16, 16]
                });

                const marker = L.marker([opt.latitude, opt.longitude], { icon: customIcon })
                    .on('click', () => {
                        // Highlight list item
                        document.querySelectorAll('.optician-item').forEach(el => el.classList.remove('ring-2', 'ring-oblink-blue'));
                        const listItem = document.getElementById(`opt-${opt.id}`);
                        if (listItem) {
                            listItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            listItem.classList.add('ring-2', 'ring-oblink-blue');
                        }
                    })
                    .bindPopup(`
                        <div class="text-center">
                            <h3 class="font-bold text-gray-800">${escapeHtml(opt.first_name)} ${escapeHtml(opt.last_name)}</h3>
                            <p class="text-xs text-gray-500 mb-2">${escapeHtml(opt.city || '')}</p>
                            <a href="<?php echo home_url('/profil-opticien'); ?>?id=${opt.id}" class="block text-xs bg-oblink-blue text-white px-2 py-1 rounded hover:bg-blue-600">Voir profil</a>
                        </div>
                    `);

                markersLayer.addLayer(marker);

                // Add List Item
                const card = document.createElement('div');
                card.id = `opt-${opt.id}`;
                card.className = "optician-item bg-white p-3 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition cursor-pointer flex gap-3";
                card.innerHTML = `
                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold flex-shrink-0">
                        ${opt.first_name ? opt.first_name.charAt(0) : 'O'}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-sm text-gray-800 truncate">${escapeHtml(opt.first_name)} ${escapeHtml(opt.last_name)}</h4>
                            <span class="text-[10px] bg-green-100 text-green-700 px-1.5 py-0.5 rounded">Dispo</span>
                        </div>
                        <p class="text-xs text-gray-500 truncate"><i class="fas fa-map-marker-alt text-oblink-orange/70 mr-1"></i> ${escapeHtml(opt.city || 'Ville inconnue')}</p>
                        <p class="text-xs text-gray-400 mt-1 line-clamp-1">${escapeHtml(opt.bio_short || 'Aucune bio.')}</p>
                    </div>
                `;

                // Card Click -> Zoom Map
                card.addEventListener('click', () => {
                    map.flyTo([opt.latitude, opt.longitude], 12);
                    marker.openPopup();
                });

                listContainer.appendChild(card);
            });
        }

        // Security Helper
        function escapeHtml(text) {
            if (!text) return '';
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        // Locate Me Button
        document.getElementById('locate-me-btn').addEventListener('click', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    map.setView([lat, lon], 12);
                    // Could add a "You are here" marker
                });
            } else {
                alert("La géolocalisation n'est pas supportée par votre navigateur.");
            }
        });

        // Search Filter (Basic Client-Side)
        document.getElementById('filter-search').addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            const filtered = allOpticians.filter(opt => {
                const name = (opt.first_name + ' ' + opt.last_name).toLowerCase();
                const city = (opt.city || '').toLowerCase();
                return name.includes(term) || city.includes(term);
            });
            updateDisplay(filtered);
        });

        // Init
        fetchOpticians();

    });
</script>

<?php
// No footer content for the map view to maximize space, just scripts
wp_footer();
?>