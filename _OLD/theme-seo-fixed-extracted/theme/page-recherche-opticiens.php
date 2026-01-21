<?php
/*
Template Name: Recherche Opticiens
*/

include 'header-inc.php';
?>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css"
    integrity="sha512-h9FcoyWjHcOcmEVkxOfTLnmZFWIH0iZhZT1H2TbOq55xssQGEJHEaIm+PgoUaZbRvQTNTluNOEfb1ZRy6D3BOw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <!-- Sidebar / List (45% width for better visibility) -->
    <div class="w-full md:w-[45%] bg-white border-r border-gray-200 flex flex-col z-20 shadow-xl">

        <!-- Filters -->
        <div class="p-4 border-b border-gray-100 bg-gray-50">
            <!-- Search Bar -->
            <div class="relative mb-4">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" id="filter-search" placeholder="Nom, ville, compétence..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-oblink-blue focus:border-transparent outline-none text-sm">
            </div>

            <!-- Smart Filtering Tags -->
            <div class="mb-4">
                <h3 class="text-xs font-bold text-gray-500 uppercase mb-3">Compétences & Expertise</h3>
                <div class="flex flex-wrap gap-2">
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-oblink-blue hover:bg-oblink-blue hover:text-white transition"
                        data-filter="cosium">
                        <i class="fas fa-star text-yellow-500"></i> Expert Cosium
                    </button>
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-oblink-violet hover:bg-oblink-violet hover:text-white transition"
                        data-filter="optometriste">
                        <i class="fas fa-eye text-purple-500"></i> Optométriste
                    </button>
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-green-600 hover:bg-green-600 hover:text-white transition"
                        data-filter="contacto">
                        <i class="fas fa-glasses text-green-500"></i> Contactologie
                    </button>
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-orange-500 hover:bg-orange-500 hover:text-white transition"
                        data-filter="basse-vision">
                        <i class="fas fa-low-vision text-orange-500"></i> Basse Vision
                    </button>
                </div>
            </div>

            <!-- Availability Tags -->
            <div class="mb-4">
                <h3 class="text-xs font-bold text-gray-500 uppercase mb-3">Disponibilité</h3>
                <div class="flex flex-wrap gap-2">
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-blue-500 hover:bg-blue-500 hover:text-white transition"
                        data-filter="weekend">
                        <i class="fas fa-calendar-week text-blue-500"></i> Samedi
                    </button>
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-indigo-500 hover:bg-indigo-500 hover:text-white transition"
                        data-filter="dispo-rapide">
                        <i class="fas fa-clock text-indigo-500"></i> Dispo < 48h </button>
                            <button
                                class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-pink-500 hover:bg-pink-500 hover:text-white transition"
                                data-filter="cdi">
                                <i class="fas fa-briefcase text-pink-500"></i> Cherche CDI
                            </button>
                </div>
            </div>

            <!-- Mobility & Certifications -->
            <div class="mb-4">
                <h3 class="text-xs font-bold text-gray-500 uppercase mb-3">Autres Critères</h3>
                <div class="flex flex-wrap gap-2">
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-teal-500 hover:bg-teal-500 hover:text-white transition"
                        data-filter="vehicule">
                        <i class="fas fa-car text-teal-500"></i> Véhiculé
                    </button>
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-red-500 hover:bg-red-500 hover:text-white transition"
                        data-filter="bilingue">
                        <i class="fas fa-globe text-red-500"></i> Bilingue
                    </button>
                    <button
                        class="filter-tag px-3 py-1.5 bg-white border-2 border-gray-200 rounded-full text-xs font-bold hover:border-purple-600 hover:bg-purple-600 hover:text-white transition"
                        data-filter="certifie">
                        <i class="fas fa-certificate text-purple-600"></i> Certifié VAE
                    </button>
                </div>
            </div>

            <!-- Classic Dropdown (kept for fallback) -->
            <div class="mb-2">
                <label class="text-xs font-bold text-gray-500 block mb-2">Statut (Legacy)</label>
                <select id="filter-availability"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-oblink-blue outline-none">
                    <option value="tous">Tous les statuts</option>
                    <option value="actif">Disponible</option>
                    <option value="occupe">En poste</option>
                </select>
            </div>
        </div>

        <!-- Opticians List (Scrollable) -->
        <div id="opticians-list" class="flex-1 overflow-y-auto p-3 space-y-3">
            <!-- Rendered by JS -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"
    integrity="sha512-puJW3E/qXDqYp9IfhAI54BJEaWIfloJ7JWs7OeD5i6ruC9JZL1gERT1wjtwXFlh7CjE7ZJ+/vcRZRkIYIb6p4g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
            console.log('[MAP DEBUG] Starting fetch...');
            try {
                // Fix: Check if Supabase is initialized
                if (!window.oblinkSupabase) {
                    console.error('[MAP DEBUG] Supabase not loaded');
                    document.getElementById('opticians-list').innerHTML = '<div class="text-red-500 p-4 text-center"><i class="fas fa-exclamation-triangle mb-2"></i><p>Erreur technique: Base de données inaccessible.</p><p class="text-xs mt-2">Vérifiez que Supabase est chargé dans la console.</p></div>';
                    return;
                }

                console.log('[MAP DEBUG] Supabase OK, fetching profiles...');

                // Fetch profiles where user_type is opticien
                const { data: opticians, error } = await window.oblinkSupabase
                    .from('profiles')
                    .select('*')
                    .eq('user_type', 'opticien');

                if (error) {
                    console.error('[MAP DEBUG] Supabase error:', error);
                    throw error;
                }

                console.log(`[MAP DEBUG] Fetched ${opticians?.length || 0} opticiens total`);

                // Filter out those without coordinates
                allOpticians = opticians.filter(opt => opt.latitude && opt.longitude);

                console.log(`[MAP DEBUG] ${allOpticians.length} opticiens with coordinates`);

                updateDisplay(allOpticians);

            } catch (err) {
                console.error('[MAP DEBUG] Error loading opticians:', err);
                document.getElementById('opticians-list').innerHTML = `
                    <div class="text-red-500 p-4 text-center">
                        <i class="fas fa-exclamation-circle text-3xl mb-3"></i>
                        <p class="font-bold">Erreur de chargement des données</p>
                        <p class="text-xs mt-2 text-gray-500">${err.message || 'Erreur inconnue'}</p>
                        <button onclick="location.reload()" class="mt-4 px-4 py-2 bg-oblink-blue text-white rounded-lg text-sm hover:bg-blue-600">
                            Réessayer
                        </button>
                    </div>
                `;
            }
        }

        // 3. Render Markers & List
        function updateDisplay(opticians) {
            console.log(`[MAP DEBUG] updateDisplay called with ${opticians.length} opticians`);

            // Clear existing
            markersLayer.clearLayers();
            const listContainer = document.getElementById('opticians-list');
            listContainer.innerHTML = '';

            document.getElementById('result-count').textContent = `${opticians.length} opticiens géolocalisés`;

            if (opticians.length === 0) {
                console.log('[MAP DEBUG] No opticians to display');
                listContainer.innerHTML = `
                    <div class="text-center py-10 px-4">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">🌍</div>
                        <h3 class="font-bold text-gray-500">Aucun opticien sur la carte</h3>
                        <p class="text-xs text-gray-400 mt-2">Invitez des opticiens à mettre à jour leur localisation dans "Paramètres".</p>
                    </div>
                `;
                return;
            }

            console.log('[MAP DEBUG] Rendering markers...');

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
                            <h3 class="font-bold text-gray-800">${window.escapeHtml(opt.first_name)} ${window.escapeHtml(opt.last_name)}</h3>
                            <p class="text-xs text-gray-500 mb-2">${window.escapeHtml(opt.city || '')}</p>
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
                            <h4 class="font-bold text-sm text-gray-800 truncate">${window.escapeHtml(opt.first_name)} ${window.escapeHtml(opt.last_name)}</h4>
                            <span class="text-[10px] bg-green-100 text-green-700 px-1.5 py-0.5 rounded">Dispo</span>
                        </div>
                        <p class="text-xs text-gray-500 truncate"><i class="fas fa-map-marker-alt text-oblink-orange/70 mr-1"></i> ${window.escapeHtml(opt.city || 'Ville inconnue')}</p>
                        <p class="text-xs text-gray-400 mt-1 line-clamp-1">${window.escapeHtml(opt.bio_short || 'Aucune bio.')}</p>
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

        // Security Helper (Global Scope)
        window.escapeHtml = function (text) {
            if (!text) return '';
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        };

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

        // Availability Filter (FIXED - was missing event listener)
        document.getElementById('filter-availability').addEventListener('change', (e) => {
            const statusValue = e.target.value;
            const searchTerm = document.getElementById('filter-search').value.toLowerCase();

            let filtered = allOpticians;

            // Apply search term if exists
            if (searchTerm) {
                filtered = filtered.filter(opt => {
                    const name = (opt.first_name + ' ' + opt.last_name).toLowerCase();
                    const city = (opt.city || '').toLowerCase();
                    return name.includes(searchTerm) || city.includes(searchTerm);
                });
            }

            //  Apply availability filter
            if (statusValue === 'available') {
                // Assuming profiles have an `availability_status` or similar field
                // If not, you'll need to add this field to the profiles table
                filtered = filtered.filter(opt => opt.availability_status === 'available');
            }

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