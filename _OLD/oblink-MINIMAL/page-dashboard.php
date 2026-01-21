<?php
/*
Template Name: Dashboard
*/
include 'header-inc.php';
?>

<!-- JS AUTH GUARD & ROUTER -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        // 1. Check Auth
        const { data: { session } } = await window.oblinkSupabase.auth.getSession();

        if (!session) {
            window.location.href = '<?php echo home_url("/login"); ?>';
            return;
        }

        // 2. Redirect based on User Type
        const userType = session.user.user_metadata.user_type;
        if (userType === 'opticien') {
            window.location.href = '<?php echo home_url("/dashboard-opticien"); ?>';
        } else if (userType === 'entreprise') {
            window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
        }
    });
</script>

<div class="max-w-7xl mx-auto px-4 py-32 min-h-screen">
    <!-- Header -->
    <div class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-oblink-gray mb-2" style="font-family: 'Montserrat', sans-serif;">
                Tableau de bord
            </h1>
            <p class="text-oblink-gray/70">Bienvenue sur votre espace OBLINK</p>
        </div>
        <div class="flex gap-4">
            <a href="<?php echo home_url('/devis'); ?>"
                class="px-6 py-3 border-2 border-oblink-blue text-oblink-blue rounded-lg font-semibold hover:bg-oblink-blue hover:text-white transition">
                <i class="fas fa-file-alt mr-2"></i>Nouveau Devis
            </a>
            <a href="<?php echo home_url('/facture'); ?>"
                class="px-6 py-3 bg-oblink-orange text-white rounded-lg font-semibold hover:bg-oblink-orange/90 transition shadow-lg">
                <i class="fas fa-plus mr-2"></i>Nouvelle Facture
            </a>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid md:grid-cols-4 gap-6 mb-12">
        <div class="glass-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-oblink-orange">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-oblink-gray/60 text-sm font-semibold mb-1">Chiffre d'affaires</div>
                    <div class="text-2xl font-bold text-oblink-gray">12 450 €</div>
                </div>
                <div
                    class="w-10 h-10 bg-oblink-orange/10 rounded-lg flex items-center justify-center text-oblink-orange">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
            <div class="text-green-500 text-sm flex items-center">
                <i class="fas fa-arrow-up mr-1"></i> +15% ce mois
            </div>
        </div>

        <div class="glass-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-oblink-blue">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-oblink-gray/60 text-sm font-semibold mb-1">Missions réalisées</div>
                    <div class="text-2xl font-bold text-oblink-gray">24</div>
                </div>
                <div class="w-10 h-10 bg-oblink-blue/10 rounded-lg flex items-center justify-center text-oblink-blue">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="text-oblink-gray/60 text-sm">
                Depuis le début de l'année
            </div>
        </div>

        <div class="glass-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-oblink-violet">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-oblink-gray/60 text-sm font-semibold mb-1">Factures en attente</div>
                    <div class="text-2xl font-bold text-oblink-gray">3</div>
                </div>
                <div
                    class="w-10 h-10 bg-oblink-violet/10 rounded-lg flex items-center justify-center text-oblink-violet">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="text-oblink-blue text-sm font-semibold">
                840 € à encaisser
            </div>
        </div>

        <div class="glass-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-green-500">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-oblink-gray/60 text-sm font-semibold mb-1">Taux de réponse</div>
                    <div class="text-2xl font-bold text-oblink-gray">98%</div>
                </div>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="text-green-500 text-sm flex items-center">
                Top profil
            </div>
        </div>
    </div>

    <!-- Recent Activity / Missions -->
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Missions List -->
        <div class="lg:col-span-2 space-y-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-oblink-gray">Missions récentes</h2>
                <a href="#" class="text-oblink-orange font-semibold hover:underline">Tout voir</a>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden glass-card">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50/50 border-b border-gray-100">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">Entreprise</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">Date/Lieu</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">Statut</th>
                                <th class="text-right py-4 px-6 text-sm font-semibold text-gray-600">Montant</th>
                                <th class="py-4 px-6"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-800">Optique Martin</div>
                                    <div class="text-xs text-gray-500">SIRET: 123...456</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-sm font-medium">15 Jan - 17 Jan</div>
                                    <div class="text-xs text-gray-500">Bordeaux (33)</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Terminé
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right font-bold text-oblink-gray">
                                    840 €
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-oblink-blue transition">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-800">Alain Afflelou</div>
                                    <div class="text-xs text-gray-500">Mérignac Soleil</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-sm font-medium">20 Jan - 25 Jan</div>
                                    <div class="text-xs text-gray-500">Mérignac (33)</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Confirmé
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right font-bold text-oblink-gray">
                                    1 680 €
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-oblink-blue transition">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-800">Krys</div>
                                    <div class="text-xs text-gray-500">Centre Ville</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-sm font-medium">05 Fév</div>
                                    <div class="text-xs text-gray-500">Paris (75)</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        En attente
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right font-bold text-oblink-gray">
                                    280 €
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-oblink-blue transition">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar / Tools -->
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-oblink-gray">Outils rapides</h2>

            <div class="bg-white p-6 rounded-2xl shadow-xl glass-card">
                <h3 class="font-bold text-lg mb-4 flex items-center">
                    <i class="fas fa-file-invoice-dollar text-oblink-orange mr-2"></i>Facturation
                </h3>
                <div class="space-y-3">
                    <a href="<?php echo home_url('/facture'); ?>"
                        class="flex items-center p-3 hover:bg-gray-50 rounded-lg transition group">
                        <div
                            class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 group-hover:bg-green-200 transition">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="ml-3">
                            <div class="font-semibold text-gray-800">Nouvelle facture</div>
                            <div class="text-xs text-gray-500">Éditer une facture conforme</div>
                        </div>
                    </a>
                    <a href="<?php echo home_url('/devis'); ?>"
                        class="flex items-center p-3 hover:bg-gray-50 rounded-lg transition group">
                        <div
                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 group-hover:bg-blue-200 transition">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <div class="ml-3">
                            <div class="font-semibold text-gray-800">Nouveau devis</div>
                            <div class="text-xs text-gray-500">Envoyer une proposition</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-br from-oblink-orange to-oblink-violet p-6 rounded-2xl shadow-xl text-white">
                <h3 class="font-bold text-lg mb-2">Besoin d'aide ?</h3>
                <p class="text-white/80 text-sm mb-4">Contactez notre support dédié aux opticiens.</p>
                <button
                    class="w-full py-2 bg-white/20 backdrop-blur-md rounded-lg hover:bg-white/30 transition text-sm font-semibold">
                    Contacter le support
                </button>
            </div>
        </div>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>