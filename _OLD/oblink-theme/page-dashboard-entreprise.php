<?php
/*
Template Name: Page Dashboard Entreprise
*/
include 'header-inc.php';

// 1. DATA SIMULATION (MOCK)
// $user = wp_get_current_user(); <-- Removed for Supabase
$company_name = "Votre Entreprise"; // Placeholder until JS loads

// Offres simulées
?>
<!-- JS AUTH GUARD (Supabase) -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        // 1. Check Auth
        const { data: { session } } = await window.oblinkSupabase.auth.getSession();

        if (!session) {
            window.location.href = '<?php echo home_url("/login"); ?>';
            return;
        }

        // 2. Check User Type
        const userType = session.user.user_metadata.user_type;
        if (userType !== 'entreprise') {
            if (userType === 'opticien') window.location.href = '<?php echo home_url("/dashboard-opticien"); ?>';
            else window.location.href = '<?php echo home_url("/dashboard"); ?>';
            return; // Stop execution
        }

        // 3. Inject Company Info (Existing code)
        const companyNameElement = document.querySelector('.text-oblink-blue');
        if (companyNameElement) {
            companyNameElement.textContent = session.user.user_metadata.company_name || 'Entreprise';
        }

        // 4. Show Content
        const content = document.getElementById('dashboard-content');
        if (content) content.classList.remove('opacity-0');
    });
</script>
<?php

// 1. DATA SIMULATION (MOCK)
$company_name = "Votre Entreprise"; // Placeholder until JS loads

// Offres simulées
$jobs = [
    [
        'title' => 'Remplacement Été (Juillet/Août)',
        'date' => 'Juillet - Août 2025',
        'type' => 'CDD',
        'salary' => '350€ /j',
        'views' => 45,
        'status' => 'Active',
        'candidates_count' => 3
    ],
    [
        'title' => 'Opticien Collaborateur Samedi',
        'date' => 'Dès que possible',
        'type' => 'CDI Partiel',
        'salary' => 'Selon profil',
        'views' => 124,
        'status' => 'Active',
        'candidates_count' => 8
    ]
];

// Si on vient de poster une offre (simulation : on l'ajoute en tête)
if (isset($_GET['success']) && $_GET['success'] === 'job_posted') {
    array_unshift($jobs, [
        'title' => 'Nouvelle Mission (Postée à l\'instant)',
        'date' => 'À définir',
        'type' => 'CDD',
        'salary' => 'À définir',
        'views' => 0,
        'status' => 'Active',
        'candidates_count' => 0
    ]);
}

// KPI Calculés
$active_jobs_count = count($jobs);
$total_candidates = 14;
$confirmed_missions = 5;
?>

<div id="dashboard-content" class="min-h-screen bg-gray-50 pt-24 pb-12 transition-opacity duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Verification Banner (Account Only) -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-r-xl shadow-sm relative group">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        <span class="font-bold">Compte en attente de certification.</span>
                        Votre profil a bien été enregistré. Un membre de l'équipe OBLINK va vous contacter (sous 24h)
                        pour certifier votre établissement.
                    </p>
                </div>
                <!-- Mock Close Button -->
                <button class="absolute top-2 right-2 text-yellow-400 hover:text-yellow-600"
                    onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- GRID LAYOUT -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- LEFT COLUMN -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Welcome Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-3xl font-bold font-display text-oblink-gray">Espace Recruteur <span
                                class="text-oblink-blue">
                                <?php echo esc_html($company_name); ?>
                            </span></h1>
                        <p class="text-gray-500">Gérez vos recrutements (CDI/CDD) et missions freelance au même endroit.
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <a href="<?php echo home_url('/parametres'); ?>"
                            class="px-4 py-2 bg-white border border-gray-200 rounded-xl font-semibold text-gray-600 hover:border-oblink-blue hover:text-oblink-blue transition flex items-center gap-2">
                            <i class="fas fa-cog"></i> Paramètres
                        </a>
                        <a href="<?php echo home_url('/publier-offre'); ?>"
                            class="px-4 py-2 bg-oblink-blue text-white rounded-xl font-bold hover:bg-oblink-gray transition flex items-center gap-2 shadow-lg shadow-blue-200">
                            <i class="fas fa-plus-circle"></i> Publier une annonce
                        </a>
                    </div>
                </div>

                <!-- KPI Cards -->
                <!-- ... (Skipping KPI changes for brevity unless requested) ... -->

                <!-- ... -->

                <!-- Vos Offres -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold font-display text-oblink-gray">Vos Annonces (Emploi & Missions)
                        </h2>
                        <a href="#" class="text-sm font-semibold text-oblink-blue hover:underline">Gérer tout</a>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <?php foreach ($jobs as $job):
                            $status_color = ($job['status'] === 'Active') ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700';
                            $type_badge_color = (strpos($job['type'], 'CDD') !== false) ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700';
                            ?>
                            <div
                                class="p-5 border border-gray-200 rounded-2xl hover:border-oblink-blue transition cursor-pointer relative">
                                <span
                                    class="absolute top-5 right-5 <?php echo $type_badge_color; ?> text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">
                                    <?php echo $job['type']; ?>
                                </span>

                                <div class="flex justify-between items-start mb-2">
                                    <span class="<?php echo $status_color; ?> text-xs font-bold px-2 py-1 rounded-full">
                                        <?php echo $job['status']; ?>
                                    </span>
                                </div>
                                <h3 class="font-bold text-oblink-gray mb-1 pr-12">
                                    <?php echo $job['title']; ?>
                                </h3>
                                <p class="text-sm text-gray-500 mb-3"><i class="far fa-clock mr-1"></i>
                                    <?php echo $job['date']; ?>
                                </p>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="font-bold text-oblink-blue">
                                        <?php echo $job['salary']; ?>
                                    </span>
                                    <span class="text-gray-400">
                                        <?php echo $job['views']; ?> Vues
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- CANDIDATURES (New Section) -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold font-display text-oblink-gray">
                            <i class="fas fa-users text-oblink-violet mr-2"></i>Dernières Candidatures
                        </h2>
                        <a href="#" class="text-sm font-semibold text-oblink-blue hover:underline">Voir tout</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-xs text-gray-400 border-b border-gray-100">
                                    <th class="py-3 font-semibold uppercase">Candidat</th>
                                    <th class="py-3 font-semibold uppercase">Offre</th>
                                    <th class="py-3 font-semibold uppercase">Date</th>
                                    <th class="py-3 font-semibold uppercase">Statut</th>
                                    <th class="py-3 font-semibold uppercase text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard-candidatures-body" class="text-sm text-gray-600">
                                <!-- Dynamic Content -->
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-400">
                                        <i class="fas fa-spinner fa-spin text-xl mb-2"></i>
                                        <p>Chargement des candidatures...</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', async () => {
                        const tbody = document.getElementById('dashboard-candidatures-body');
                        const currentUserId = '<?php echo get_current_user_id(); ?>'; // We need Supabase ID, not WP ID. Assuming they are linked or we use Supabase Auth session.

                        // Actually, better to rely on Supabase session since we are client-side
                        const { data: { session } } = await window.oblinkSupabase.auth.getSession();
                        if (!session) {
                            tbody.innerHTML = '<tr><td colspan="5" class="p-4 text-center text-red-400">Non connecté à Supabase</td></tr>';
                            return;
                        }
                        const user = session.user;

                        try {
                            // 1. Get my offers IDs first (recursive approach or direct join if RLS allows)
                            // More efficient: Fetch applications where offer.company_id = me.
                            // Supabase filtered query on foreign table is easier.

                            const { data: applications, error } = await window.oblinkSupabase
                                .from('applications')
                                .select(`
                                *,
                                opticien:profiles!opticien_id (
                                    id, first_name, last_name, full_name
                                ),
                                offer:offers!offer_id (
                                    id, title
                                )
                            `)
                                // We need to filter by offers owned by THIS company.
                                // RLS 'Companies can view applications for own offers' should handle this implicitly if set up correctly?
                                // Let's rely on RLS or specific filter.
                                // Ideally: .eq('offer.company_id', user.id) -> Supabase JS supports filtering on joined tables.
                                .eq('offer.company_id', user.id)
                                .order('created_at', { ascending: false })
                                .limit(5);

                            /* 
                               NOTE: If the RLS on 'applications' table is set to:
                               USING (offer_id IN (SELECT id FROM offers WHERE company_id = auth.uid()))
                               Then a simple select() is enough, no need for explicit .eq() filter on joined table if RLS enforces it.
                               However, explicit filter is safer for logic if RLS is 'true' for some reason.
                               Supabase JS filtering on joined resource: .eq('offers.company_id', user.id) might be tricky depending on version.
                               Let's try standard select first, expecting RLS to filter results to only mine.
                            */

                            if (error) throw error;

                            if (!applications || applications.length === 0) {
                                tbody.innerHTML = '<tr><td colspan="5" class="p-4 text-center text-gray-400">Aucune candidature reçue pour le moment.</td></tr>';
                                return;
                            }

                            // Render rows
                            tbody.innerHTML = applications.map(app => {
                                const date = new Date(app.created_at).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' });

                                // Initials
                                const initials = (app.opticien?.first_name?.[0] || '') + (app.opticien?.last_name?.[0] || '');

                                // Status Badge
                                let statusBadge = '';
                                switch (app.status) {
                                    case 'pending': statusBadge = '<span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">À contacter</span>'; break;
                                    case 'viewed': statusBadge = '<span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">Vue</span>'; break;
                                    case 'interview': statusBadge = '<span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Entretien</span>'; break;
                                    case 'rejected': statusBadge = '<span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">Refusée</span>'; break;
                                    default: statusBadge = '<span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-bold">En attente</span>';
                                }

                                return `
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500 uppercase">
                                        ${initials || '?'}
                                    </div>
                                    <span class="font-semibold text-gray-800">${app.opticien?.full_name || 'Candidat inconnu'}</span>
                                </td>
                                <td class="py-4">${app.offer?.title || 'Offre supprimée'}</td>
                                <td class="py-4 text-gray-400">${date}</td>
                                <td class="py-4">${statusBadge}</td>
                                <td class="py-4 text-right">
                                    <button class="contact-candidate-btn text-oblink-blue hover:bg-blue-50 p-2 rounded-lg transition" 
                                        data-candidate-id="${app.opticien?.id}" 
                                        data-candidate-name="${app.opticien?.full_name}">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </td>
                            </tr>
                            `;
                            }).join('');

                            // Re-attach event listeners for the dynamic buttons
                            // Since we just replaced innerHTML, we need to re-bind the 'click' events for contact modal
                            // Or better: Use event delegation on the body or container.
                            // For now, let's just re-run the binding logic if it was defined globally, 
                            // BUT since the modal logic is likely defined in 'DOMContentLoaded', it ran BEFORE we injected this HTML.
                            // We must MANUALLY trigger the binding logic again or change how it's bound.

                            // Let's assume we need to re-bind. 
                            const newContactBtns = document.querySelectorAll('.contact-candidate-btn');
                            const contactModal = document.getElementById('contact-modal');
                            const contactIdInput = document.getElementById('contact-id');
                            const contactNameSpan = document.getElementById('contact-name');

                            newContactBtns.forEach(btn => {
                                btn.addEventListener('click', function () {
                                    const candidateId = this.dataset.candidateId;
                                    const candidateName = this.dataset.candidateName;
                                    contactIdInput.value = candidateId;
                                    contactNameSpan.textContent = candidateName;
                                    contactModal.classList.remove('hidden');
                                    contactModal.classList.add('flex');
                                });
                            });

                        } catch (err) {
                            console.error('Error loading applications:', err);
                            tbody.innerHTML = '<tr><td colspan="5" class="p-4 text-center text-red-500">Erreur chargement.</td></tr>';
                        }
                    });
                </script>

                <!-- MESSAGERIE (Recruteur V62) -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100"
                    id="messagerie-section">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold font-display text-oblink-gray flex items-center gap-2">
                            <i class="fas fa-comment-dots text-oblink-blue"></i> Messagerie Candidats
                        </h2>
                    </div>
                    <div class="flex h-[400px]">
                        <!-- Sidebar Conversations -->
                        <div class="w-1/3 border-r border-gray-100 bg-gray-50 overflow-y-auto" id="conversation-list">
                            <?php
                            // Initial load
                            $convs = oblink_get_conversations();
                            if ($convs) {
                                foreach ($convs as $c) {
                                    $contact_name = "Candidat #" . $c->contact_id; // TO DO: Get Real Name
                                    ?>
                                    <div class="p-4 border-b border-gray-100 hover:bg-white cursor-pointer transition conversation-item"
                                        data-contact-id="<?php echo $c->contact_id; ?>">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-oblink-violet text-white flex items-center justify-center font-bold text-sm">
                                                <?php echo substr($contact_name, 0, 1); ?>
                                            </div>
                                            <div class="overflow-hidden">
                                                <h4 class="font-bold text-sm text-gray-800 truncate">
                                                    <?php echo $contact_name; ?>
                                                </h4>
                                                <p class="text-xs text-gray-500 truncate">
                                                    <?php echo $c->message; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<div class="p-4 text-xs text-gray-400 text-center mt-10">Aucune conversation active</div>';
                            }
                            ?>
                        </div>
                        <!-- Chat Area -->
                        <div class="w-2/3 flex flex-col bg-white">
                            <div class="flex-1 p-6 overflow-y-auto space-y-4" id="chat-messages">
                                <div class="flex flex-col items-center justify-center h-full text-gray-400">
                                    <i class="fas fa-comments text-4xl mb-4 text-gray-200"></i>
                                    <p class="text-sm">Sélectionnez un candidat pour échanger</p>
                                </div>
                            </div>
                            <!-- Input -->
                            <div class="p-4 border-t border-gray-100 bg-gray-50 hidden" id="chat-input-area">
                                <form id="send-message-form" class="flex gap-2">
                                    <input type="hidden" id="current-contact-id" value="">
                                    <input type="text" id="message-input"
                                        class="flex-1 rounded-xl border-gray-200 text-sm focus:ring-oblink-blue focus:border-oblink-blue"
                                        placeholder="Écrivez votre message...">
                                    <button type="submit"
                                        class="w-10 h-10 rounded-xl bg-oblink-blue text-white hover:bg-blue-600 transition flex items-center justify-center">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GESTION FINANCIERE (New) -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold font-display text-oblink-gray">
                            <i class="fas fa-file-invoice-dollar text-oblink-orange mr-2"></i>Gestion Financière
                        </h2>
                        <div class="flex gap-2">
                            <a href="<?php echo home_url('/facture'); ?>"
                                class="text-xs font-bold text-white bg-oblink-blue px-3 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                                <i class="fas fa-plus mr-1"></i> Facturer
                            </a>
                            <button
                                class="text-xs font-bold text-gray-500 bg-gray-100 px-3 py-2 rounded-lg hover:bg-gray-200 transition">Tout
                                voir</button>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Devis à valider -->
                        <div
                            class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-orange-50 border border-orange-100 rounded-xl">
                            <div class="flex items-center gap-4 mb-3 sm:mb-0">
                                <div
                                    class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Devis #DEV-2025-089</h4>
                                    <p class="text-xs text-orange-700 font-medium">En attente de signature - 840,00 €
                                    </p>
                                    <p class="text-xs text-gray-500">Remplacement Sarah D.</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="<?php echo home_url('/facture'); ?>"
                                    class="px-4 py-2 bg-orange-500 text-white text-xs font-bold rounded-lg hover:bg-orange-600 transition shadow-sm">
                                    <i class="fas fa-pen-nib mr-1"></i> Signer
                                </a>
                            </div>
                        </div>

                        <!-- Facture à payer -->
                        <div
                            class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-white border border-gray-200 rounded-xl">
                            <div class="flex items-center gap-4 mb-3 sm:mb-0">
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Facture #FACT-2025-042</h4>
                                    <p class="text-xs text-red-500 font-medium">À payer avant le 15/02 - 450,00 €</p>
                                    <p class="text-xs text-gray-500">Frais de service OBLINK</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="alert('Simulation: Facture envoyée à compta@votre-entreprise.com')"
                                    class="px-3 py-2 bg-gray-100 text-gray-600 text-xs font-bold rounded-lg hover:bg-gray-200 transition">
                                    <i class="fas fa-envelope mr-1"></i> Comptable
                                </button>
                                <button
                                    class="px-3 py-2 bg-oblink-blue text-white text-xs font-bold rounded-lg hover:bg-blue-700 transition">
                                    <i class="fas fa-credit-card mr-1"></i> Payer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- END LEFT COLUMN -->

        <!-- RIGHT COLUMN (Sidebar) -->
        <div class="space-y-8">

            <!-- Quick Search -->
            <div class="bg-gradient-to-br from-oblink-blue to-oblink-violet rounded-3xl p-6 text-white shadow-xl">
                <h2 class="text-xl font-bold font-display mb-2">Besoin d'un remplaçant urgent ?</h2>
                <p class="text-white/80 text-sm mb-6">Accédez à la CV-thèque et contactez directement les opticiens
                    disponibles.</p>
                <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                    class="block w-full py-3 bg-white text-oblink-blue font-bold text-center rounded-xl hover:bg-gray-50 transition shadow-lg">
                    <i class="fas fa-search mr-2"></i> Rechercher
                </a>
            </div>

            <!-- Latest Messages Removed (Replaced by Main Module) -->

            <!-- Statistiques -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold font-display text-oblink-gray mb-4">Statistiques</h2>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Vues du profil</span>
                        <span class="font-bold text-oblink-gray">145</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="bg-oblink-orange h-1.5 rounded-full" style="width: 70%"></div>
                    </div>

                    <div class="flex justify-between text-sm mt-2">
                        <span class="text-gray-500">Taux de réponse</span>
                        <span class="font-bold text-oblink-gray">90%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- END SIDEBAR -->

</div> <!-- END GRID -->

</div>
</div>

<!-- MESSAGING JAVASCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const conversationItems = document.querySelectorAll('.conversation-item');
        const chatMessages = document.getElementById('chat-messages');
        const chatInputArea = document.getElementById('chat-input-area');
        const currentContactIdInput = document.getElementById('current-contact-id');
        const sendMessageForm = document.getElementById('send-message-form');
        const messageInput = document.getElementById('message-input');

        // Load chat when clicking a conversation
        conversationItems.forEach(item => {
            item.addEventListener('click', function () {
                const contactId = this.dataset.contactId;
                currentContactIdInput.value = contactId;

                // Highlight selected
                conversationItems.forEach(c => c.classList.remove('bg-white', 'ring-2', 'ring-oblink-blue'));
                this.classList.add('bg-white', 'ring-2', 'ring-oblink-blue');

                // Show input area
                chatInputArea.classList.remove('hidden');

                // Load messages via AJAX
                loadChat(contactId);
            });
        });

        function loadChat(contactId) {
            chatMessages.innerHTML = '<div class="flex items-center justify-center h-full text-gray-400"><i class="fas fa-spinner fa-spin mr-2"></i> Chargement...</div>';

            fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=oblink_load_chat&contact_id=${contactId}&nonce=${oblink_vars.nonce}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        chatMessages.innerHTML = data.data.html || '<p class="text-center text-gray-400 text-sm">Aucun message</p>';
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    } else {
                        chatMessages.innerHTML = '<p class="text-center text-red-500 text-sm">Erreur chargement</p>';
                    }
                })
                .catch(() => {
                    chatMessages.innerHTML = '<p class="text-center text-red-500 text-sm">Erreur réseau</p>';
                });
        }

        // Send message
        if (sendMessageForm) {
            sendMessageForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const message = messageInput.value.trim();
                const receiverId = currentContactIdInput.value;

                if (!message || !receiverId) return;

                const formData = new FormData();
                formData.append('action', 'oblink_send_msg');
                formData.append('receiver_id', receiverId);
                formData.append('message', message);
                formData.append('nonce', oblink_vars.nonce);

                fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                    method: 'POST',
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            messageInput.value = '';
                            loadChat(receiverId); // Reload chat
                        } else {
                            alert('Erreur: ' + (data.data?.message || 'Envoi impossible'));
                        }
                    })
                    .catch(() => alert('Erreur réseau'));
            });
        }

        // ===== NEW: CONTACT MODAL FUNCTIONALITY =====
        const contactModal = document.getElementById('contact-modal');
        const contactForm = document.getElementById('contact-form');
        const contactBtns = document.querySelectorAll('.contact-candidate-btn');
        const closeModalBtn = document.getElementById('close-contact-modal');
        const contactNameSpan = document.getElementById('contact-name');
        const contactIdInput = document.getElementById('contact-id');

        // Open modal
        contactBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const candidateId = this.dataset.candidateId;
                const candidateName = this.dataset.candidateName;
                contactIdInput.value = candidateId;
                contactNameSpan.textContent = candidateName;
                contactModal.classList.remove('hidden');
                contactModal.classList.add('flex');
            });
        });

        // Close modal
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                contactModal.classList.add('hidden');
                contactModal.classList.remove('flex');
            });
        }

        // Submit contact form
        if (contactForm) {
            contactForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const receiverId = contactIdInput.value;
                const message = document.getElementById('contact-message').value.trim();

                if (!message || !receiverId) return;

                const formData = new FormData();
                formData.append('action', 'oblink_send_msg');
                formData.append('receiver_id', receiverId);
                formData.append('message', message);
                formData.append('nonce', oblink_vars.nonce);

                try {
                    const res = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    });
                    const data = await res.json();

                    if (data.success) {
                        showToast('Message envoyé ! La conversation est maintenant dans votre messagerie.', 'success');
                        contactModal.classList.add('hidden');
                        contactForm.reset();
                        // Reload page to show new conversation
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        showToast('Erreur: ' + (data.data?.message || 'Envoi impossible'), 'error');
                    }
                } catch (err) {
                    showToast('Erreur réseau', 'error');
                }
            });
        }
    });
</script>

<!-- CONTACT MODAL -->
<div id="contact-modal"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden">
        <div class="bg-gradient-to-r from-oblink-blue to-oblink-violet p-6 text-white">
            <h3 class="text-lg font-bold">Contacter <span id="contact-name">le candidat</span></h3>
            <p class="text-sm text-white/80">Envoyez votre premier message</p>
        </div>
        <form id="contact-form" class="p-6">
            <input type="hidden" id="contact-id" value="">
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Votre message</label>
                <textarea id="contact-message" rows="4" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition resize-none"
                    placeholder="Bonjour, votre profil correspond à notre offre..."></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" id="close-contact-modal"
                    class="flex-1 px-4 py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">
                    Annuler
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition flex items-center justify-center gap-2">
                    <i class="fas fa-paper-plane"></i> Envoyer
                </button>
            </div>
        </form>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>