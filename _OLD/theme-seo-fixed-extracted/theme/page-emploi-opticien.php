<?php
/**
 * Template Name: Offres Emploi Opticien
 */

header('Content-Type: text/html; charset=utf-8');
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- OBSERVATOIRE BANNER -->
        <div class="max-w-5xl mx-auto mb-10">
            <a href="<?php echo home_url('/observatoire'); ?>"
                class="block bg-gradient-to-r from-gray-900 to-oblink-gray rounded-2xl p-6 shadow-lg text-white group hover:shadow-xl transition relative overflow-hidden">
                <div class="absolute right-0 top-0 bottom-0 w-64 bg-oblink-blue/10 skew-x-12 transform translate-x-10">
                </div>
                <div class="flex items-center justify-between relative z-10">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-2xl">
                            <i class="fas fa-chart-pie text-oblink-orange"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Consultez le Baromètre 2026</h3>
                            <p class="text-gray-400 text-sm">Avant de postuler, vérifiez les salaires du marché.</p>
                        </div>
                    </div>
                    <span
                        class="px-4 py-2 bg-white text-oblink-gray font-bold rounded-lg text-sm group-hover:bg-oblink-orange group-hover:text-white transition">
                        Voir l'étude <i class="fas fa-arrow-right ml-1"></i>
                    </span>
                </div>
            </a>
        </div>

        <!-- HEADER SECTION -->
        <div class="text-center mb-12">
            <div
                class="inline-block px-3 py-1 bg-oblink-orange/10 text-oblink-orange font-bold rounded-full text-xs uppercase tracking-wider mb-3">
                Sélection Hebdomadaire</div>
            <h1 class="text-4xl font-black font-display text-gray-900 mb-4 tracking-tight">
                Les Pépites <span class="text-oblink-blue">Oblink</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">
                Nous sélectionnons à la main les meilleures offres du marché (Salaire, Ambiance, Avantages).
            </p>
        </div>

        <!-- FILTERS SECTION -->
        <div class="max-w-5xl mx-auto mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-filter text-oblink-blue"></i>
                        Filtrer les offres
                    </h3>
                    <button id="reset-filters"
                        class="text-sm text-oblink-blue hover:text-oblink-blue/80 font-semibold transition hidden">
                        <i class="fas fa-redo mr-1"></i>
                        Réinitialiser
                    </button>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <!-- Contract Type Filter -->
                    <div>
                        <label for="filter-contract" class="block text-sm font-semibold text-gray-700 mb-2">
                            Type de contrat
                        </label>
                        <select id="filter-contract"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none">
                            <option value="">Tous les contrats</option>
                            <option value="cdi">CDI</option>
                            <option value="cdd">CDD / Remplacement</option>
                            <option value="freelance">Freelance</option>
                            <option value="vacation">Vacation</option>
                        </select>
                    </div>

                    <!-- City Filter -->
                    <div>
                        <label for="filter-city" class="block text-sm font-semibold text-gray-700 mb-2">
                            Ville
                        </label>
                        <input type="text" id="filter-city" placeholder="Ex: Paris, Lyon..."
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none">
                    </div>

                    <!-- Region Filter (optional) -->
                    <div>
                        <label for="filter-region" class="block text-sm font-semibold text-gray-700 mb-2">
                            Région
                        </label>
                        <select id="filter-region"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none">
                            <option value="">Toutes les régions</option>
                            <option value="ile-de-france">Île-de-France</option>
                            <option value="auvergne-rhone-alpes">Auvergne-Rhône-Alpes</option>
                            <option value="provence-alpes-cote-azur">Provence-Alpes-Côte d'Azur</option>
                            <option value="occitanie">Occitanie</option>
                            <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                            <option value="hauts-de-france">Hauts-de-France</option>
                            <option value="grand-est">Grand Est</option>
                            <option value="pays-de-la-loire">Pays de la Loire</option>
                            <option value="bretagne">Bretagne</option>
                            <option value="normandie">Normandie</option>
                            <option value="bourgogne-franche-comte">Bourgogne-Franche-Comté</option>
                            <option value="centre-val-de-loire">Centre-Val de Loire</option>
                        </select>
                    </div>
                </div>

                <!-- Results Counter -->
                <div id="results-counter"
                    class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-600 font-medium hidden">
                    <i class="fas fa-search mr-2"></i>
                    <span id="counter-text">0 offre trouvée</span>
                </div>
            </div>
        </div>

        <!-- LOADING STATE -->
        <!-- LOADING STATE SKELETON -->
        <div id="loading-state" class="grid gap-6 max-w-4xl mx-auto">
            <div class="skeleton-card">
                <div class="flex items-center gap-4 mb-4">
                    <div class="skeleton skeleton-circle w-12 h-12"></div>
                    <div class="flex-1">
                        <div class="skeleton skeleton-text w-1/3"></div>
                        <div class="skeleton skeleton-text w-1/4"></div>
                    </div>
                </div>
                <div class="skeleton skeleton-text w-full"></div>
                <div class="skeleton skeleton-text w-2/3"></div>
            </div>
            <div class="skeleton-card">
                <div class="flex items-center gap-4 mb-4">
                    <div class="skeleton skeleton-circle w-12 h-12"></div>
                    <div class="flex-1">
                        <div class="skeleton skeleton-text w-1/3"></div>
                        <div class="skeleton skeleton-text w-1/4"></div>
                    </div>
                </div>
                <div class="skeleton skeleton-text w-full"></div>
                <div class="skeleton skeleton-text w-2/3"></div>
            </div>
            <div class="skeleton-card">
                <div class="flex items-center gap-4 mb-4">
                    <div class="skeleton skeleton-circle w-12 h-12"></div>
                    <div class="flex-1">
                        <div class="skeleton skeleton-text w-1/3"></div>
                        <div class="skeleton skeleton-text w-1/4"></div>
                    </div>
                </div>
                <div class="skeleton skeleton-text w-full"></div>
                <div class="skeleton skeleton-text w-2/3"></div>
            </div>
        </div>

        <!-- JOBS LIST CONTAINER -->
        <div id="jobs-container" class="grid gap-6 max-w-4xl mx-auto hidden">
            <!-- Jobs will be injected here via JS -->
        </div>

        <!-- EMPTY STATE -->
        <!-- EMPTY STATE -->
        <div id="empty-state" class="hidden empty-state max-w-2xl mx-auto">
            <div class="empty-state-icon">🔍</div>
            <h3 class="empty-state-title">Aucune offre trouvée</h3>
            <p class="empty-state-desc">Essayez de modifier vos filtres ("Ville", "Contrat", "Région") ou revenez plus
                tard.</p>
            <button onclick="document.getElementById('reset-filters').click()"
                class="px-6 py-2 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
                Réinitialiser les filtres
            </button>
        </div>

    </div>
</div>

<script>
    // Toast notification helper
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 text-white px-6 py-4 rounded-xl shadow-xl z-50 animate-bounce ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
        toast.innerHTML = `<i class="fas ${type === 'success' ? 'fa-check' : 'fa-exclamation-circle'} mr-2"></i>${message}`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    document.addEventListener('DOMContentLoaded', async () => {
        const loadingState = document.getElementById('loading-state');
        const jobsContainer = document.getElementById('jobs-container');
        const emptyState = document.getElementById('empty-state');

        // Check if we have a job_id parameter (single job view)
        const urlParams = new URLSearchParams(window.location.search);
        const singleJobId = urlParams.get('job_id');

        if (singleJobId) {
            // Redirect to mission detail page
            window.location.href = '<?php echo home_url('/mission-detail'); ?>?id=' + singleJobId;
            return;
        }

        let currentUser = null;

        let allJobs = []; // Store all jobs for filtering

        try {
            // Get Current User
            const { data: { session } } = await window.oblinkSupabase.auth.getSession();
            currentUser = session?.user || null;

            // Fetch Offers (Simplified Query)
            const { data: jobs, error } = await window.oblinkSupabase
                .from('offers')
                .select('*')
                .eq('status', 'active')
                .order('created_at', { ascending: false });

            console.log('Jobs fetched:', jobs, 'Error:', error);

            if (error) {
                console.error('Supabase Error:', error.message, error.details, error.hint);
                throw error;
            }

            // Hide loading
            loadingState.classList.add('hidden');

            if (!jobs || jobs.length === 0) {
                emptyState.classList.remove('hidden');
                return;
            }

            // Store all jobs for filtering
            allJobs = jobs;

            // Render all jobs initially
            renderJobs(allJobs);

            // Initialize filters
            setupFilters();

            // Check application status for logged user
            if (currentUser) {
                checkApplications(currentUser.id, jobs);
            }

        } catch (err) {
            console.error('Error loading jobs:', err);
            loadingState.innerHTML = `<p class="text-red-500">Erreur: ${err.message || 'Chargement impossible.'}</p><p class="text-xs text-gray-400 mt-2">Vérifiez la console (F12) pour plus de détails.</p>`;
        }

        // --- Filter Setup ---
        function setupFilters() {
            const filterContract = document.getElementById('filter-contract');
            const filterCity = document.getElementById('filter-city');
            const filterRegion = document.getElementById('filter-region');
            const resetBtn = document.getElementById('reset-filters');

            // Add event listeners
            filterContract.addEventListener('change', applyFilters);
            filterCity.addEventListener('input', applyFilters);
            filterRegion.addEventListener('change', applyFilters);
            resetBtn.addEventListener('click', resetFilters);
        }

        function applyFilters() {
            const contractValue = document.getElementById('filter-contract').value.toLowerCase();
            const cityValue = document.getElementById('filter-city').value.toLowerCase().trim();
            const regionValue = document.getElementById('filter-region').value.toLowerCase();

            // Filter jobs
            const filteredJobs = allJobs.filter(job => {
                let matches = true;

                // Contract filter
                if (contractValue && job.contract_type.toLowerCase() !== contractValue) {
                    matches = false;
                }

                // City filter (partial match)
                if (cityValue && !(job.city || '').toLowerCase().includes(cityValue)) {
                    matches = false;
                }

                // Region filter (you may need to add region field to offers table)
                // For now, we'll skip region filtering as it's not in the schema
                // if (regionValue && job.region?.toLowerCase() !== regionValue) {
                //     matches = false;
                // }

                return matches;
            });

            // Render filtered jobs
            renderJobs(filteredJobs);

            // Update UI
            updateFilterUI(filteredJobs.length);
        }

        function resetFilters() {
            // Clear all filters
            document.getElementById('filter-contract').value = '';
            document.getElementById('filter-city').value = '';
            document.getElementById('filter-region').value = '';

            // Render all jobs
            renderJobs(allJobs);

            // Hide reset button and counter
            document.getElementById('reset-filters').classList.add('hidden');
            document.getElementById('results-counter').classList.add('hidden');
        }

        function renderJobs(jobs) {
            if (jobs.length === 0) {
                jobsContainer.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 inline-block">
                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">🔍</div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Aucune offre ne correspond</h3>
                            <p class="text-gray-500">Essayez de modifier vos filtres</p>
                        </div>
                    </div>
                `;
                jobsContainer.classList.remove('hidden');
            } else {
                jobsContainer.innerHTML = jobs.map(job => renderJobCard(job)).join('');
                jobsContainer.classList.remove('hidden');
                jobsContainer.classList.add('grid', 'md:grid-cols-2', 'gap-6');

                // Re-check applications if user is logged in
                if (currentUser) {
                    checkApplications(currentUser.id, jobs);
                }
            }
        }

        function updateFilterUI(count) {
            const resetBtn = document.getElementById('reset-filters');
            const counter = document.getElementById('results-counter');
            const counterText = document.getElementById('counter-text');

            // Show/hide reset button
            const hasFilters =
                document.getElementById('filter-contract').value ||
                document.getElementById('filter-city').value ||
                document.getElementById('filter-region').value;

            if (hasFilters) {
                resetBtn.classList.remove('hidden');
                counter.classList.remove('hidden');

                // Update counter text
                if (count === 0) {
                    counterText.textContent = 'Aucune offre trouvée';
                } else if (count === 1) {
                    counterText.textContent = '1 offre trouvée';
                } else {
                    counterText.textContent = `${count} offres trouvées sur ${allJobs.length}`;
                }
            } else {
                resetBtn.classList.add('hidden');
                counter.classList.add('hidden');
            }
        }

        // --- Render Function ---
        function renderJobCard(job) {
            // Format dates
            const startDate = new Date(job.start_date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });
            const contractLabel = job.contract_type === 'cdd' ? 'CDD / Remplacement' : job.contract_type.toUpperCase();
            const salary = job.daily_rate ? `${job.daily_rate}€ / jour` : 'Salaire non affiché';

            // Random logo letter & color
            const letter = job.company?.company_name?.charAt(0) || 'O';
            const colors = ['bg-blue-100 text-blue-600', 'bg-purple-100 text-purple-600', 'bg-orange-100 text-orange-600'];
            const colorClass = colors[job.title.length % 3];

            return `
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group relative overflow-hidden job-card cursor-pointer" 
                     data-job-id="${job.id}"
                     onclick="window.location.href='<?php echo home_url('/emploi-opticien'); ?>?job_id=${job.id}'">
                    <div class="flex flex-col gap-4">
                        <!-- LOGO -->
                        <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center text-lg font-bold border border-gray-200 ${colorClass}">
                            ${letter}
                        </div>

                        <!-- CONTENT -->
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-2">
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-oblink-blue transition flex-1">
                                    ${job.title}
                                </h3>
                            </div>

                            <div class="flex flex-wrap gap-2 text-xs text-gray-600 mb-3">
                                <span class="flex items-center gap-1 bg-blue-50 text-blue-700 px-2 py-1 rounded font-semibold">
                                    <i class="fas fa-map-marker-alt"></i> ${job.city || 'Ville inconnue'}
                                </span>
                                <span class="flex items-center gap-1 bg-gray-100 text-gray-700 px-2 py-1 rounded font-medium">
                                    <i class="fas fa-file-contract"></i> ${contractLabel}
                                </span>
                                <span class="flex items-center gap-1 bg-green-50 text-green-700 px-2 py-1 rounded font-bold">
                                    <i class="fas fa-euro-sign"></i> ${salary}
                                </span>
                            </div>

                            <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                                ${job.description || 'Aucune description disponible.'}
                            </p>

                            <!-- ACTION BUTTONS -->
                            <div class="flex items-center gap-3">
                                ${currentUser ?
                    `<button onclick="event.stopPropagation(); applyToJob(this, '${job.id}')"
                                        class="apply-btn flex-1 px-4 py-2.5 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition shadow-md flex items-center justify-center gap-2">
                                        <i class="fas fa-paper-plane"></i> Postuler
                                    </button>` :
                    `<a href="<?php echo home_url('/login'); ?>?redirect=${encodeURIComponent(window.location.pathname)}"
                                        onclick="event.stopPropagation()"
                                        class="flex-1 px-4 py-2.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 transition shadow-md flex items-center justify-center gap-2">
                                        <i class="fas fa-lock"></i> Connectez-vous pour postuler
                                    </a>`
                }
                                <button onclick="event.stopPropagation(); window.location.href='<?php echo home_url('/emploi-opticien'); ?>?job_id=${job.id}'" 
                                        class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // --- Apply Function ---
        window.applyToJob = async function (btn, jobId) {
            if (btn.disabled) return;

            const originalContent = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
            btn.disabled = true;
            btn.classList.add('opacity-75');

            try {
                const { data: { session } } = await window.oblinkSupabase.auth.getSession();
                if (!session) throw new Error("Non connecté");

                // Check if already applied (double check)
                const { data: existing, error: checkError } = await window.oblinkSupabase
                    .from('applications')
                    .select('id')
                    .eq('offer_id', jobId)
                    .eq('opticien_id', session.user.id)
                    .maybeSingle();

                if (checkError) throw checkError;

                if (existing) {
                    throw new Error("Vous avez déjà postulé à cette offre.");
                }

                // Insert Application
                const { error } = await window.oblinkSupabase
                    .from('applications')
                    .insert([{
                        offer_id: jobId,
                        opticien_id: session.user.id,
                        status: 'pending'
                    }]);

                if (error) throw error;

                // Success UI
                btn.innerHTML = '<i class="fas fa-check-circle"></i> Candidature envoyée';
                btn.classList.remove('bg-oblink-blue', 'text-white', 'hover:bg-blue-600', 'shadow-blue-100');
                btn.classList.add('bg-green-100', 'text-green-700', 'cursor-default');

                // Toast
                if (typeof showToast === 'function') {
                    showToast('Candidature envoyée avec succès !', 'success');
                }

            } catch (err) {
                console.error('Apply error:', err);

                // Show error in a better way (not alert)
                btn.innerHTML = '<i class="fas fa-exclamation-circle"></i> Erreur';
                btn.classList.add('bg-red-100', 'text-red-700');

                // Reset after 3 seconds
                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    btn.classList.remove('opacity-75', 'bg-red-100', 'text-red-700');
                }, 3000);
            }
        }

        // --- Check Existing Applications ---
        async function checkApplications(userId, jobs) {
            const jobIds = jobs.map(j => j.id);
            if (jobIds.length === 0) return;

            const { data: applications } = await window.oblinkSupabase
                .from('applications')
                .select('offer_id')
                .eq('opticien_id', userId)
                .in('offer_id', jobIds);

            if (applications) {
                applications.forEach(app => {
                    const card = document.querySelector(`.job-card[data-job-id="${app.offer_id}"]`);
                    if (card) {
                        const btn = card.querySelector('.apply-btn');
                        if (btn) {
                            btn.innerHTML = '<i class="fas fa-check-circle"></i> Déjà postulé';
                            btn.classList.remove('bg-oblink-blue', 'text-white', 'hover:bg-blue-600', 'shadow-blue-100');
                            btn.classList.add('bg-gray-100', 'text-gray-500', 'cursor-default');
                            btn.disabled = true;
                        }
                    }
                });
            }
        }
    });
</script>

<?php
include get_template_directory() . "/footer-content.php";
wp_footer();
?>