<?php
/*
Template Name: Profil Opticien Public
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-28 pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Loading State -->
        <div id="loading-state" class="text-center py-20">
            <i class="fas fa-circle-notch fa-spin text-4xl text-oblink-blue mb-4"></i>
            <p class="text-gray-500">Chargement du profil...</p>
        </div>

        <!-- Profile Content (Hidden until loaded) -->
        <div id="profile-content" class="hidden">

            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

                <!-- Header Banner -->
                <div class="h-32 bg-gradient-to-r from-oblink-blue to-oblink-violet relative">
                    <div class="absolute -bottom-12 left-8">
                        <div id="profile-avatar"
                            class="w-24 h-24 rounded-2xl bg-white border-4 border-white shadow-lg flex items-center justify-center text-3xl font-bold text-oblink-gray">
                            <!-- Initials or Avatar -->
                        </div>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="pt-16 px-8 pb-8">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-6">
                        <div>
                            <h1 id="profile-name" class="text-2xl font-bold text-gray-900 mb-1">Chargement...</h1>
                            <p id="profile-location" class="text-gray-500 flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-oblink-orange"></i>
                                <span>Ville</span>
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <span id="profile-status"
                                class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold">
                                <i class="fas fa-circle text-xs mr-1"></i> Disponible
                            </span>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 mb-8 p-4 bg-gray-50 rounded-2xl">
                        <div class="text-center">
                            <div id="profile-rate" class="text-2xl font-bold text-oblink-orange">--</div>
                            <div class="text-xs text-gray-500">€ / heure</div>
                        </div>
                        <div class="text-center border-x border-gray-200">
                            <div id="profile-experience" class="text-2xl font-bold text-oblink-blue">--</div>
                            <div class="text-xs text-gray-500">Expérience</div>
                        </div>
                        <div class="text-center">
                            <div id="profile-mobility" class="text-2xl font-bold text-oblink-violet">--</div>
                            <div class="text-xs text-gray-500">km mobilité</div>
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="mb-8">
                        <h2 class="text-lg font-bold text-gray-900 mb-3">À propos</h2>
                        <p id="profile-bio" class="text-gray-600 leading-relaxed">
                            Aucune bio renseignée.
                        </p>
                    </div>

                    <!-- Skills -->
                    <div class="mb-8">
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Compétences</h2>
                        <div id="profile-skills" class="flex flex-wrap gap-2">
                            <!-- Skills tags -->
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-100">
                        <button id="contact-btn"
                            class="flex-1 px-6 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition shadow-lg shadow-blue-200 flex items-center justify-center gap-2">
                            <i class="fas fa-envelope"></i> Contacter
                        </button>
                        <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                            class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition flex items-center justify-center gap-2">
                            <i class="fas fa-arrow-left"></i> Retour à la carte
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Error State -->
        <div id="error-state" class="hidden text-center py-20">
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">😕
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">Profil introuvable</h2>
            <p class="text-gray-500 mb-6">Cet opticien n'existe pas ou son profil est privé.</p>
            <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                class="px-6 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition inline-block">
                Retour à la recherche
            </a>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const loadingState = document.getElementById('loading-state');
        const profileContent = document.getElementById('profile-content');
        const errorState = document.getElementById('error-state');

        // Get ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const profileId = urlParams.get('id');

        if (!profileId) {
            loadingState.classList.add('hidden');
            errorState.classList.remove('hidden');
            return;
        }

        try {
            // Fetch Profile from Supabase
            const { data: profile, error } = await window.oblinkSupabase
                .from('profiles')
                .select('*')
                .eq('id', profileId)
                .eq('user_type', 'opticien')
                .single();

            if (error || !profile) throw new Error('Profile not found');

            // Populate UI
            document.getElementById('profile-name').textContent = `${profile.first_name || ''} ${profile.last_name || ''}`.trim() || 'Opticien';
            document.getElementById('profile-location').querySelector('span').textContent = profile.city || 'France';
            document.getElementById('profile-bio').textContent = profile.bio || profile.bio_short || 'Aucune bio renseignée.';
            document.getElementById('profile-rate').textContent = profile.hourly_rate || '--';
            document.getElementById('profile-experience').textContent = formatExperience(profile.experience);
            document.getElementById('profile-mobility').textContent = profile.mobility_km || '30';

            // Avatar
            const avatar = document.getElementById('profile-avatar');
            if (profile.avatar_url) {
                avatar.innerHTML = `<img src="${profile.avatar_url}" class="w-full h-full object-cover rounded-2xl" alt="Avatar">`;
            } else {
                const initials = (profile.first_name?.charAt(0) || '') + (profile.last_name?.charAt(0) || '');
                avatar.textContent = initials || 'O';
            }

            // Status
            const statusEl = document.getElementById('profile-status');
            if (profile.available) {
                statusEl.className = 'px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold';
                statusEl.innerHTML = '<i class="fas fa-circle text-xs mr-1"></i> Disponible';
            } else {
                statusEl.className = 'px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-bold';
                statusEl.innerHTML = '<i class="fas fa-circle text-xs mr-1"></i> Occupé';
            }

            // Skills
            const skillsContainer = document.getElementById('profile-skills');
            const skills = profile.skills || [];
            if (skills.length > 0) {
                skillsContainer.innerHTML = skills.map(skill =>
                    `<span class="px-3 py-1.5 bg-oblink-blue/10 text-oblink-blue rounded-full text-sm font-medium">${formatSkill(skill)}</span>`
                ).join('');
            } else {
                skillsContainer.innerHTML = '<span class="text-gray-400 text-sm">Aucune compétence renseignée</span>';
            }

            // Contact Button
            document.getElementById('contact-btn').addEventListener('click', async () => {
                // Check if logged in
                const { data: { session } } = await window.oblinkSupabase.auth.getSession();
                if (!session) {
                    alert('Connectez-vous pour contacter cet opticien.');
                    window.location.href = '<?php echo home_url("/login"); ?>';
                    return;
                }
                // Open messaging modal if exists, or redirect to messaging
                if (typeof openContactModal === 'function') {
                    openContactModal(profileId, `${profile.first_name} ${profile.last_name}`);
                } else {
                    alert('Fonctionnalité de messagerie en cours de développement.');
                }
            });

            // Show Content
            loadingState.classList.add('hidden');
            profileContent.classList.remove('hidden');

        } catch (err) {
            console.error('Error loading profile:', err);
            loadingState.classList.add('hidden');
            errorState.classList.remove('hidden');
        }

        // Helpers
        function formatExperience(exp) {
            const map = {
                'junior': '0-2 ans',
                'confirme': '3-5 ans',
                'senior': '5-10 ans',
                'expert': '10+ ans'
            };
            return map[exp] || exp || '--';
        }

        function formatSkill(skill) {
            const map = {
                'contactologie': 'Contactologie',
                'basse_vision': 'Basse Vision',
                'pediatrie': 'Pédiatrie',
                'optometrie': 'Optométrie',
                'vente': 'Vente',
                'atelier': 'Atelier',
                'luxe': 'Luxe',
                'sport': 'Optique Sport',
                'management': 'Management'
            };
            return map[skill] || skill;
        }
    });
</script>

<?php
include get_template_directory() . "/footer-content.php";
wp_footer();
?>