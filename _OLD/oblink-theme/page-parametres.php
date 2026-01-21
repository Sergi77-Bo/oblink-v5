<?php
/*
Template Name: Page Parametres
*/
include 'header-inc.php';

// Protection
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
    exit;
}
?>

<div class="min-h-screen bg-gray-50 pt-24 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold font-display text-oblink-gray">Paramètres du compte</h1>
            <p class="text-gray-500 mt-2">Gérez vos informations personnelles et votre visibilité sur la carte.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Sidebar Navigation -->
            <div class="space-y-2">
                <a href="#"
                    class="block px-4 py-3 bg-white rounded-xl font-bold text-oblink-blue border border-oblink-blue/20 shadow-sm">
                    <i class="fas fa-user-circle mr-2"></i> Profil & Localisation
                </a>
                <a href="#"
                    class="block px-4 py-3 bg-transparent rounded-xl font-medium text-gray-500 hover:bg-white hover:text-gray-700 transition">
                    <i class="fas fa-lock mr-2"></i> Mot de passe
                </a>
                <a href="#"
                    class="block px-4 py-3 bg-transparent rounded-xl font-medium text-gray-500 hover:bg-white hover:text-gray-700 transition">
                    <i class="fas fa-bell mr-2"></i> Notifications
                </a>
                <div class="pt-4 mt-4 border-t border-gray-200">
                    <a href="<?php echo home_url('/dashboard'); ?>"
                        class="block px-4 py-2 text-sm text-gray-400 hover:text-gray-600">
                        <i class="fas fa-arrow-left mr-2"></i> Retour au Dashboard
                    </a>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="md:col-span-2">

                <!-- Profile Form -->
                <form id="settings-form" class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">

                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-20 h-20 rounded-full bg-oblink-gray text-white flex items-center justify-center text-3xl font-bold"
                            id="avatar-preview">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-oblink-gray">Information Publiques</h2>
                            <p class="text-sm text-gray-400">Ces informations seront visibles par les recruteurs.</p>
                        </div>
                    </div>

                    <div class="space-y-6">

                        <!-- Identity -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Prénom</label>
                                <input type="text" name="first_name" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Nom</label>
                                <input type="text" name="last_name" required
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition">
                            </div>
                        </div>

                        <!-- Bio -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Bio / Présentation</label>
                            <textarea name="bio_short" rows="3" placeholder="Présentez-vous en quelques mots..."
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition text-sm"></textarea>
                        </div>

                        <hr class="border-gray-100 my-6">

                        <!-- Location (Geocoding) -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1 flex justify-between">
                                <span>Adresse / Ville</span>
                                <span id="geo-status" class="text-xs font-normal text-gray-400"><i
                                        class="fas fa-satellite"></i> En attente</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="city" id="address-input"
                                    placeholder="Ex: 10 Rue de la Paix, 75002 Paris"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-orange focus:ring-0 transition pr-12">
                                <button type="button" id="geo-btn"
                                    class="absolute right-3 top-3 text-oblink-orange hover:text-orange-600 transition"
                                    title="Rechercher">
                                    <i class="fas fa-search-location text-xl"></i>
                                </button>
                            </div>
                            <p class="text-xs text-gray-400 mt-2">
                                <i class="fas fa-info-circle text-oblink-blue mr-1"></i>
                                Indispensable pour apparaître sur la carte. L'adresse exacte reste confidentielle, seul
                                le quartier est affiché.
                            </p>

                            <!-- Hidden Coordinates -->
                            <input type="hidden" name="latitude" id="lat-input">
                            <input type="hidden" name="longitude" id="lon-input">
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                        <button type="submit" id="save-btn"
                            class="px-8 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-gray-900 transition shadow-lg shadow-blue-200 flex items-center gap-2">
                            <i class="fas fa-save"></i> Enregistrer
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const form = document.getElementById('settings-form');
        const addressInput = document.getElementById('address-input');
        const latInput = document.getElementById('lat-input');
        const lonInput = document.getElementById('lon-input');
        const geoStatus = document.getElementById('geo-status');
        const saveBtn = document.getElementById('save-btn');
        const geoBtn = document.getElementById('geo-btn');

        // 1. Load Current Profile
        try {
            const { data: { session } } = await window.oblinkSupabase.auth.getSession();
            if (!session) { window.location.href = '/login'; return; }

            const { data: profile, error } = await window.oblinkSupabase
                .from('profiles')
                .select('*')
                .eq('id', session.user.id)
                .single();

            if (profile) {
                form.querySelector('[name="first_name"]').value = profile.first_name || '';
                form.querySelector('[name="last_name"]').value = profile.last_name || '';
                form.querySelector('[name="bio_short"]').value = profile.bio_short || '';
                addressInput.value = profile.city || ''; // Using city field for full address display if possible
                latInput.value = profile.latitude || '';
                lonInput.value = profile.longitude || '';

                if (profile.latitude && profile.longitude) {
                    geoStatus.innerHTML = '<span class="text-green-500"><i class="fas fa-check-circle"></i> Géolocalisé</span>';
                }
            }
        } catch (err) {
            console.error(err);
        }

        // 2. Geocoding Function
        async function geocodeAddress() {
            const query = addressInput.value.trim();
            if (query.length < 3) return;

            geoStatus.innerHTML = '<span class="text-oblink-blue"><i class="fas fa-spinner fa-spin"></i> Recherche...</span>';

            try {
                const response = await fetch(`https://api-adresse.data.gouv.fr/search/?q=${encodeURIComponent(query)}&limit=1`);
                const data = await response.json();

                if (data.features && data.features.length > 0) {
                    const coords = data.features[0].geometry.coordinates; // [lon, lat]
                    lonInput.value = coords[0];
                    latInput.value = coords[1];

                    geoStatus.innerHTML = '<span class="text-green-500"><i class="fas fa-check-circle"></i> Trouvé : ' + coords[1].toFixed(4) + ', ' + coords[0].toFixed(4) + '</span>';

                    // Show Toast
                    if (typeof showToast === 'function') showToast('Adresse trouvée et coordonnées mises à jour !', 'success');
                } else {
                    geoStatus.innerHTML = '<span class="text-red-500"><i class="fas fa-exclamation-circle"></i> Adresse introuvable</span>';
                    latInput.value = '';
                    lonInput.value = '';
                }
            } catch (err) {
                console.error(err);
                geoStatus.innerHTML = '<span class="text-red-500">Erreur de connexion API</span>';
            }
        }

        // Trigger geocode on button click or blur
        geoBtn.addEventListener('click', geocodeAddress);
        addressInput.addEventListener('blur', geocodeAddress);

        // 3. Save Changes
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const originalBtn = saveBtn.innerHTML;
            saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sauvegarde...';
            saveBtn.disabled = true;

            try {
                const { data: { session } } = await window.oblinkSupabase.auth.getSession();

                const updates = {
                    first_name: form.querySelector('[name="first_name"]').value,
                    last_name: form.querySelector('[name="last_name"]').value,
                    bio_short: form.querySelector('[name="bio_short"]').value,
                    city: addressInput.value, // We store the friendly name here
                    latitude: latInput.value ? parseFloat(latInput.value) : null,
                    longitude: lonInput.value ? parseFloat(lonInput.value) : null,
                    updated_at: new Date()
                };

                const { error } = await window.oblinkSupabase
                    .from('profiles')
                    .update(updates)
                    .eq('id', session.user.id);

                if (error) throw error;

                if (typeof showToast === 'function') showToast('Profil mis à jour avec succès', 'success');

                setTimeout(() => {
                    saveBtn.innerHTML = '<i class="fas fa-check"></i> Enregistré';
                    saveBtn.classList.remove('bg-oblink-blue');
                    saveBtn.classList.add('bg-green-500');
                    setTimeout(() => {
                        saveBtn.innerHTML = originalBtn;
                        saveBtn.classList.add('bg-oblink-blue');
                        saveBtn.classList.remove('bg-green-500');
                        saveBtn.disabled = false;
                    }, 2000);
                }, 500);

            } catch (err) {
                console.error(err);
                alert('Erreur lors de la sauvegarde');
                saveBtn.innerHTML = originalBtn;
                saveBtn.disabled = false;
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>