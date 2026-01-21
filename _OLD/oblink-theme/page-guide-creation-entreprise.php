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
</style>

<!-- Hero -->
<section class="bg-gradient-to-br from-oblink-blue/10 to-oblink-violet/10 pt-32 pb-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center px-4 py-2 bg-white rounded-full shadow-sm mb-6">
            <i class="fas fa-rocket text-oblink-orange mr-2"></i>
            <span class="text-sm font-semibold text-oblink-gray">GUIDE COMPLET</span>
        </div>
        <h1 class="text-5xl font-bold mb-6 text-oblink-gray" style="font-family: 'Montserrat', sans-serif;">
            Guide de Création d'Entreprise<br />
            <span class="text-oblink-orange">pour Opticiens Freelances</span>
        </h1>
        <p class="text-xl text-oblink-gray/70 max-w-3xl mx-auto">
            Tout ce que vous devez savoir pour devenir opticien indépendant : statut juridique, démarches
            administratives,
            comptabilité, assurances et accompagnement
        </p>
    </div>
</section>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-4 gap-8">
        <!-- Table of Contents (Sticky) -->
        <aside class="lg:col-span-1">
            <nav class="sticky-toc bg-white border-2 border-oblink-beige rounded-xl p-6">
                <h2 class="font-bold text-oblink-gray mb-4 flex items-center">
                    <i class="fas fa-list text-oblink-orange mr-2"></i>
                    Sommaire
                </h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="#introduction"
                            class="text-oblink-gray hover:text-oblink-orange transition">Introduction</a></li>
                    <li><a href="#statut-juridique" class="text-oblink-gray hover:text-oblink-orange transition">1.
                            Statut juridique</a></li>
                    <li><a href="#demarches" class="text-oblink-gray hover:text-oblink-orange transition">2. Démarches
                            administratives</a></li>
                    <li><a href="#comptabilite" class="text-oblink-gray hover:text-oblink-orange transition">3.
                            Comptabilité & Fiscalité</a></li>
                    <li><a href="#assurances" class="text-oblink-gray hover:text-oblink-orange transition">4. Assurances
                            obligatoires</a></li>
                    <li><a href="#tarification" class="text-oblink-gray hover:text-oblink-orange transition">5.
                            Tarification</a></li>
                    <li><a href="#facturation" class="text-oblink-gray hover:text-oblink-orange transition">6.
                            Facturation</a></li>
                    <li><a href="#developpement" class="text-oblink-gray hover:text-oblink-orange transition">7.
                            Développement</a></li>
                    <li><a href="#accompagnement" class="text-oblink-gray hover:text-oblink-orange transition">8.
                            Accompagnement OBLINK</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="lg:col-span-3">
            <!-- Introduction -->
            <section id="introduction" class="mb-16">
                <div class="bg-gradient-to-r from-oblink-orange to-oblink-violet text-white p-8 rounded-2xl mb-8">
                    <h2 class="text-3xl font-bold mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <i class="fas fa-info-circle mr-2"></i>
                        Bienvenue dans votre parcours entrepreneurial
                    </h2>
                    <p class="text-lg opacity-90">
                        Ce guide complet vous accompagne pas à pas dans la création de votre activité d'opticien
                        indépendant.
                        De la sélection du statut juridique jusqu'à la gestion quotidienne, découvrez toutes les étapes
                        et les meilleures pratiques pour réussir votre lancement.
                    </p>
                </div>
            </section>

            <!-- 1. Statut Juridique -->
            <section id="statut-juridique" class="mb-16 scroll-mt-24">
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    <span class="text-oblink-orange">1.</span> Choisir son statut juridique
                </h2>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-xl mb-8">
                    <h3 class="font-bold text-yellow-800 mb-2 flex items-center">
                        <i class="fas fa-lightbulb mr-2"></i>
                        Point clé
                    </h3>
                    <p class="text-yellow-700">
                        Le choix du statut juridique est la première décision stratégique. Il détermine votre protection
                        sociale,
                        votre fiscalité et votre responsabilité.
                    </p>
                </div>

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
                        <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                            <i class="fas fa-star mr-1"></i>Recommandé débutants
                        </span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="font-bold text-green-600 mb-3 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>Avantages
                            </h4>
                            <ul class="space-y-2 text-sm text-oblink-gray/80">
                                <li>Création rapide et gratuite</li>
                                <li>Comptabilité simplifiée</li>
                                <li>Pas de TVA jusqu'à 600€</li>
                                <li>Charges sociales proportionnelles au CA</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-red-500 mb-3 flex items-center">
                                <i class="fas fa-times-circle mr-2"></i>Limites
                            </h4>
                            <ul class="space-y-2 text-sm text-oblink-gray/80">
                                <li>Plafond de CA (77 700€ / an)</li>
                                <li>Pas de déduction des charges réelles</li>
                                <li>Responsabilité illimitée (sauf EIRL)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- EURL / SASU -->
                <div
                    class="bg-white border-2 border-oblink-beige rounded-xl p-8 mb-6 hover:border-oblink-orange transition">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-oblink-gray mb-2">
                                <i class="fas fa-building text-oblink-violet mr-2"></i>
                                Société (EURL / SASU)
                            </h3>
                            <p class="text-oblink-gray/70">Pour les projets ambitieux</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-bold text-green-600 mb-3 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>Avantages
                            </h4>
                            <ul class="space-y-2 text-sm text-oblink-gray/80">
                                <li>Pas de plafond de chiffre d'affaires</li>
                                <li>Déduction des charges réelles</li>
                                <li>Responsabilité limitée aux apports</li>
                                <li>Crédibilité auprès des banques</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-red-500 mb-3 flex items-center">
                                <i class="fas fa-times-circle mr-2"></i>Limites
                            </h4>
                            <ul class="space-y-2 text-sm text-oblink-gray/80">
                                <li>Formalités de création plus lourdes</li>
                                <li>Comptabilité complexe obligatoire</li>
                                <li>Coûts de gestion plus élevés</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 2. Tarification -->
            <section id="tarification" class="mb-16 scroll-mt-24">
                <h2 class="text-3xl font-bold text-oblink-gray mb-4 mt-8">5. Définir votre stratégie de tarification
                </h2>
                <p class="text-lg text-oblink-gray/80 mb-6 leading-relaxed">
                    La tarification est l'un des aspects les plus délicats de l'indépendance. Plusieurs facteurs entrent
                    en jeu :
                </p>

                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="border-2 border-oblink-beige rounded-xl p-6">
                        <h3 class="font-bold text-oblink-gray mb-3 flex items-center">
                            <i class="fas fa-map-marker-alt text-oblink-orange mr-2"></i>
                            Localisation géographique
                        </h3>
                        <p class="text-oblink-gray/70">
                            Île-de-France : 35-45€/h<br>
                            Grandes métropoles : 30-40€/h<br>
                            Villes moyennes : 25-35€/h
                        </p>
                    </div>
                    <div class="border-2 border-oblink-beige rounded-xl p-6">
                        <h3 class="font-bold text-oblink-gray mb-3 flex items-center">
                            <i class="fas fa-star text-oblink-blue mr-2"></i>
                            Niveau d'expérience
                        </h3>
                        <p class="text-oblink-gray/70">
                            Junior (0-3 ans) : 25-30€/h<br>
                            Confirmé (3-10 ans) : 30-40€/h<br>
                            Expert (10+ ans) : 40-50€/h
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Assurances -->
            <section id="assurances" class="mb-16 scroll-mt-24">
                <h2 class="text-3xl font-bold text-oblink-gray mb-4 mt-8">4. Sécuriser votre activité avec les bonnes
                    assurances</h2>
                <p class="text-lg text-oblink-gray/80 mb-6 leading-relaxed">
                    L'assurance Responsabilité Civile Professionnelle (RC Pro) est <strong>obligatoire</strong> pour les
                    opticiens.
                    Elle couvre les dommages causés à vos clients dans l'exercice de votre activité.
                </p>

                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 mb-8">
                    <h3 class="font-bold text-red-800 mb-3 flex items-center text-xl">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Attention : RC Pro obligatoire !
                    </h3>
                    <p class="text-red-700 mb-4">
                        Sans assurance RC Pro, vous ne pouvez légalement pas exercer. Le coût moyen varie entre 300€ et
                        600€/an
                        selon votre chiffre d'affaires et vos spécialités.
                    </p>
                    <a href="#"
                        class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Comparer les assurances RC Pro
                    </a>
                </div>
            </section>

            <!-- 4. Réseau -->
            <section id="developpement" class="mb-16 scroll-mt-24">
                <h2 class="text-3xl font-bold text-oblink-gray mb-4 mt-8">7. Construire votre réseau professionnel</h2>
                <p class="text-lg text-oblink-gray/80 mb-6 leading-relaxed">
                    Le réseau est votre meilleur atout pour trouver des missions régulières. Voici comment le développer
                    efficacement :
                </p>

                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-3 mt-1"></i>
                        <div>
                            <strong class="text-oblink-gray">Inscrivez-vous sur des plateformes spécialisées</strong>
                            <p class="text-oblink-gray/70">OBLINK, RemplacementOptique.fr, JobOptique.com</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-3 mt-1"></i>
                        <div>
                            <strong class="text-oblink-gray">Participez aux salons professionnels</strong>
                            <p class="text-oblink-gray/70">Silmo, Optique Paris, congrès de l'AOF</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-3 mt-1"></i>
                        <div>
                            <strong class="text-oblink-gray">Rejoignez des groupes LinkedIn</strong>
                            <p class="text-oblink-gray/70">Groupes d'opticiens, réseaux de freelances</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-3 mt-1"></i>
                        <div>
                            <strong class="text-oblink-gray">Contactez directement les magasins</strong>
                            <p class="text-oblink-gray/70">Email de présentation, visite de courtoisie</p>
                        </div>
                    </li>
                </ul>
            </section>

            <!-- 5. Gestion Quotidienne -->
            <section id="accompagnement" class="mb-16 scroll-mt-24">
                <h2 class="text-3xl font-bold text-oblink-gray mb-4 mt-8">5. Gérer votre activité au quotidien</h2>
                <p class="text-lg text-oblink-gray/80 mb-6 leading-relaxed">
                    La réussite de votre activité dépend aussi de votre organisation administrative et comptable :
                </p>

                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white border-2 border-oblink-beige rounded-xl p-6 text-center">
                        <i class="fas fa-file-invoice text-4xl text-oblink-orange mb-4"></i>
                        <h3 class="font-bold text-oblink-gray mb-2">Facturation</h3>
                        <p class="text-sm text-oblink-gray/70">Utilisez des outils conformes à la facturation
                            électronique obligatoire</p>
                    </div>
                    <div class="bg-white border-2 border-oblink-beige rounded-xl p-6 text-center">
                        <i class="fas fa-calculator text-4xl text-oblink-blue mb-4"></i>
                        <h3 class="font-bold text-oblink-gray mb-2">Comptabilité</h3>
                        <p class="text-sm text-oblink-gray/70">Suivez vos revenus et charges, préparez vos déclarations
                        </p>
                    </div>
                    <div class="bg-white border-2 border-oblink-beige rounded-xl p-6 text-center">
                        <i class="fas fa-calendar-check text-4xl text-oblink-violet mb-4"></i>
                        <h3 class="font-bold text-oblink-gray mb-2">Planning</h3>
                        <p class="text-sm text-oblink-gray/70">Gérez vos missions, disponibilités et prospection</p>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-oblink-orange to-oblink-violet text-white p-8 rounded-2xl mt-12">
                    <h3 class="text-2xl font-bold mb-4">Prêt à vous lancer ?</h3>
                    <p class="text-lg mb-6 opacity-90">
                        Rejoignez OBLINK et accédez immédiatement à des centaines de missions partout en France,
                        avec un accompagnement complet pour réussir votre indépendance.
                    </p>
                    <a href="<?php echo home_url('/inscription-opticien'); ?>"
                        class="inline-block px-8 py-4 bg-white text-oblink-orange rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                        Créer mon profil gratuitement <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </section>

        </main>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>