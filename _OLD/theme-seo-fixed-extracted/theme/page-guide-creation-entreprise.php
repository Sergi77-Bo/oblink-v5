<?php
/*
Template Name: Guide Création Entreprise
*/

include 'header-inc.php';
?>

<style>
    .sticky-toc {
        position: sticky;
        top: 100px;
    }

    /* Sticky CTA Mobile */
    .sticky-mobile-cta {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: white;
        padding: 16px;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        z-index: 50;
        display: none;
    }

    @media (max-width: 768px) {
        .sticky-mobile-cta {
            display: block;
        }

        /* Add padding to footer to prevent overlap */
        footer {
            padding-bottom: 80px;
        }
    }
</style>

<!-- Hero -->
<section class="bg-gradient-to-br from-oblink-blue/10 to-oblink-violet/10 pt-32 pb-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center px-4 py-2 bg-white rounded-full shadow-sm mb-6">
            <i class="fas fa-rocket text-oblink-orange mr-2"></i>
            <span class="text-sm font-semibold text-oblink-gray">GUIDE COMPLET 2026</span>
        </div>
        <h1 class="text-5xl font-bold mb-6 text-oblink-gray" style="font-family: 'Montserrat', sans-serif;">
            Guide de Création d'Entreprise<br />
            <span class="text-oblink-orange">pour Opticiens Freelances</span>
        </h1>
        <p class="text-xl text-oblink-gray/70 max-w-3xl mx-auto">
            Devenez indépendant en 15 jours : statut, démarches, facturation et premiers contrats.
        </p>
    </div>
</section>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-4 gap-8">
        <!-- Table of Contents (Sticky) -->
        <aside class="lg:col-span-1 hidden lg:block">
            <nav class="sticky-toc bg-white border-2 border-oblink-beige rounded-xl p-6">
                <h2 class="font-bold text-oblink-gray mb-4 flex items-center">
                    <i class="fas fa-list text-oblink-orange mr-2"></i>
                    Sommaire
                </h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="#introduction"
                            class="text-oblink-gray hover:text-oblink-orange transition">Introduction</a></li>
                    <li><a href="#stats" class="text-oblink-gray hover:text-oblink-orange transition">Pourquoi Freelance
                            ?</a></li>
                    <li><a href="#statut-juridique" class="text-oblink-gray hover:text-oblink-orange transition">1.
                            Statut juridique</a></li>
                    <li><a href="#demarches" class="text-oblink-gray hover:text-oblink-orange transition">2. Démarches &
                            Planning</a></li>
                    <li><a href="#assurances" class="text-oblink-gray hover:text-oblink-orange transition">3.
                            Assurances</a></li>
                    <li><a href="#tarification" class="text-oblink-gray hover:text-oblink-orange transition">4.
                            Tarification</a></li>
                    <li><a href="#facturation" class="text-oblink-gray hover:text-oblink-orange transition">5.
                            Facturation</a></li>
                    <li><a href="#reseau" class="text-oblink-gray hover:text-oblink-orange transition">6. Réseau</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="lg:col-span-3">

            <!-- Alert Pénurie -->
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg mb-8 animate-pulse">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                    <div>
                        <strong class="text-red-700 font-bold uppercase text-sm">Alerte Marché</strong>
                        <p class="text-red-700 text-sm">
                            Actuellement, <span class="font-bold">380 magasins</span> recherchent activement des
                            renforts freelances sur notre secteur.
                            Les profils créés aujourd'hui reçoivent en moyenne une proposition sous 48h.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Introduction -->
            <section id="introduction" class="mb-12">
                <div class="bg-gradient-to-r from-oblink-orange to-oblink-violet text-white p-8 rounded-2xl mb-8">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <i class="fas fa-info-circle mr-2"></i>
                        Bienvenue dans votre parcours entrepreneurial
                    </h2>
                    <p class="text-lg opacity-90">
                        Ce guide complet vous accompagne pas à pas dans la création de votre activité d'opticien
                        indépendant.
                        OBLINK ne vous laisse pas seul : nous vous fournissons les outils, les missions et le réseau
                        pour réussir.
                    </p>
                </div>
            </section>

            <!-- Comparative Table (Salarié vs Freelance) -->
            <section id="stats" class="mb-16 scroll-mt-24">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6">Comparatif : Salarié vs Freelance</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse rounded-xl overflow-hidden shadow-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="p-4 font-bold border-b">Poste</th>
                                <th class="p-4 font-bold border-b">Salarié (Moyenne)</th>
                                <th class="p-4 font-bold border-b text-oblink-orange">Freelance OBLINK</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr>
                                <td class="p-4 border-b font-medium">Revenu Brut Mensuel</td>
                                <td class="p-4 border-b text-gray-600">2 800 €</td>
                                <td class="p-4 border-b font-bold text-gray-800">5 500 € <span
                                        class="text-xs font-normal text-gray-500">(20j à 350€ TJM)</span></td>
                            </tr>
                            <tr>
                                <td class="p-4 border-b font-medium">Charges / Cotisations</td>
                                <td class="p-4 border-b text-gray-600">Payées par employeur</td>
                                <td class="p-4 border-b font-bold text-green-600">~22% <span
                                        class="text-xs font-normal text-gray-500">(Micro-entreprise)</span></td>
                            </tr>
                            <tr class="bg-orange-50/50">
                                <td class="p-4 border-b font-bold text-oblink-gray">Revenu Net (Avant impôts)</td>
                                <td class="p-4 border-b font-bold text-gray-600">~2 100 €</td>
                                <td class="p-4 border-b font-black text-2xl text-oblink-orange">~4 290 €</td>
                            </tr>
                            <tr>
                                <td class="p-4 font-medium">Liberté de planning</td>
                                <td class="p-4 text-gray-600">Limitée (Planning imposé)</td>
                                <td class="p-4 font-bold text-oblink-blue">Totale <span
                                        class="text-xs font-normal text-gray-500">(Via l'app OBLINK)</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-center mt-4 text-sm text-gray-500">
                    <a href="<?php echo home_url('/simulateur'); ?>"
                        class="text-oblink-orange hover:underline font-semibold">
                        <i class="fas fa-calculator mr-1"></i>Calculez votre propre gain avec notre Simulateur de
                        Revenus
                    </a>
                </p>
            </section>

            <!-- 1. Statut Juridique -->
            <section id="statut-juridique" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">1.</span> Choisir son statut juridique
                </h2>

                <!-- Auto-entrepreneur -->
                <div
                    class="bg-white border-2 border-oblink-beige rounded-xl p-8 mb-6 hover:border-oblink-orange transition">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-oblink-gray mb-2">
                                <i class="fas fa-user text-oblink-blue mr-2"></i>
                                Auto-entrepreneur (Micro-entreprise)
                            </h3>
                            <p class="text-oblink-gray/70">Le statut le plus simple pour débuter</p>
                        </div>
                        <span
                            class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase tracking-wide">
                            Recommandé
                        </span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="font-bold text-green-600 mb-3 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>Avantages
                            </h4>
                            <ul class="space-y-2 text-sm text-oblink-gray/80">
                                <li>Création rapide et gratuite</li>
                                <li>Comptabilité ultra-simplifiée</li>
                                <li><strong>Franchise en base de TVA :</strong> Pas de TVA jusqu'à 36 800€/an.</li>
                                <li>Charges sociales proportionnelles au CA encaissé.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-red-500 mb-3 flex items-center">
                                <i class="fas fa-times-circle mr-2"></i>Limites
                            </h4>
                            <ul class="space-y-2 text-sm text-oblink-gray/80">
                                <li>Plafond de CA : 77 700€ / an</li>
                                <li>Pas de déduction des charges réelles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 2. Démarches & Planning -->
            <section id="demarches" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">2.</span> Le Rétroplanning des 15 jours
                </h2>
                <p class="mb-6 text-gray-600">Beaucoup pensent que c'est long. En réalité, 2 semaines suffisent.</p>

                <div class="border-l-4 border-oblink-blue ml-4 pl-8 space-y-8 relative">
                    <div class="relative">
                        <span
                            class="absolute -left-12 top-0 w-8 h-8 bg-oblink-blue text-white rounded-full flex items-center justify-center font-bold text-sm">J1</span>
                        <h3 class="font-bold text-lg">Choix du statut & Déclaration URSSAF</h3>
                        <p class="text-sm text-gray-500">15 minutes en ligne sur autoentrepreneur.urssaf.fr</p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-12 top-0 w-8 h-8 bg-oblink-blue text-white rounded-full flex items-center justify-center font-bold text-sm">J4</span>
                        <h3 class="font-bold text-lg">Inscription OBLINK & Passage Certification IA</h3>
                        <p class="text-sm text-gray-500">Validez votre profil "Expert" pour booster votre visibilité.
                        </p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-12 top-0 w-8 h-8 bg-oblink-blue text-white rounded-full flex items-center justify-center font-bold text-sm">J8</span>
                        <h3 class="font-bold text-lg">Assurance RC Pro & Compte Bancaire</h3>
                        <p class="text-sm text-gray-500">Obligatoire pour exercer.</p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-12 top-0 w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold text-sm">J11</span>
                        <h3 class="font-bold text-lg text-green-600">Première mission reçue !</h3>
                        <p class="text-sm text-gray-500">Vous recevez une notification Push sur votre mobile.</p>
                    </div>
                </div>

                <!-- Checklist -->
                <div class="mt-12 bg-gray-50 rounded-xl p-8 border border-gray-200">
                    <h3 class="font-bold text-xl mb-4 flex items-center">
                        <i class="fas fa-tasks text-oblink-orange mr-2"></i>Êtes-vous prêt pour votre première mission ?
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <input type="checkbox" checked disabled
                                class="w-5 h-5 text-oblink-orange rounded mr-3 bg-gray-200">
                            <span class="text-gray-700 line-through">Diplôme d'Opticien en poche</span>
                        </li>
                        <li class="flex items-center">
                            <input type="checkbox" disabled class="w-5 h-5 text-oblink-orange rounded mr-3">
                            <span class="text-gray-700">Numéro ADELI / RPPS obtenu</span>
                        </li>
                        <li class="flex items-center">
                            <input type="checkbox" disabled class="w-5 h-5 text-oblink-orange rounded mr-3">
                            <span class="text-gray-700">Statut auto-entrepreneur créé</span>
                        </li>
                        <li class="flex items-center">
                            <input type="checkbox" disabled class="w-5 h-5 text-oblink-orange rounded mr-3">
                            <span class="text-gray-700 font-bold">Badge "Expert Logiciel" OBLINK validé</span>
                        </li>
                    </ul>
                    <div class="mt-4 p-4 bg-blue-50 text-blue-800 text-sm rounded-lg">
                        <i class="fas fa-info-circle mr-1"></i>
                        <strong>Conseil :</strong> Si vous n'avez pas le Badge Expert, nos algorithmes vous proposeront
                        moins de missions premium.
                        <a href="<?php echo home_url('/formation-erp'); ?>" class="underline font-bold ml-1">Se former
                            maintenant</a>
                    </div>
                </div>
            </section>

            <!-- 3. Assurances -->
            <section id="assurances" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">3.</span> Assurances obligatoires
                </h2>
                <p class="text-lg text-oblink-gray/80 mb-6">
                    La Responsabilité Civile Professionnelle (RC Pro) est <strong>obligatoire</strong> pour les
                    opticiens.
                </p>
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 mb-8">
                    <h3 class="font-bold text-red-800 mb-3 flex items-center text-xl">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        RC Pro : Ne prenez pas de risques
                    </h3>
                    <p class="text-red-700 mb-4">
                        Coût moyen : 300€ à 600€/an. Elle vous couvre en cas d'erreur de montage ou de dommages clients.
                    </p>
                    <a href="mailto:partenaires@oblink.fr?subject=Comparatif%20RC%20Pro"
                        class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Recevoir notre comparatif par mail
                    </a>
                </div>
            </section>

            <!-- 4. Tarification -->
            <section id="tarification" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">4.</span> Tarifs : Combien facturer ?
                </h2>
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="border-2 border-oblink-beige rounded-xl p-6">
                        <h3 class="font-bold text-oblink-gray mb-3"><i
                                class="fas fa-map-marker-alt text-oblink-orange mr-2"></i>Par Zone</h3>
                        <p class="text-gray-600">Île-de-France : 35-45€/h<br>Provinces : 30-40€/h</p>
                    </div>
                    <div class="border-2 border-oblink-beige rounded-xl p-6">
                        <h3 class="font-bold text-oblink-gray mb-3"><i class="fas fa-star text-oblink-blue mr-2"></i>Par
                            Expérience</h3>
                        <p class="text-gray-600">Junior : 25-30€/h<br>Expert : 40-50€/h</p>
                    </div>
                </div>
                <div class="bg-violet-50 p-6 rounded-xl border border-violet-100">
                    <h4 class="font-bold text-oblink-violet mb-2"><i class="fas fa-bolt mr-2"></i>Le Réflexe OBLINK</h4>
                    <p class="text-sm text-gray-700">Le saviez-vous ? Les opticiens qui affichent leur certification
                        OBLINK sur leur profil négocient en moyenne des <strong>TJM 15% plus élevés</strong>.</p>
                </div>
            </section>

            <!-- 5. Facturation -->
            <section id="facturation" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">5.</span> Facturation simplifiée
                </h2>

                <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white p-8 rounded-2xl shadow-xl">
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold mb-4 text-oblink-orange">L'avantage OBLINK : Simplifiez votre
                                gestion</h3>
                            <p class="mb-4 leading-relaxed opacity-90">
                                OBLINK n'est pas seulement un moteur de recherche, c'est votre assistant comptable.
                                Notre module intégré génère automatiquement vos factures au format
                                <strong>Factur-X</strong> (norme obligatoire 2026) dès la validation de votre mission.
                            </p>
                            <ul class="space-y-2 mb-6 text-sm">
                                <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i>Conformité
                                    fiscale garantie (Mentions légales auto)</li>
                                <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i>Zéro
                                    erreur de calcul</li>
                                <li class="flex items-center"><i class="fas fa-check text-green-400 mr-2"></i>80% de
                                    temps gagné sur l'administratif</li>
                            </ul>
                            <p class="font-semibold italic">"Vous vous concentrez sur l'optique, nous nous occupons du
                                reste."</p>
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20 text-center">
                                <i class="fas fa-file-invoice-dollar text-5xl text-oblink-blue mb-3"></i>
                                <div class="text-sm font-bold">Générateur Facture</div>
                                <div class="text-xs opacity-70">Intégré au Dashboard</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 6. Réseau -->
            <section id="reseau" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">6.</span> Booster votre réseau
                </h2>
                <ul class="grid md:grid-cols-2 gap-4">
                    <li class="bg-white p-4 rounded-lg border border-gray-100 shadow-sm flex items-center">
                        <i class="fas fa-users text-oblink-orange mr-3"></i> Plateformes spécialisées (OBLINK)
                    </li>
                    <li class="bg-white p-4 rounded-lg border border-gray-100 shadow-sm flex items-center">
                        <i class="fas fa-glass-cheers text-oblink-violet mr-3"></i> Salons (Silmo)
                    </li>
                    <li class="bg-white p-4 rounded-lg border border-gray-100 shadow-sm flex items-center">
                        <i class="fab fa-linkedin text-blue-600 mr-3"></i> LinkedIn
                    </li>
                    <li class="bg-white p-4 rounded-lg border border-gray-100 shadow-sm flex items-center">
                        <i class="fas fa-store text-gray-600 mr-3"></i> Contact Direct Magasins
                    </li>
                </ul>
            </section>

            <!-- CTA Final -->
            <section class="text-center py-12 bg-gray-50 rounded-3xl">
                <h2 class="text-3xl font-bold mb-4">Prêt à démarrer en J+1 ?</h2>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Déjà <strong class="text-oblink-orange">15 missions</strong> sont disponibles pour les nouveaux
                    freelances cette semaine.
                    Ne laissez pas passer votre chance.
                </p>
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="inline-flex items-center px-8 py-4 bg-oblink-orange text-white text-lg font-bold rounded-xl shadow-lg hover:bg-orange-600 transition transform hover:scale-105">
                    <i class="fas fa-user-plus mr-2"></i>Créer mon profil maintenant
                </a>
            </section>

        </main>
    </div>
</div>

<!-- Sticky Mobile CTA -->
<div class="sticky-mobile-cta border-t border-gray-200">
    <div class="flex items-center justify-between gap-4">
        <div class="text-xs font-semibold text-gray-500 hidden sm:block">
            15 missions dispo cette semaine
        </div>
        <a href="<?php echo home_url('/inscription-opticien'); ?>"
            class="flex-1 block text-center px-4 py-3 bg-oblink-orange text-white font-bold rounded-lg shadow-md text-sm">
            Créer mon profil
        </a>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>