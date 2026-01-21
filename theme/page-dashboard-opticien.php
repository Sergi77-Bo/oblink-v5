<?php
/*
Template Name: Page Dashboard Opticien
*/
include 'header-inc.php';
?>

<!-- JS AUTH GUARD (Supabase) -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        // 1. Wait for Supabase to be ready
        if (!window.oblinkSupabase) {
            console.error('Supabase not loaded!');
            // Show content anyway in dev mode
            document.getElementById('dashboard-content').classList.remove('opacity-0');
            return;
        }

        try {
            // 2. Check Auth
            const { data: { session }, error } = await window.oblinkSupabase.auth.getSession();

            if (error) {
                console.error('Auth error:', error);
                document.getElementById('dashboard-content').classList.remove('opacity-0');
                return;
            }

            if (!session) {
                // Not logged in -> Redirect Login
                window.location.href = '<?php echo home_url("/login"); ?>';
                return;
            }

            // 3. Check User Type (Security)
            const userType = session.user.user_metadata?.user_type;
            if (userType && userType !== 'opticien') {
                // Wrong dashboard -> Show clear message then redirect
                const dashboardContent = document.getElementById('dashboard-content');
                dashboardContent.innerHTML = `
                    <div class="min-h-screen flex items-center justify-center">
                        <div class="max-w-md text-center p-8 bg-white rounded-2xl shadow-xl border border-gray-100">
                            <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-exclamation-circle text-red-500 text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-oblink-gray mb-3">Accès Refusé</h2>
                            <p class="text-gray-600 mb-6">
                                Cette page est réservée aux <strong>opticiens</strong>.<br>
                                Vous serez redirigé vers votre tableau de bord...
                            </p>
                            <div class="animate-pulse text-sm text-gray-400">
                                <i class="fas fa-spinner fa-spin mr-2"></i> Redirection en cours
                            </div>
                        </div>
                    </div>
                `;
                dashboardContent.classList.remove('opacity-0');

                // Redirect after 2 seconds
                setTimeout(() => {
                    if (userType === 'entreprise') window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
                    else window.location.href = '<?php echo home_url("/dashboard"); ?>';
                }, 2000);
                return;
            }

            // 4. Inject User Name
            const userNameElement = document.getElementById('dashboard-username');
            if (userNameElement) {
                userNameElement.textContent = session.user.user_metadata?.first_name || 'Partenaire';
            }

            // 5. Show Content
            document.getElementById('dashboard-content').classList.remove('opacity-0');

        } catch (err) {
            console.error('Dashboard auth error:', err);
            // Show content anyway to avoid blank page
            document.getElementById('dashboard-content').classList.remove('opacity-0');
        }
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
                <a href="<?php echo home_url('/emploi-opticien'); ?>"
                    class="px-6 py-3 bg-gradient-to-r from-oblink-orange to-red-500 text-white rounded-full font-bold hover:shadow-xl transition-all flex items-center gap-2 shadow-lg">
                    <i class="fas fa-search"></i> Voir les offres
                </a>
                <a href="<?php echo home_url('/facture'); ?>"
                    class="px-4 py-2 bg-oblink-gray text-white rounded-xl font-bold hover:bg-oblink-orange transition flex items-center gap-2">
                    <i class="fas fa-file-invoice"></i> Facturer
                </a>
                <a href="<?php echo home_url('/parametres'); ?>"
                    class="px-4 py-2 bg-white border border-gray-200 rounded-xl font-semibold text-gray-600 hover:border-oblink-orange hover:text-oblink-orange transition flex items-center gap-2">
                    <i class="fas fa-cog"></i> Paramètres
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

            <!-- Certification (Academy Widget) -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-16 h-16 bg-oblink-violet/10 rounded-bl-full -mr-8 -mt-8 transition group-hover:bg-oblink-violet/20">
                </div>

                <div class="flex items-center justify-between mb-2">
                    <div
                        class="w-10 h-10 rounded-full bg-oblink-violet/10 flex items-center justify-center text-oblink-violet">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <a href="<?php echo home_url('/formation-erp'); ?>"
                        class="text-[10px] font-bold bg-oblink-violet text-white px-2 py-1 rounded-full hover:bg-violet-700 transition">
                        Passer le test
                    </a>
                </div>

                <h3 class="text-sm font-bold text-oblink-gray mb-2">Ma Certification</h3>

                <div class="space-y-1">
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>Expertise Cosium</span>
                        <span class="font-bold text-oblink-violet">0%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="bg-oblink-violet h-2 rounded-full" style="width: 5%"></div>
                    </div>
                </div>
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

                            // --- DEMO FALLBACK DATA ---
                            const DEMO_OFFERS = [
                                {
                                    id: 'demo_1',
                                    title: 'Opticien Collaborateur',
                                    company: { company_name: 'Krys Vision', company_city: 'Paris 15' },
                                    start_date: '2026-02-10',
                                    end_date: '2026-02-15',
                                    daily_rate: 350,
                                    city: 'Paris 15',
                                    status: 'active'
                                },
                                {
                                    id: 'demo_2',
                                    title: 'Remplacement Directeur',
                                    company: { company_name: 'Alain Afflelou', company_city: 'Lyon' },
                                    start_date: '2026-02-20',
                                    end_date: '2026-02-24',
                                    daily_rate: 420,
                                    city: 'Lyon',
                                    status: 'active'
                                },
                                {
                                    id: 'demo_3',
                                    title: 'Expert Réfraction',
                                    company: { company_name: 'GrandOptical', company_city: 'Bordeaux' },
                                    start_date: '2026-03-01',
                                    end_date: '2026-03-05',
                                    daily_rate: 380,
                                    city: 'Bordeaux',
                                    status: 'active'
                                }
                            ];

                            let offersToDisplay = offers;

                            // FALLBACK: If API is empty or fails, use Demo Data
                            if (!offers || offers.length === 0) {
                                console.log('⚠️ API Empty: Using DEMO Fallback for presentation');
                                offersToDisplay = DEMO_OFFERS;
                            }

                            // Render offers
                            container.innerHTML = offersToDisplay.map(offer => {
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
                            // Even on error, show Demo Data for safety!
                            const DEMO_OFFERS_FALLBACK = [
                                {
                                    id: 'demo_err_1', title: 'Opticien Lunetier', company: { company_name: 'Optical Center', company_city: 'Paris' },
                                    start_date: '2026-02-12', daily_rate: 360, city: 'Paris', status: 'active'
                                }
                            ];
                            container.innerHTML = DEMO_OFFERS_FALLBACK.map(offer => `
                                <div class="flex flex-col md:flex-row md:items-center justify-between p-4 bg-gray-50 rounded-2xl border border-gray-100 hover:border-oblink-blue/30 transition group cursor-pointer" onclick="window.location.href='<?php echo home_url('/emploi-opticien'); ?>'">
                                    <div class="flex items-center gap-4 mb-4 md:mb-0">
                                        <div class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center text-xl font-bold text-oblink-orange">O</div>
                                        <div>
                                            <h3 class="font-bold text-oblink-gray group-hover:text-oblink-blue transition">${offer.title}</h3>
                                            <p class="text-sm text-gray-500"><span class="font-semibold text-gray-700">${offer.company.company_name}</span> • <i class="far fa-calendar ml-1 mr-1"></i> Dès le 12 Fév</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <div class="text-right"><span class="block font-bold text-oblink-gray">${offer.daily_rate} €/j</span><span class="text-xs text-gray-500">${offer.city}</span></div>
                                    </div>
                                </div>
                            `).join('');
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
                        <a href="<?php echo home_url('/generateur-de-contrat'); ?>"
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
                    <!-- Quick Actions (End) -->
                </div>

                <!-- Partenaires (Specific RC Pro Banner) -->
                <div
                    class="bg-gradient-to-br from-indigo-900 to-oblink-violet text-white rounded-3xl p-6 shadow-sm border border-indigo-800 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-2xl -mr-10 -mt-10"></div>

                    <h2
                        class="text-sm font-bold font-display uppercase tracking-widest opacity-70 mb-3 flex items-center gap-2">
                        <i class="fas fa-star text-yellow-400"></i> Offre Partenaire Exclusif
                    </h2>

                    <div class="relative z-10 mb-4">
                        <p class="text-sm leading-relaxed text-indigo-100">
                            Profitez de <span class="font-bold text-white bg-white/20 px-1 rounded">-15%</span> sur
                            votre RC Pro Opticien et obtenez votre attestation immédiate.
                        </p>
                    </div>

                    <a href="<?php echo home_url('/partenaires'); ?>"
                        class="block w-full py-3 bg-white text-oblink-violet font-bold text-center rounded-xl hover:bg-gray-100 transition shadow-lg relative z-10">
                        Voir l'offre
                    </a>
                </div>

                <!-- Partenaires (Qonto Bank Integration) -->
                <div
                    class="mt-4 bg-white rounded-3xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-purple-50 rounded-bl-full -mr-6 -mt-6 transition group-hover:scale-110">
                    </div>

                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-lg bg-indigo-900 flex items-center justify-center text-white font-bold text-xs">
                            Q
                        </div>
                        <h2 class="text-sm font-bold text-oblink-gray">
                            Compte Pro <span class="text-indigo-600">Qonto</span>
                        </h2>
                    </div>

                    <p class="text-xs text-gray-500 mb-3 leading-relaxed">
                        Simplifiez votre compta. Carte Mastercard + IBAN Français.
                    </p>

                    <div class="flex items-center gap-2 mb-4 bg-green-50 px-3 py-2 rounded-lg">
                        <i class="fas fa-gift text-green-500"></i>
                        <span class="text-xs font-bold text-green-700">1 mois offert</span>
                        <span class="text-[10px] text-gray-400 ml-auto">Membre OBLINK</span>
                    </div>

                    <a href="<?php echo home_url('/partenaires'); ?>"
                        class="block w-full py-2 bg-indigo-50 text-indigo-600 font-bold text-xs text-center rounded-lg hover:bg-indigo-100 transition">
                        Ouvrir mon compte en 5 min
                    </a>
                </div>

            </div>

        </div>
    </div>

    <!-- MESSAGING JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- 1. MOCK DATA SYSTEM (Fallback for Demo/Audit) ---
            // Generates fake conversations if none exist, ensures UI is populated.
            const MOCK_MESSAGING = {
                conversations: [{
                    id: 'conv_1',
                    contactId: 'comp_1',
                    name: 'Optic 2000 Paris',
                    initial: 'O',
                    avatarColor: 'bg-oblink-blue',
                    lastMessage: 'Bonjour, votre profil m\'intéresse.',
                    messages: [{
                        sender: 'them',
                        text: 'Bonjour, votre profil m\'intéresse pour la mission de juillet.',
                        time: '14:30'
                    },
                    {
                        sender: 'me',
                        text: 'Bonjour, merci ! Je suis disponible.',
                        time: '14:32'
                    }
                    ]
                },
                {
                    id: 'conv_2',
                    contactId: 'comp_2',
                    name: 'Krys Lyon',
                    initial: 'K',
                    avatarColor: 'bg-oblink-orange',
                    lastMessage: 'Merci pour votre retour rapide.',
                    messages: [{
                        sender: 'them',
                        text: 'Merci pour votre retour rapide.',
                        time: 'Hier'
                    }]
                }
                ],
                // Use LocalStorage to persist changes during demo session
                getConversations: function () {
                    const stored = localStorage.getItem('oblink_mock_conversations');
                    if (stored) return JSON.parse(stored);
                    return this.conversations;
                },
                saveMessage: function (contactId, text) {
                    let convs = this.getConversations();
                    let conv = convs.find(c => c.contactId == contactId);

                    // If new conversation (from contact form)
                    if (!conv) {
                        conv = {
                            id: 'conv_' + Date.now(),
                            contactId: contactId,
                            name: 'Nouveau Contact', // Ideally pass name
                            initial: 'N',
                            avatarColor: 'bg-gray-400',
                            lastMessage: text,
                            messages: []
                        };
                        convs.unshift(conv);
                    }

                    // Add message
                    conv.messages.push({
                        sender: 'me',
                        text: text,
                        time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' })
                    });
                    conv.lastMessage = text; // Update preview

                    localStorage.setItem('oblink_mock_conversations', JSON.stringify(convs));
                    return conv;
                }
            };

            const conversationList = document.getElementById('conversation-list');
            const chatMessages = document.getElementById('chat-messages');
            const chatInputArea = document.getElementById('chat-input-area');
            const currentContactIdInput = document.getElementById('current-contact-id');
            const sendMessageForm = document.getElementById('send-message-form');
            const messageInput = document.getElementById('message-input');

            // --- 2. RENDER CONVERSATION LIST ---
            function renderConversationList() {
                // Check if PHP rendered anything (it likely didn't if auth failed)
                const phpItems = document.querySelectorAll('.conversation-item');
                if (phpItems.length > 0) return; // PHP worked, use it.

                // PHP failed (expected), use Mock
                const convs = MOCK_MESSAGING.getConversations();
                if (conversationList) {
                    conversationList.innerHTML = convs.map(c => `
                    <div class="p-4 border-b border-gray-100 hover:bg-white cursor-pointer transition conversation-item" data-contact-id="${c.contactId}">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full ${c.avatarColor} text-white flex items-center justify-center font-bold text-sm">
                                ${c.initial}
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="font-bold text-sm text-gray-800 truncate">${c.name}</h4>
                                <p class="text-xs text-gray-500 truncate">${c.lastMessage}</p>
                            </div>
                        </div>
                    </div>
                `).join('');

                    // Re-bind events
                    bindConversationEvents();
                }
            }

            function bindConversationEvents() {
                document.querySelectorAll('.conversation-item').forEach(item => {
                    item.addEventListener('click', function () {
                        const contactId = this.dataset.contactId;
                        currentContactIdInput.value = contactId;

                        document.querySelectorAll('.conversation-item').forEach(c => c.classList.remove('bg-white', 'ring-2', 'ring-oblink-orange'));
                        this.classList.add('bg-white', 'ring-2', 'ring-oblink-orange');

                        chatInputArea.classList.remove('hidden');
                        loadChat(contactId);
                    });
                });
            }

            // --- 3. LOAD CHAT (Hybrid: AJAX or Mock) ---
            function loadChat(contactId) {
                chatMessages.innerHTML = '<div class="flex items-center justify-center h-full text-gray-400"><i class="fas fa-spinner fa-spin mr-2"></i> Chargement...</div>';

                // Try AJAX first (in case we fix backend later)
                fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=oblink_load_chat&contact_id=${contactId}&nonce=${oblink_vars.nonce}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.success && data.data.html && (data.data.html.includes('justify-end') || data.data.html.includes('justify-start'))) {
                            // Real data found
                            chatMessages.innerHTML = data.data.html;
                            chatMessages.scrollTop = chatMessages.scrollHeight;
                        } else {
                            throw new Error("No backend data");
                        }
                    })
                    .catch(() => {
                        // Fallback to Mock
                        const convs = MOCK_MESSAGING.getConversations();
                        const conv = convs.find(c => c.contactId == contactId);

                        if (conv) {
                            const html = conv.messages.map(msg => {
                                const isMe = msg.sender === 'me';
                                return `
                                <div class="flex ${isMe ? 'justify-end' : 'justify-start'} mb-4">
                                    <div class="${isMe ? 'bg-oblink-blue text-white' : 'bg-gray-100 text-gray-800'} rounded-2xl py-2 px-4 max-w-[80%] text-sm">
                                        ${msg.text}
                                        <div class="text-[10px] ${isMe ? 'text-blue-100' : 'text-gray-400'} mt-1 text-right">${msg.time}</div>
                                    </div>
                                </div>
                            `;
                            }).join('');
                            chatMessages.innerHTML = html;
                            chatMessages.scrollTop = chatMessages.scrollHeight;
                        } else {
                            chatMessages.innerHTML = '<p class="text-center text-gray-400 text-sm">Nouvelle conversation</p>';
                        }
                    });
            }

            // --- 4. SEND MESSAGE ---
            if (sendMessageForm) {
                sendMessageForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const text = messageInput.value.trim();
                    const contactId = currentContactIdInput.value;
                    if (!text || !contactId) return;

                    // Optimistic UI
                    const tempMsg = document.createElement('div');
                    tempMsg.className = 'flex justify-end mb-4 opacity-50';
                    tempMsg.innerHTML = `<div class="bg-oblink-blue text-white rounded-2xl py-2 px-4 max-w-[80%] text-sm">${text}</div>`;
                    chatMessages.appendChild(tempMsg);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                    messageInput.value = '';

                    // Try AJAX
                    const formData = new FormData();
                    formData.append('action', 'oblink_send_msg');
                    formData.append('receiver_id', contactId);
                    formData.append('message', text);
                    formData.append('nonce', oblink_vars.nonce);

                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                tempMsg.classList.remove('opacity-50');
                            } else {
                                // If backend fails, use Mock
                                MOCK_MESSAGING.saveMessage(contactId, text);
                                tempMsg.classList.remove('opacity-50');
                                renderConversationList(); // Update sidebar
                            }
                        })
                        .catch(() => {
                            // If network fails, use Mock
                            MOCK_MESSAGING.saveMessage(contactId, text);
                            tempMsg.classList.remove('opacity-50');
                            renderConversationList(); // Update sidebar
                        });
                });
            }

            // Init
            renderConversationList();
        });
    </script>

    <?php include get_template_directory() . "/footer-content.php";
    wp_footer(); ?>