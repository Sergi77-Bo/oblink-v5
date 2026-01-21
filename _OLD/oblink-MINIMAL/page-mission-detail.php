<?php
/*
Template Name: Mission Detail
*/
header('Content-Type: text/html; charset=utf-8');
include 'header-inc.php';

// Get job ID from URL parameter
$job_id = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : null;
?>

<!-- Loading State -->
<div id="loading-state" class="min-h-screen bg-gray-50 pt-32 flex items-center justify-center" aria-live="polite">
    <div class="text-center">
        <i class="fas fa-circle-notch fa-spin text-4xl text-oblink-blue mb-4"></i>
        <p class="text-gray-500">Chargement de l'offre...</p>
    </div>
</div>

<!-- Job Detail Content (Hidden initially) -->
<div id="job-detail" class="min-h-screen bg-gray-50 pt-32 pb-20 hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Back Button -->
        <a href="<?php echo home_url('/emploi-opticien'); ?>"
            class="inline-flex items-center text-gray-600 hover:text-oblink-blue mb-6 transition"
            aria-label="Retour à la liste des offres">
            <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i> Retour aux offres
        </a>

        <!-- Job Card -->
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

            <!-- Header with Company -->
            <div class="bg-gradient-to-r from-oblink-blue/10 to-oblink-violet/10 p-8">
                <div class="flex items-start gap-6">
                    <div id="company-logo"
                        class="w-16 h-16 rounded-2xl flex items-center justify-center text-2xl font-bold border-2 border-white shadow-lg"
                        aria-label="Logo de l'entreprise">
                        <!-- Dynamically filled -->
                    </div>
                    <div class="flex-1">
                        <h1 id="job-title" class="text-3xl font-bold text-oblink-gray mb-2">
                            <!-- Dynamically filled -->
                        </h1>
                        <p id="company-name" class="text-lg text-gray-600">
                            <!-- Dynamically filled -->
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons (Sticky on scroll) -->
            <div id="action-bar" class="sticky top-20 z-30 bg-white border-b border-gray-100 p-6 flex gap-3">
                <!-- Dynamically filled based on auth -->
            </div>

            <!-- Job Details -->
            <div class="p-8 space-y-8">

                <!-- Key Info Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4" role="list">
                    <div class="text-center p-4 bg-blue-50 rounded-xl" role="listitem">
                        <i class="fas fa-map-marker-alt text-oblink-blue text-xl mb-2" aria-hidden="true"></i>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Localisation</p>
                        <p id="job-city" class="font-bold text-oblink-gray">-</p>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-xl" role="listitem">
                        <i class="fas fa-euro-sign text-green-600 text-xl mb-2" aria-hidden="true"></i>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Rémunération</p>
                        <p id="job-salary" class="font-bold text-oblink-gray">-</p>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-xl" role="listitem">
                        <i class="fas fa-file-contract text-purple-600 text-xl mb-2" aria-hidden="true"></i>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Type</p>
                        <p id="job-contract" class="font-bold text-oblink-gray">-</p>
                    </div>
                    <div class="text-center p-4 bg-orange-50 rounded-xl" role="listitem">
                        <i class="fas fa-calendar-alt text-oblink-orange text-xl mb-2" aria-hidden="true"></i>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Début</p>
                        <p id="job-start-date" class="font-bold text-oblink-gray">-</p>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="text-2xl font-bold text-oblink-gray mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle text-oblink-blue" aria-hidden="true"></i> Description du poste
                    </h2>
                    <div id="job-description" class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
                        <!-- Dynamically filled -->
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-bold text-lg text-oblink-gray mb-3">📍 Détails du contrat</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li id="job-duration"><!-- Dynamically filled --></li>
                            <li id="job-hours"><!-- Dynamically filled --></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-oblink-gray mb-3">✨ Avantages</h3>
                        <div id="job-benefits" class="space-y-2 text-gray-600">
                            <!-- Dynamically filled -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Contact Section (for messaging later) -->
        <div id="contact-section" class="mt-6 hidden">
            <!-- Will be implemented in v2 -->
        </div>

    </div>
</div>

<script>
    // Toast Helper
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 text-white px-6 py-4 rounded-xl shadow-xl z-50 animate-bounce ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
        toast.innerHTML = `<i class="fas ${type === 'success' ? 'fa-check' : 'fa-exclamation-circle'} mr-2"></i>${message}`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    document.addEventListener('DOMContentLoaded', async () => {
        const jobId = '<?php echo $job_id; ?>';
        const loadingState = document.getElementById('loading-state');
        const jobDetail = document.getElementById('job-detail');

        if (!jobId) {
            loadingState.innerHTML = '<p class="text-red-500">ID de mission manquant</p>';
            return;
        }

        try {
            // Get current user
            const { data: { session } } = await window.oblinkSupabase.auth.getSession();
            const currentUser = session?.user || null;

            // Fetch job details (simplified query - no JOIN)
            const { data: job, error } = await window.oblinkSupabase
                .from('offers')
                .select('*')
                .eq('id', jobId)
                .single();

            if (error) throw error;
            if (!job) throw new Error('Offre introuvable');

            console.log('Job loaded:', job);

            // Populate job details
            document.getElementById('job-title').textContent = job.title;
            document.getElementById('company-name').textContent = job.company_name || 'Entreprise confidentielle';
            document.getElementById('job-city').textContent = job.city || 'Non spécifié';
            document.getElementById('job-salary').textContent = job.daily_rate ? `${job.daily_rate}€/jour` : 'À négocier';
            document.getElementById('job-contract').textContent = job.contract_type?.toUpperCase() || 'Non spécifié';
            document.getElementById('job-start-date').textContent = job.start_date ?
                new Date(job.start_date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' }) :
                'Dès que possible';
            document.getElementById('job-description').textContent = job.description || 'Aucune description disponible.';

            // Company logo
            const letter = job.company_name?.charAt(0) || 'O';
            const colors = ['bg-blue-100 text-blue-600', 'bg-purple-100 text-purple-600', 'bg-orange-100 text-orange-600'];
            const colorClass = colors[job.title.length % 3];
            document.getElementById('company-logo').className = `w-16 h-16 rounded-2xl flex items-center justify-center text-2xl font-bold border-2 border-white shadow-lg ${colorClass}`;
            document.getElementById('company-logo').textContent = letter;

            // Duration & Hours
            document.getElementById('job-duration').innerHTML = `<i class="fas fa-clock text-oblink-blue mr-2"></i> Durée: ${job.duration || 'Indéterminée'}`;
            document.getElementById('job-hours').innerHTML = `<i class="fas fa-hourglass-half text-oblink-blue mr-2"></i> Temps de travail: ${job.work_hours || '35h/semaine'}`;

            // Benefits
            const benefits = job.benefits || 'Avantages standards';
            document.getElementById('job-benefits').innerHTML = `<p>${benefits}</p>`;

            // Action buttons
            const actionBar = document.getElementById('action-bar');
            if (currentUser) {
                // Check if already applied
                const { data: existingApp } = await window.oblinkSupabase
                    .from('applications')
                    .select('id')
                    .eq('offer_id', jobId)
                    .eq('opticien_id', currentUser.id)
                    .maybeSingle(); // Changed to maybeSingle for safety

                if (existingApp) {
                    actionBar.innerHTML = `
                    <button class="flex-1 px-6 py-4 bg-green-100 text-green-700 font-bold rounded-xl cursor-default flex items-center justify-center gap-2" aria-disabled="true">
                        <i class="fas fa-check-circle" aria-hidden="true"></i> Déjà postulé
                    </button>
                `;
                } else {
                    actionBar.innerHTML = `
                    <button onclick="applyToJob(this, '${jobId}')" 
                            class="flex-1 px-6 py-4 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition shadow-lg flex items-center justify-center gap-2 shadow-blue-200">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i> Postuler maintenant
                    </button>
                    <button onclick="contactCompany()" 
                            class="px-6 py-4 bg-white border-2 border-oblink-blue text-oblink-blue font-bold rounded-xl hover:bg-blue-50 transition flex items-center justify-center gap-2">
                        <i class="fas fa-envelope" aria-hidden="true"></i> Contacter
                    </button>
                `;
                }
            } else {
                actionBar.innerHTML = `
                <a href="<?php echo home_url('/login'); ?>?redirect=/mission-detail?id=${jobId}" 
                   class="flex-1 px-6 py-4 bg-oblink-gray text-white font-bold rounded-xl hover:bg-gray-800 transition shadow-lg flex items-center justify-center gap-2">
                    <i class="fas fa-lock" aria-hidden="true"></i> Connectez-vous pour postuler
                </a>
            `;
            }

            // Show content
            loadingState.classList.add('hidden');
            jobDetail.classList.remove('hidden');

        } catch (error) {
            console.error('Error loading job:', error);
            loadingState.innerHTML = `<p class="text-red-500">Erreur: ${error.message}</p>`;
        }
    });

    // Apply function
    window.applyToJob = async function (btn, jobId) {
        if (btn.disabled) return;
        const originalContent = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
        btn.disabled = true;

        try {
            const { data: { session } } = await window.oblinkSupabase.auth.getSession();
            if (!session) throw new Error("Non connecté");

            const { error } = await window.oblinkSupabase
                .from('applications')
                .insert([{
                    offer_id: jobId,
                    opticien_id: session.user.id,
                    status: 'pending'
                }]);

            if (error) throw error;

            showToast('Candidature envoyée avec succès !', 'success');

            // Update UI
            btn.innerHTML = '<i class="fas fa-check-circle"></i> Déjà postulé';
            btn.className = 'flex-1 px-6 py-4 bg-green-100 text-green-700 font-bold rounded-xl cursor-default flex items-center justify-center gap-2';
            btn.removeAttribute('onclick');


        } catch (error) {
            console.error('Apply error:', error);
            showToast('Erreur: ' + error.message, 'error');
            btn.innerHTML = originalContent;
            btn.disabled = false;
        }
    }

    // Contact function (placeholder)
    window.contactCompany = function () {
        showToast('Fonctionnalité de messagerie disponible prochainement !', 'success');
    }
</script>

<?php
include get_template_directory() . "/footer-content.php";
wp_footer();
?>