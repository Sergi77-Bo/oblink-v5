<?php
/*
Template Name: Pass Examen BTS
*/
include 'header-inc.php';
?>

<style>
    @keyframes bounce-slow {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .animate-bounce-slow {
        animation: bounce-slow 3s infinite;
    }
</style>

<div class="bg-white font-sans text-gray-900">

    <!-- HERO SECTION -->
    <div class="relative overflow-hidden bg-gray-900 text-white border-b border-gray-800">
        <div
            class="absolute inset-0 bg-[url('<?php echo get_template_directory_uri(); ?>/images/grid-pattern.png')] opacity-10">
        </div>
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-oblink-orange/20 rounded-full blur-[120px] pointer-events-none transform translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-oblink-violet/20 rounded-full blur-[100px] pointer-events-none transform -translate-x-1/3 translate-y-1/3">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-oblink-orange font-bold text-xs mb-6 border border-white/10 uppercase tracking-wider">
                        <i class="fas fa-crown"></i> Nouveau • BTS Opticien Lunetier
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black font-display leading-[1.1] mb-6">
                        Ne laissez pas le hasard décider de <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-oblink-violet">votre
                            diplôme</span>.
                    </h1>
                    <p class="text-lg text-gray-400 mb-8 leading-relaxed max-w-lg">
                        Accédez à 27 ans d'annales corrigées et laissez notre IA analyser vos points faibles. Le seul
                        outil de révision qui s'adapte à vous.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#pricing"
                            class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-oblink-orange rounded-xl hover:bg-orange-600 transition shadow-lg hover:shadow-orange-500/25 transform hover:-translate-y-1">
                            Obtenir mon Pass Examen
                        </a>
                        <a href="<?php echo home_url('/dashboard-etudiant?demo=jury'); ?>"
                            class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 transition backdrop-blur-sm">
                            <i class="fas fa-play mr-2 text-oblink-orange"></i> Essayer la démo
                        </a>
                    </div>
                    <div class="mt-8 flex items-center gap-4 text-sm text-gray-500">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-gray-900"
                                src="https://randomuser.me/api/portraits/thumb/men/1.jpg" alt="">
                            <img class="w-8 h-8 rounded-full border-2 border-gray-900"
                                src="https://randomuser.me/api/portraits/thumb/women/2.jpg" alt="">
                            <img class="w-8 h-8 rounded-full border-2 border-gray-900"
                                src="https://randomuser.me/api/portraits/thumb/men/3.jpg" alt="">
                        </div>
                        <p>Rejoint par <span class="text-white font-bold">2,140+ étudiants</span> cette année</p>
                    </div>
                </div>
                <div class="relative lg:h-[600px] flex items-center justify-center">
                    <!-- Conceptuel UI Mockup -->
                    <div
                        class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-800 rotate-[-2deg] hover:rotate-0 transition duration-700">
                        <div class="bg-gray-100 p-3 border-b border-gray-200 flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="p-6 bg-white">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Analyse de la Vision</h4>
                                    <p class="text-xs text-gray-500">Sujet 2024 • Note estimée: 14/20</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                    <p class="text-xs font-bold text-gray-400 uppercase mb-2">Question IA</p>
                                    <p class="text-sm font-semibold text-gray-800 mb-2">Décrivez le trajet des rayons
                                        lumineux dans un œil hypermétrope non corrigé.</p>
                                    <div class="h-2 w-3/4 bg-gray-200 rounded animate-pulse"></div>
                                </div>
                                <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                    <p class="text-xs font-bold text-blue-400 uppercase mb-2">Correction Instantanée</p>
                                    <p class="text-sm text-gray-700">Dans un œil hypermétrope au repos, l'image d'un
                                        objet à l'infini se forme <strong>en arrière de la rétine</strong>. Le Punctum
                                        Remotum est virtuel, situé derrière l'œil.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Widget -->
                    <div
                        class="absolute bottom-12 -right-4 bg-white p-4 rounded-xl shadow-xl border border-gray-100 max-w-xs transform translate-y-4 animate-bounce-slow">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-oblink-orange rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900">138 Annales incluses</p>
                                <p class="text-xs text-green-600 font-semibold">Téléchargement immédiat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VALUE PROPOSITION -->
    <div class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 font-display mb-4">Pourquoi payer pour ce que
                    vous pouvez trouver gratuitement ?</h2>
                <p class="text-lg text-gray-500">Parce que vous n'achetez pas de l'information. Vous achetez du temps,
                    de la structure et une correction personnalisée impossible à obtenir seul.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-orange-100 text-oblink-orange flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Diagnostic IA Personnalisé</h3>
                    <p class="text-gray-500 leading-relaxed">Fini de réviser ce que vous savez déjà. Notre IA identifie
                        vos lacunes précises en 5 minutes et crée un plan de révision sur mesure.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 text-oblink-blue flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">27 Ans d'Archives</h3>
                    <p class="text-gray-500 leading-relaxed">Accédez à la plus grande base de données d'annales
                        (1999-2025). Sujets et corrigés officiels, classés et analysés.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg transition-all group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Simulateur d'Examen</h3>
                    <p class="text-gray-500 leading-relaxed">Posez n'importe quelle question sur un sujet. L'IA vous
                        répond comme un correcteur d'examen, avec les attendus officiels.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- PRICING SECTION -->
    <div id="pricing" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 mb-12 lg:mb-0">
                    <h2 class="text-3xl md:text-5xl font-black text-gray-900 font-display mb-6">Investissez sur votre
                        réussite.</h2>
                    <p class="text-lg text-gray-500 mb-8">Un tuteur privé coûte 50€/heure. OBLINK Académie vous offre un
                        accès illimité à l'intelligence de 27 ans d'examens pour le prix d'un seul repas.</p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3 text-gray-700">
                            <i class="fas fa-check text-green-500"></i> <span>Paiement unique, accès à vie</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-700">
                            <i class="fas fa-check text-green-500"></i> <span>Satisfait ou remboursé (14j)</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-700">
                            <i class="fas fa-check text-green-500"></i> <span>Support technique 7j/7</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div class="relative bg-gray-900 rounded-3xl p-1 shadow-2xl">
                        <div
                            class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-oblink-orange text-white px-6 py-1 rounded-full text-sm font-bold uppercase tracking-wide shadow-lg">
                            Offre de Lancement
                        </div>
                        <div class="bg-gray-800 rounded-[22px] p-8 md:p-12">
                            <div
                                class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 pb-8 border-b border-gray-700">
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-2">Pass Examen BTS OL</h3>
                                    <p class="text-gray-400 text-sm">Accès Illimité 6 mois — Rentabilisé dès la 1ère
                                        heure</p>
                                </div>
                                <div class="mt-4 md:mt-0 text-right">
                                    <div class="text-sm text-gray-400 line-through">99,00 €</div>
                                    <div class="text-4xl font-black text-white">29,00 €</div>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-y-4 gap-x-8 mb-8">
                                <li class="flex items-center gap-3 text-gray-300">
                                    <i class="fas fa-check-circle text-oblink-orange"></i> 138 Annales (1999-2025)
                                </li>
                                <li class="flex items-center gap-3 text-gray-300">
                                    <i class="fas fa-check-circle text-oblink-orange"></i> Analyse de Vision & OGP
                                </li>
                                <li class="flex items-center gap-3 text-gray-300">
                                    <i class="fas fa-check-circle text-oblink-orange"></i> Corrigés Détaillés
                                </li>
                                <li class="flex items-center gap-3 text-gray-300">
                                    <i class="fas fa-check-circle text-oblink-orange"></i> Assistant IA Illimité
                                </li>
                                <li class="flex items-center gap-3 text-gray-300">
                                    <i class="fas fa-check-circle text-oblink-orange"></i> Fiches Révision NotebookLM
                                </li>
                                <li class="flex items-center gap-3 text-gray-300">
                                    <i class="fas fa-check-circle text-oblink-orange"></i> Quiz Interactifs
                                </li>
                            </div>

                            <div class="mb-6 bg-gray-700/50 p-4 rounded-xl border border-gray-600">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" id="cgu-consent"
                                            class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-gray-500 bg-gray-800 transition-all checked:border-oblink-orange checked:bg-oblink-orange hover:border-oblink-orange" />
                                        <div
                                            class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white opacity-0 peer-checked:opacity-100">
                                            <i class="fas fa-check text-xs"></i>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-300 select-none group-hover:text-white transition">
                                        J'accepte les <a href="<?php echo home_url('/cgu#academie-conditions'); ?>"
                                            target="_blank"
                                            class="text-oblink-orange underline hover:text-orange-400">CGU</a> et je
                                        reconnais qu'en accédant immédiatement au contenu numérique, <strong>je renonce
                                            à mon droit de rétractation</strong>.
                                    </span>
                                </label>
                            </div>

                            <button
                                class="add-to-cart-btn w-full py-5 bg-white text-gray-900 font-black rounded-xl hover:bg-oblink-orange hover:text-white transition-all transform hover:scale-[1.02] shadow-xl text-lg flex items-center justify-center gap-3"
                                data-id="pass-examen-bts" data-name="Pass Examen BTS" data-price="29"
                                data-category="B2C - Formation"
                                onclick="if(!document.getElementById('cgu-consent').checked) { alert('Veuillez accepter les conditions pour continuer.'); return false; }">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Ajouter au panier</span>
                            </button>
                            <p class="text-center text-gray-500 text-xs mt-4">Paiement sécurisé par Stripe • Facture
                                disponible</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ SECTION -->
    <div class="py-24 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-black text-center text-gray-900 mb-12">Questions Fréquentes</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Est-ce que cela couvre toutes les matières ?</h3>
                    <p class="text-gray-500">Nous nous concentrons principalement sur les matières techniques à fort
                        coefficient : Analyse de la Vision, Optique Géométrique et Physique, et Étude Technique. Les
                        maths et la gestion sont inclus en bonus.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Comment fonctionne l'IA ?</h3>
                    <p class="text-gray-500">Notre IA est entraînée sur 27 ans d'annales officielles. Elle ne fait pas
                        qu'inventer des réponses, elle restructure les connaissances officielles pour qu'elles soient
                        pédagogiques et faciles à retenir.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Puis-je l'utiliser sur mon téléphone ?</h3>
                    <p class="text-gray-500">Absolument. OBLINK Académie est une web-app optimisée pour mobile. Révisez
                        dans le bus, entre deux cours ou au lit.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include get_template_directory() . "/footer-content.php";
wp_footer();
?>