<?php
/**
 * Template Name: Offres Emploi Opticien
 */

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

        <!-- LOADING STATE -->
        <div id="loading-state" class="text-center py-12">
            <i class="fas fa-circle-notch fa-spin text-4xl text-oblink-blue mb-4"></i>
            <p class="text-gray-500">Recherche des meilleures missions...</p>
        </div>

        <!-- JOBS LIST CONTAINER -->
        <div id="jobs-container" class="grid gap-6 max-w-4xl mx-auto hidden">
            <!-- Jobs will be injected here via JS -->
        </div>

        <!-- EMPTY STATE -->
        <div id="empty-state" class="hidden text-center py-12 max-w-2xl mx-auto">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">🧐
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Aucune offre pour le moment</h3>
                <p class="text-gray-500">Revenez plus tard, de nouvelles missions sont ajoutées chaque jour.</p>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const loadingState = document.getElementById('loading-state');
        const jobsContainer = document.getElementById('jobs-container');
        const emptyState = document.getElementById('empty-state');

        let currentUser = null;

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

            // Render Jobs
            jobsContainer.innerHTML = jobs.map(job => renderJobCard(job)).join('');
            jobsContainer.classList.remove('hidden');

            // Check application status for logged user
            if (currentUser) {
                checkApplications(currentUser.id, jobs);
            }

        } catch (err) {
            console.error('Error loading jobs:', err);
            loadingState.innerHTML = `<p class="text-red-500">Erreur: ${err.message || 'Chargement impossible.'}</p><p class="text-xs text-gray-400 mt-2">Vérifiez la console (F12) pour plus de détails.</p>`;
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
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group relative overflow-hidden job-card" data-job-id="${job.id}">
                    <div class="flex flex-col md:flex-row gap-6 mt-2">
                        <!-- LOGO -->
                        <div class="w-16 h-16 rounded-xl flex-shrink-0 flex items-center justify-center text-xl font-bold border border-gray-200 ${colorClass}">
                            ${letter}
                        </div>

                        <!-- CONTENT -->
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-2">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-oblink-blue transition">
                                    ${job.title}
                                </h3>
                                <span class="text-xs text-gray-400 font-medium whitespace-nowrap">
                                    <i class="far fa-clock mr-1"></i> Publié le ${new Date(job.created_at).toLocaleDateString('fr-FR')}
                                </span>
                            </div>

                            <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-4">
                                <span class="flex items-center gap-1.5 bg-blue-50 text-blue-700 px-2.5 py-1 rounded-md font-semibold">
                                    <i class="fas fa-map-marker-alt"></i> ${job.city || job.company?.company_city || 'Ville inconnue'}
                                </span>
                                <span class="flex items-center gap-1.5 bg-gray-100 text-gray-700 px-2.5 py-1 rounded-md font-medium">
                                    <i class="fas fa-file-contract"></i> ${contractLabel}
                                </span>
                                <span class="flex items-center gap-1.5 bg-green-50 text-green-700 px-2.5 py-1 rounded-md font-bold">
                                    <i class="fas fa-euro-sign"></i> ${salary}
                                </span>
                            </div>

                            <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                                ${job.description || 'Aucune description disponible.'}
                            </p>

                            <!-- ACTION BUTTONS -->
                            <div class="flex items-center gap-4">
                                ${currentUser ?
                    `<button onclick="applyToJob(this, '${job.id}')"
                                        class="apply-btn px-6 py-2.5 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition shadow-lg shadow-blue-100 flex items-center gap-2">
                                        <i class="fas fa-paper-plane"></i> Postuler en 1 clic
                                    </button>` :
                    `<a href="<?php echo home_url('/inscription-opticien'); ?>"
                                        class="px-6 py-2.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 transition shadow-lg flex items-center gap-2">
                                        <i class="fas fa-lock"></i> Connectez-vous pour postuler
                                    </a>`
                }
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
                const { data: existing } = await window.oblinkSupabase
                    .from('applications')
                    .select('id')
                    .eq('offer_id', jobId)
                    .eq('opticien_id', session.user.id)
                    .single();

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
                alert(err.message || "Erreur lors de la candidature");
                btn.innerHTML = originalContent;
                btn.disabled = false;
                btn.classList.remove('opacity-75');
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