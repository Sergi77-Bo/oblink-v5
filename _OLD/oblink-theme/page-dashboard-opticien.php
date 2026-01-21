<?php
/*
Template Name: Page Dashboard Opticien
*/
include 'header-inc.php';
?>

<!-- JS AUTH GUARD (Supabase) -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        // 1. Check Auth Immediately
        const { data: { session } } = await window.oblinkSupabase.auth.getSession();

        if (!session) {
            // Not logged in -> Redirect Login
            window.location.href = '<?php echo home_url("/login"); ?>';
            return;
        }

        // 2. Check User Type (Security)
        const userType = session.user.user_metadata.user_type;
        if (userType !== 'opticien') {
            // Wrong dashboard -> Redirect correct one
            if (userType === 'entreprise') window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
            else window.location.href = '<?php echo home_url("/dashboard"); ?>';
        }

        // 3. Inject User Name
        const userNameElement = document.getElementById('dashboard-username');
        if (userNameElement) {
            userNameElement.textContent = session.user.user_metadata.first_name || 'Partenaire';
        }

        // 4. Show Content (Remove Cloak)
        document.getElementById('dashboard-content').classList.remove('opacity-0');
    });
</script>

<!-- Main Content (Always Visible) -->
<div id="dashboard-content" class="min-h-screen bg-gray-50 pt-24 pb-12 transition-opacity duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Welcome Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold font-display text-oblink-gray">Bonjour, <span class="text-oblink-orange"
                        id="dashboard-username">...</span> 👋</h1>
                <p class="text-gray-500">Voici ce qui se passe aujourd'hui sur votre espace.</p>
            </div>
            <div class="flex gap-3">
                <a href="<?php echo home_url('/parametres'); ?>"
                    class="px-4 py-2 bg-white border border-gray-200 rounded-xl font-semibold text-gray-600 hover:border-oblink-orange hover:text-oblink-orange transition flex items-center gap-2">
                    <i class="fas fa-cog"></i> Mes Paramètres
                </a>
                <a href="<?php echo home_url('/devis'); ?>"
                    class="px-4 py-2 bg-oblink-gray text-white rounded-xl font-bold hover:bg-oblink-orange transition flex items-center gap-2">
                    <i class="fas fa-file-invoice"></i> Nouveau Devis
                </a>
            </div>
        </div>

        <!-- KPI Cards (MOCKS STATIQUES POUR L'INSTANT) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- CA Mensuel -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-10 h-10 rounded-full bg-oblink-orange/10 flex items-center justify-center text-oblink-orange">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                    <span class="text-xs text-green-500 font-bold bg-green-50 px-2 py-1 rounded-full">+12%</span>
                </div>
                <h3 class="text-2xl font-bold text-oblink-gray mb-1">
                    1 400 €
                </h3>
                <p class="text-xs text-gray-400 uppercase font-semibold tracking-wider">CA Confirmé (Jan)</p>
            </div>

            <!-- Missions -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-10 h-10 rounded-full bg-oblink-blue/10 flex items-center justify-center text-oblink-blue">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-oblink-gray mb-1">3</h3>
                <p class="text-xs text-gray-400 uppercase font-semibold tracking-wider">Missions proposées</p>
            </div>

            <!-- Candidatures -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-10 h-10 rounded-full bg-oblink-violet/10 flex items-center justify-center text-oblink-violet">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <span class="text-xs text-oblink-orange font-bold bg-orange-50 px-2 py-1 rounded-full">2 news</span>
                </div>
                <h3 class="text-2xl font-bold text-oblink-gray mb-1">5</h3>
                <p class="text-xs text-gray-400 uppercase font-semibold tracking-wider">Candidatures en cours</p>
            </div>

            <!-- Note -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-oblink-gray mb-1">4.9/5</h3>
                <p class="text-xs text-gray-400 uppercase font-semibold tracking-wider">Note Moyenne</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT COLUMN (Main Content) -->
            <div class="lg:col-span-2 space-y-8">

                <!-- MESSAGERIE (Full Implementation) -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100"
                    id="messagerie-section">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold font-display text-oblink-gray flex items-center gap-2">
                            <i class="fas fa-comment-dots text-oblink-orange"></i> Messagerie
                        </h2>
                    </div>
                    <div class="flex h-[350px]">
                        <!-- Sidebar Conversations -->
                        <div class="w-1/3 border-r border-gray-100 bg-gray-50 overflow-y-auto" id="conversation-list">
                            <?php
                            $convs = oblink_get_conversations();
                            if ($convs) {
                                foreach ($convs as $c) {
                                    $contact = get_userdata($c->contact_id);
                                    $contact_name = $contact ? $contact->display_name : "Entreprise #" . $c->contact_id;
                                    ?>
                                    <div class="p-4 border-b border-gray-100 hover:bg-white cursor-pointer transition conversation-item"
                                        data-contact-id="<?php echo $c->contact_id; ?>">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-oblink-blue text-white flex items-center justify-center font-bold text-sm">
                                                <?php echo strtoupper(substr($contact_name, 0, 1)); ?>
                                            </div>
                                            <div class="overflow-hidden">
                                                <h4 class="font-bold text-sm text-gray-800 truncate">
                                                    <?php echo esc_html($contact_name); ?>
                                                </h4>
                                                <p class="text-xs text-gray-500 truncate">
                                                    <?php echo esc_html(substr($c->message, 0, 40)); ?>...
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
                                    <p class="text-sm">Sélectionnez une conversation</p>
                                </div>
                            </div>
                            <!-- Input -->
                            <div class="p-4 border-t border-gray-100 bg-gray-50 hidden" id="chat-input-area">
                                <form id="send-message-form" class="flex gap-2">
                                    <input type="hidden" id="current-contact-id" value="">
                                    <input type="text" id="message-input"
                                        class="flex-1 rounded-xl border-gray-200 text-sm focus:ring-oblink-orange focus:border-oblink-orange"
                                        placeholder="Écrivez votre message...">
                                    <button type="submit"
                                        class="w-10 h-10 rounded-xl bg-oblink-orange text-white hover:bg-orange-600 transition flex items-center justify-center">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Missions (DYNAMIC) -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold font-display text-oblink-gray">Missions récentes</h2>
                        <a href="<?php echo home_url('/emploi-opticien'); ?>"
                            class="text-sm font-semibold text-oblink-blue hover:underline">Voir tout</a>
                    </div>

                    <div id="dashboard-offers-container" class="space-y-4">
                        <!-- Loading State -->
                        <div class="text-center py-8 text-gray-400">
                            <i class="fas fa-spinner fa-spin text-2xl mb-2"></i>
                            <p>Chargement des offres...</p>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', async () => {
                        const container = document.getElementById('dashboard-offers-container');

                        try {
                            // Fetch active offers
                            const { data: offers, error } = await window.oblinkSupabase
                                .from('offers')
                                .select(`
                                *,
                                company:profiles!company_id (
                                    company_name,
                                    company_city
                                )
                            `)
                                .eq('status', 'active')
                                .order('created_at', { ascending: false })
                                .limit(5);

                            if (error) throw error;

                            if (!offers || offers.length === 0) {
                                container.innerHTML = '<div class="p-4 text-center text-gray-500">Aucune offre disponible pour le moment.</div>';
                                return;
                            }

                            // Render offers
                            container.innerHTML = offers.map(offer => {
                                const startDate = new Date(offer.start_date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' });
                                const endDate = offer.end_date ? new Date(offer.end_date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' }) : '';
                                const dateDisplay = endDate ? `${startDate} - ${endDate}` : `À partir du ${startDate}`;

                                // Determine color based on title first letter (randomish)
                                const letter = offer.company?.company_name?.charAt(0) || 'O';
                                const colors = ['oblink-blue', 'oblink-violet', 'oblink-orange'];
                                const colorClass = colors[offer.title.length % 3];

                                return `
                            <div class="flex flex-col md:flex-row md:items-center justify-between p-4 bg-gray-50 rounded-2xl border border-gray-100 hover:border-oblink-blue/30 transition group cursor-pointer" onclick="window.location.href='<?php echo home_url('/emploi-opticien'); ?>?id=${offer.id}'">
                                <div class="flex items-center gap-4 mb-4 md:mb-0">
                                    <div class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center text-xl font-bold ${colorClass}">
                                        ${letter}
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-oblink-gray group-hover:text-oblink-blue transition">
                                            ${offer.title}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            <span class="font-semibold text-gray-700">${offer.company?.company_name || 'Entreprise confidentielle'}</span> • 
                                            <i class="far fa-calendar ml-1 mr-1"></i> ${dateDisplay}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-right">
                                        <span class="block font-bold text-oblink-gray">${offer.daily_rate} €/j</span>
                                        <span class="text-xs text-gray-500">${offer.city}</span>
                                    </div>
                                </div>
                            </div>
                            `;
                            }).join('');

                        } catch (err) {
                            console.error('Error loading offers:', err);
                            container.innerHTML = '<div class="text-red-500 text-center py-4">Impossible de charger les offres.</div>';
                        }
                    });
                </script>

                <!-- Available Missions Suggestions -->
                <div
                    class="bg-gradient-to-br from-oblink-gray to-black rounded-3xl p-6 md:p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-oblink-orange/20 rounded-full blur-[80px]"></div>

                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div>
                            <h2 class="text-xl font-bold font-display mb-2">3 nouvelles missions correspondent à votre
                                profil</h2>
                            <p class="text-white/60 text-sm">Basé sur vos préférences : Paris, >300€/j</p>
                        </div>
                        <a href="<?php echo home_url('/emploi-opticien'); ?>"
                            class="whitespace-nowrap px-6 py-3 bg-oblink-orange text-white font-bold rounded-xl hover:bg-white hover:text-oblink-orange transition shadow-lg shadow-oblink-orange/30">
                            Voir les offres
                        </a>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN (Sidebar) -->
            <div class="space-y-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold font-display text-oblink-gray mb-4">Accès Rapide</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="<?php echo home_url('/facture'); ?>"
                            class="p-4 rounded-xl bg-orange-100 hover:bg-orange-200 text-center transition group">
                            <i
                                class="fas fa-file-invoice-dollar text-2xl text-oblink-orange mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="block text-xs font-bold text-oblink-gray">Nouvelle Facture</span>
                        </a>
                        <a href="<?php echo home_url('/generateur-contrat'); ?>"
                            class="p-4 rounded-xl bg-blue-50 hover:bg-blue-100 text-center transition group">
                            <i
                                class="fas fa-file-contract text-2xl text-oblink-blue mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="block text-xs font-bold text-oblink-gray">Générateur Contrat</span>
                        </a>
                        <a href="<?php echo home_url('/formation-erp'); ?>"
                            class="p-4 rounded-xl bg-purple-50 hover:bg-purple-100 text-center transition group">
                            <i
                                class="fas fa-graduation-cap text-2xl text-oblink-violet mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="block text-xs font-bold text-oblink-gray">Formation</span>
                        </a>
                        <a href="<?php echo home_url('/simulateur'); ?>"
                            class="p-4 rounded-xl bg-gray-50 hover:bg-gray-100 text-center transition group">
                            <i
                                class="fas fa-calculator text-2xl text-gray-500 mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="block text-xs font-bold text-oblink-gray">Simulateur</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

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
                conversationItems.forEach(c => c.classList.remove('bg-white', 'ring-2', 'ring-oblink-orange'));
                this.classList.add('bg-white', 'ring-2', 'ring-oblink-orange');

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
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>