<?php
/*
Template Name: Accueil (Front Page)
*/
include 'header-inc.php';
?>

<!-- Hero Section with Glassmorphism -->
<section class="pt-20 md:pt-28 pb-12 md:pb-20 relative overflow-hidden" id="hero">
    <!-- Background gradient orbs -->
    <div class="hero-bg"></div>
    <div class="hero-gradient-orb orb-1"></div>
    <div class="hero-gradient-orb orb-2"></div>
    <div class="hero-gradient-orb orb-3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <div
                class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full shadow-sm mb-6 animate-fade-in-down border border-white/50">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-2 pulse-animation"></span>
                <span class="text-sm text-oblink-gray font-medium">+500 candidats actifs • +200 magasins
                    partenaires</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in"
                style="font-family: 'Montserrat', sans-serif;">
                <span class="text-oblink-orange">L'Optique</span><br />
                <span class="text-oblink-gray">en un clin d'œil</span>
            </h1>
            <p
                class="text-lg md:text-xl text-oblink-gray/80 mb-10 max-w-3xl mx-auto animate-fade-in-up leading-relaxed">
                Connectez-vous instantanément aux meilleures opportunités de l'optique.
                <span class="hidden md:inline"> Simple, rapide, et transparent pour tous.</span>
            </p>

            <!-- CTA Cards with Glassmorphism and Characters -->
            <div class="flex flex-col md:flex-row gap-6 justify-center items-stretch max-w-5xl mx-auto">
                <a href="<?php echo home_url('/recherche-opticiens'); ?>"
                    class="cta-card-glass group w-full md:w-1/2 animate-scale-in hover:border-oblink-blue/30 transition-all duration-300"
                    style="animation-delay: 0.2s">
                    <div class="cta-card-content flex-col gap-4">
                        <div class="flex items-center justify-between w-full px-4">
                            <span class="cta-badge cta-badge-optician">
                                <i class="fas fa-user-tie mr-2"></i>CANDIDAT
                            </span>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/optician.png"
                                alt="Illustration Candidat Opticien" class="w-16 h-16 object-contain animate-float">
                        </div>

                        <div class="cta-info text-left px-4 pb-2">
                            <h3 class="text-2xl font-bold text-oblink-gray mb-2">
                                Je cherche des missions
                            </h3>
                            <p class="text-oblink-gray/70 mb-4 text-sm">
                                Accédez à des missions qualifiées partout en France.
                            </p>
                            <div
                                class="inline-flex items-center justify-center w-full px-6 py-3 bg-oblink-blue text-white rounded-xl font-bold shadow-lg shadow-blue-500/20 group-hover:bg-blue-600 transition-all group-hover:shadow-blue-500/30">
                                Créer mon profil
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="<?php echo home_url('/pour-entreprises'); ?>"
                    class="cta-card-glass group w-full md:w-1/2 animate-scale-in hover:border-oblink-orange/30 transition-all duration-300"
                    style="animation-delay: 0.4s">
                    <div class="cta-card-content flex-col gap-4">
                        <div class="flex items-center justify-between w-full px-4">
                            <span class="cta-badge cta-badge-company">
                                <i class="fas fa-store mr-2"></i>ENTREPRISE
                            </span>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/company.png"
                                alt="Illustration Recruteur Entreprise" class="w-16 h-16 object-contain animate-float"
                                style="animation-delay: 1s">
                        </div>

                        <div class="cta-info text-left px-4 pb-2">
                            <h3 class="text-2xl font-bold text-oblink-gray mb-2">
                                Je recrute des talents
                            </h3>
                            <p class="text-oblink-gray/70 mb-4 text-sm">
                                Trouvez des opticiens qualifiés et pré-validés en 48h.
                            </p>
                            <div
                                class="inline-flex items-center justify-center w-full px-6 py-3 bg-oblink-orange text-white rounded-xl font-bold shadow-lg shadow-orange-500/20 group-hover:bg-orange-600 transition-all group-hover:shadow-orange-500/30">
                                Publier une offre
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section with Glassmorphism -->
<section class="py-10 md:py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="stat-card-glass text-center animate-fade-in-up group hover:bg-white/80 transition"
                style="animation-delay: 0.1s">
                <i
                    class="fas fa-chart-pie text-oblink-orange text-2xl mb-3 opacity-50 group-hover:opacity-100 transition"></i>
                <div class="stat-number"><span class="counter" data-target="8.3">0</span> Md€</div>
                <div class="text-sm text-oblink-gray/70 font-medium">Marché optique français</div>
            </div>
            <div class="stat-card-glass text-center animate-fade-in-up group hover:bg-white/80 transition"
                style="animation-delay: 0.2s">
                <i
                    class="fas fa-store text-oblink-blue text-2xl mb-3 opacity-50 group-hover:opacity-100 transition"></i>
                <div class="stat-number">+<span class="counter" data-target="13000">0</span></div>
                <div class="text-sm text-oblink-gray/70 font-medium">Magasins d'optique</div>
            </div>
            <div class="stat-card-glass text-center animate-fade-in-up group hover:bg-white/80 transition"
                style="animation-delay: 0.3s">
                <i
                    class="fas fa-user-friends text-oblink-violet text-2xl mb-3 opacity-50 group-hover:opacity-100 transition"></i>
                <div class="stat-number">+<span class="counter" data-target="44000">0</span></div>
                <div class="text-sm text-oblink-gray/70 font-medium">Professionnels actifs</div>
            </div>
            <div class="stat-card-glass text-center animate-fade-in-up group hover:bg-white/80 transition"
                style="animation-delay: 0.4s">
                <i class="fas fa-rocket text-green-500 text-2xl mb-3 opacity-50 group-hover:opacity-100 transition"></i>
                <div class="stat-number">+<span class="counter" data-target="15">0</span>%</div>
                <div class="text-sm text-oblink-gray/70 font-medium">Croissance freelancing</div>
            </div>
        </div>
    </div>
</section>

<!-- How it works with 3D Carousel - Optimized for Mobile -->
<section id="comment-ca-marche" class="py-12 md:py-20 pb-16 md:pb-32 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl md:text-5xl font-bold text-oblink-gray mb-4"
                style="font-family: 'Montserrat', sans-serif;">
                Comment ça marche ?
            </h2>
            <p class="text-lg md:text-xl text-oblink-gray/70">Simple, rapide, efficace</p>
        </div>

        <!-- 3D Carousel Container - Added min-height for mobile -->
        <div class="carousel-3d-container min-h-[400px] md:min-h-[500px]">
            <div class="carousel-3d" id="processCarousel">
                <!-- Slide 1 -->
                <div class="carousel-3d-item active" data-index="0">
                    <div class="process-card-glass h-full flex flex-col justify-center">
                        <div class="process-number mb-6">
                            <span class="text-oblink-orange text-4xl font-bold">1</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-oblink-gray">Créez votre profil</h3>
                        <p class="text-oblink-gray/80 leading-relaxed text-lg">Inscrivez-vous en quelques minutes et
                            complétez
                            votre profil professionnel.</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-3d-item next" data-index="1">
                    <div class="process-card-glass h-full flex flex-col justify-center">
                        <div class="process-number mb-6">
                            <span class="text-oblink-blue text-4xl font-bold">2</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-oblink-gray">Validation 4 étapes</h3>
                        <p class="text-oblink-gray/80 leading-relaxed text-lg">Votre profil est validé par notre équipe
                            :
                            diplômes, expérience et test.</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-3d-item prev" data-index="2">
                    <div class="process-card-glass h-full flex flex-col justify-center">
                        <div class="process-number mb-6">
                            <span class="text-oblink-violet text-4xl font-bold">3</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-oblink-gray">Connectez & Travaillez</h3>
                        <p class="text-oblink-gray/80 leading-relaxed text-lg">Recevez des propositions de missions
                            adaptées
                            et gérez tout depuis votre dashboard.</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="carousel-controls mt-8">
                <button class="carousel-btn bg-white/80 hover:bg-white shadow-lg" id="carousel-prev"
                    aria-label="Précédent">
                    <i class="fas fa-chevron-left text-oblink-gray"></i>
                </button>
                <button class="carousel-btn bg-white/80 hover:bg-white shadow-lg" id="carousel-next"
                    aria-label="Suivant">
                    <i class="fas fa-chevron-right text-oblink-gray"></i>
                </button>
            </div>

            <!-- Indicators -->
            <div class="carousel-indicators mt-6">
                <div class="carousel-indicator active" data-slide="0"></div>
                <div class="carousel-indicator" data-slide="1"></div>
                <div class="carousel-indicator" data-slide="2"></div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- OBLINK ACADEMIE SECTION (New Injection) -->
<section class="py-16 md:py-24 relative overflow-hidden bg-gray-900 border-y border-gray-800">
    <!-- Background Effects -->
    <div
        class="absolute inset-0 bg-[url('<?php echo get_template_directory_uri(); ?>/images/grid-pattern.png')] opacity-5">
    </div>
    <div
        class="absolute top-0 right-0 w-[500px] h-[500px] bg-oblink-orange/10 rounded-full blur-[100px] pointer-events-none">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <span
                class="inline-flex items-center px-4 py-1 rounded-full bg-oblink-orange/20 text-oblink-orange font-bold text-sm mb-4 border border-oblink-orange/20 uppercase tracking-wider">
                <i class="fas fa-graduation-cap mr-2"></i> Académie OBLINK
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4 font-display">
                Préparez votre succès avec l'IA
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                Étudiants ou Professionnels, démarquez-vous avec nos outils intelligents.
            </p>
        </div>

        <!-- 2-Card Layout: BTS + VAE -->
        <div class="grid md:grid-cols-2 gap-8">

            <!-- CARD 1: Pass BTS 2026 -->
            <div class="bg-gradient-to-br from-blue-600 to-purple-600 rounded-3xl p-1 group hover:scale-105 transition">
                <div class="bg-gray-900 rounded-[22px] p-8 h-full">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-white">Pass BTS 2026</h3>
                        <div
                            class="w-12 h-12 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center text-xl">
                            <i class="fas fa-robot"></i>
                        </div>
                    </div>

                    <p class="text-gray-300 mb-6">
                        IA qui corrige vos copies + 20 ans d'annales + Quiz adaptatifs Réforme 2026.
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            Correcteur IA (Gemini 2.0)
                        </li>
                        <li class="flex items-center text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            Annales 2005-2025 corrigées
                        </li>
                        <li class="flex items-center text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            Simulateur U41/U42/U5
                        </li>
                    </ul>

                    <div class="flex items-center justify-between">
                        <a href="<?php echo home_url('/formation-erp'); ?>"
                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg transition inline-block">
                            Découvrir
                        </a>
                        <span class="text-2xl font-bold text-white">29€<span
                                class="text-sm text-gray-400">/mois</span></span>
                    </div>
                </div>
            </div>

            <!-- CARD 2: Pass VAE -->
            <div
                class="bg-gradient-to-br from-indigo-600 to-orange-500 rounded-3xl p-1 group hover:scale-105 transition">
                <div class="bg-gray-900 rounded-[22px] p-8 h-full">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-white">Pass VAE</h3>
                        <div
                            class="w-12 h-12 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-xl">
                            <i class="fas fa-certificate"></i>
                        </div>
                    </div>

                    <p class="text-gray-300 mb-6">
                        Transformez votre expérience terrain en vocabulaire académique avec l'IA.
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            Assistant Rédaction Livret 2
                        </li>
                        <li class="flex items-center text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            Bouclier Anti-Piège (Oral)
                        </li>
                        <li class="flex items-center text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            Coach disponible 24/7
                        </li>
                    </ul>

                    <div class="flex items-center justify-between">
                        <a href="<?php echo home_url('/pass-vae'); ?>"
                            class="bg-gradient-to-r from-indigo-500 to-orange-500 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg transition inline-block">
                            Découvrir
                        </a>
                        <span class="text-2xl font-bold text-white">29€<span
                                class="text-sm text-gray-400">/mois</span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="text-center bg-white/5 rounded-2xl p-8 border border-white/10 backdrop-blur-sm">
        <div class="text-sm text-gray-400 uppercase tracking-widest mb-2">Offre de Lancement</div>
        <div class="text-5xl font-black text-white mb-2">29 €</div>
        <div class="text-gray-400 mb-8">Accès total • 6 mois</div>

        <a href="<?php echo home_url('/pass-examen'); ?>"
            class="block w-full py-4 bg-oblink-orange hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg hover:shadow-orange-500/25 transition transform hover:scale-105 uppercase tracking-wide">
            🚀 Activer mon Pass Examen
        </a>
        <p class="text-xs text-gray-500 mt-4">Satisfait ou remboursé sous 14 jours</p>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

<!-- SECTION PREVIOUSLY ENDED HERE -->


<!-- For Opticians Section -->
<section id="pour-opticiens" class="py-10 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="feature-content">
                <span
                    class="inline-block px-4 py-2 bg-oblink-blue/10 text-oblink-blue rounded-full text-sm font-semibold mb-4">
                    POUR LES OPTICIENS
                </span>
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    Trouvez des missions en toute <span class="text-oblink-orange">liberté</span>
                </h2>
                <p class="text-lg text-oblink-gray/70 mb-8">
                    Que vous soyez en transition vers l'indépendance ou opticien établi, OBLINK vous donne accès à
                    un
                    vivier de missions qualifiées partout en France.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start feature-item">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Missions adaptées à votre profil</h4>
                            <p class="text-oblink-gray/70">Filtrez par localisation, spécialité et disponibilités
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start feature-item">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Accompagnement complet</h4>
                            <p class="text-oblink-gray/70">Portage salarial, assurance RC, formations continues</p>
                        </div>
                    </div>
                    <div class="flex items-start feature-item">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Paiements sécurisés</h4>
                            <p class="text-oblink-gray/70">Facturation simplifiée et paiements garantis</p>
                        </div>
                    </div>
                </div>

                <!-- FIXED LINK: Redirects to Inscription -->
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="inline-block px-8 py-4 bg-oblink-orange text-white rounded-lg hover:bg-oblink-orange/90 transition shadow-lg transform hover:scale-105">
                    Créer mon profil d'opticien <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="relative animate-scale-in" style="animation-delay: 0.3s">
                <div class="feature-image-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/optician.png"
                        alt="Opticien professionnel" class="feature-character">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- For Companies Section -->
<section id="pour-entreprises" class="py-10 md:py-20 bg-oblink-beige/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative order-2 md:order-1 animate-scale-in" style="animation-delay: 0.3s">
                <div class="feature-image-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/company.png"
                        alt="Gestionnaire entreprise" class="feature-character" style="animation-delay: 1s">
                </div>
            </div>

            <div class="order-1 md:order-2 feature-content">
                <span
                    class="inline-block px-4 py-2 bg-oblink-orange/10 text-oblink-orange rounded-full text-sm font-semibold mb-4">
                    POUR LES ENTREPRISES
                </span>
                <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                    Recrutez des talents <span class="text-oblink-orange">validés</span>
                </h2>
                <p class="text-lg text-oblink-gray/70 mb-8">
                    Trouvez rapidement des opticiens qualifiés pour vos remplacements urgents, missions ponctuelles
                    ou
                    recrutements permanents.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start feature-item">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Profils pré-validés</h4>
                            <p class="text-oblink-gray/70">Processus de validation en 4 étapes pour garantir la
                                qualité
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start feature-item">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Réponse en 48h</h4>
                            <p class="text-oblink-gray/70">Trouvez un remplaçant rapidement pour vos urgences</p>
                        </div>
                    </div>
                    <div class="flex items-start feature-item">
                        <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Économisez jusqu'à 40%</h4>
                            <p class="text-oblink-gray/70">Par rapport aux agences d'intérim traditionnelles</p>
                        </div>
                    </div>
                </div>

                <!-- FIXED LINK: Redirects to Inscription -->
                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="inline-block px-8 py-4 bg-oblink-orange text-white rounded-lg hover:bg-oblink-orange/90 transition shadow-lg transform hover:scale-105">
                    Publier une offre <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section - Compact Liquid Glass -->
<section class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-violet-50 relative overflow-hidden">
    <!-- Liquid Glass Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="liquid-glass-blob blob-1"></div>
        <div class="liquid-glass-blob blob-2"></div>
        <div class="liquid-glass-blob blob-3"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-oblink-gray mb-2"
                style="font-family: 'Montserrat', sans-serif;">
                Écosystème <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-oblink-violet">360°</span>
            </h2>
            <p class="text-sm text-oblink-gray/70">Plus qu'une plateforme, un accompagnement complet</p>
        </div>

        <!-- Grid horizontal scrollable mobile -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="service-card-liquid group" data-delay="0.1">
                <div class="service-icon-mini"><i class="fas fa-shield-alt"></i></div>
                <h3 class="text-sm font-bold text-oblink-gray">RC Pro</h3>
            </div>

            <div class="service-card-liquid group" data-delay="0.2">
                <div class="service-icon-mini"><i class="fas fa-briefcase"></i></div>
                <h3 class="text-sm font-bold text-oblink-gray">Portage</h3>
            </div>

            <div class="service-card-liquid group" data-delay="0.3">
                <div class="service-icon-mini"><i class="fas fa-graduation-cap"></i></div>
                <h3 class="text-sm font-bold text-oblink-gray">Formation</h3>
            </div>

            <div class="service-card-liquid group" data-delay="0.4">
                <div class="service-icon-mini"><i class="fas fa-gavel"></i></div>
                <h3 class="text-sm font-bold text-oblink-gray">Juridique</h3>
            </div>

            <div class="service-card-liquid group" data-delay="0.5">
                <div class="service-icon-mini"><i class="fas fa-file-invoice"></i></div>
                <h3 class="text-sm font-bold text-oblink-gray">Facturation</h3>
            </div>

            <div class="service-card-liquid group" data-delay="0.6">
                <div class="service-icon-mini"><i class="fas fa-users"></i></div>
                <h3 class="text-sm font-bold text-oblink-gray">Communauté</h3>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials - Compact Liquid Glass -->
<section class="py-12 bg-white relative overflow-hidden">
    <!-- Animated particles background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="particle-container" id="particles-testimonials"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-oblink-gray" style="font-family: 'Montserrat', sans-serif;">
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange via-oblink-violet to-oblink-blue">4.9/5</span>
                sur 180+ avis
            </h2>
        </div>

        <!-- Horizontal scroll on mobile, grid on desktop -->
        <div
            class="flex md:grid md:grid-cols-2 gap-4 md:gap-6 overflow-x-auto md:overflow-visible snap-x snap-mandatory md:snap-none pb-4 md:pb-0 -mx-4 px-4 md:mx-0">
            <div class="testimonial-card-liquid snap-center flex-shrink-0 w-[85vw] md:w-auto" data-delay="0.2">
                <div class="flex items-center mb-3">
                    <div class="testimonial-avatar-mini">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-bold text-oblink-gray text-sm">Sarah D.</h4>
                        <p class="text-xs text-oblink-gray/70">Opticienne freelance</p>
                    </div>
                    <div class="flex text-yellow-400 text-xs ml-auto">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-oblink-gray/80 text-sm leading-relaxed">
                    "J'ai trouvé mes premières missions en moins d'une semaine. L'accompagnement administratif est
                    vraiment précieux."
                </p>
            </div>

            <div class="testimonial-card-liquid snap-center flex-shrink-0 w-[85vw] md:w-auto" data-delay="0.4">
                <div class="flex items-center mb-3">
                    <div class="testimonial-avatar-mini">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-bold text-oblink-gray text-sm">Pierre M.</h4>
                        <p class="text-xs text-oblink-gray/70">Gérant magasin</p>
                    </div>
                    <div class="flex text-yellow-400 text-xs ml-auto">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-oblink-gray/80 text-sm leading-relaxed">
                    "Profils validés, réponse en 48h max. Économies importantes par rapport aux agences d'intérim."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Shield Section (New) -->
<section class="py-16 bg-white relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-oblink-gray mb-4"
                style="font-family: 'Montserrat', sans-serif;">
                Questions <span class="text-oblink-orange">Fréquentes</span>
            </h2>
            <p class="text-lg text-gray-500">Tout ce que vous devez savoir avant de commencer.</p>
        </div>

        <div class="space-y-4">
            <!-- Question 1 -->
            <div class="bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-lg transition duration-300 border border-transparent hover:border-gray-100 group cursor-pointer"
                onclick="this.classList.toggle('active')">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-oblink-orange transition">Est-ce que le
                        contenu est à jour pour la réforme BTS OL 2026 ?</h3>
                    <i
                        class="fas fa-chevron-down text-gray-400 transform transition-transform group-[.active]:rotate-180"></i>
                </div>
                <div class="text-gray-600 leading-relaxed hidden group-[.active]:block animate-fade-in">
                    <strong class="text-gray-900">Oui.</strong> Notre IA est entraînée sur le nouveau référentiel.
                    Chaque question générée prend en compte les dernières évolutions techniques et réglementaires du
                    secteur.
                </div>
            </div>

            <!-- Question 2 -->
            <div class="bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-lg transition duration-300 border border-transparent hover:border-gray-100 group cursor-pointer"
                onclick="this.classList.toggle('active')">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-oblink-orange transition">OBLINK est-il
                        une agence d'intérim ?</h3>
                    <i
                        class="fas fa-chevron-down text-gray-400 transform transition-transform group-[.active]:rotate-180"></i>
                </div>
                <div class="text-gray-600 leading-relaxed hidden group-[.active]:block animate-fade-in">
                    <strong class="text-gray-900">Non.</strong> Nous sommes une plateforme de mise en relation directe.
                    Cela nous permet de supprimer les intermédiaires et d'offrir des TJM plus élevés aux freelances et
                    des coûts réduits aux magasins.
                </div>
            </div>

            <!-- Question 3 -->
            <div class="bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-lg transition duration-300 border border-transparent hover:border-gray-100 group cursor-pointer"
                onclick="this.classList.toggle('active')">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-oblink-orange transition">Comment mon
                        profil est-il certifié ?</h3>
                    <i
                        class="fas fa-chevron-down text-gray-400 transform transition-transform group-[.active]:rotate-180"></i>
                </div>
                <div class="text-gray-600 leading-relaxed hidden group-[.active]:block animate-fade-in">
                    Votre profil devient <strong class="text-green-600">"Certifié OBLINK"</strong> dès que vous
                    réussissez nos tests d'expertise (Logiciel ERP, Réfraction, Gestion). C'est ce badge qui garantit
                    votre visibilité auprès des recruteurs.
                </div>
            </div>

            <!-- Question 4 -->
            <div class="bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-lg transition duration-300 border border-transparent hover:border-gray-100 group cursor-pointer"
                onclick="this.classList.toggle('active')">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-oblink-orange transition">Puis-je
                        utiliser mon compte sur plusieurs appareils ?</h3>
                    <i
                        class="fas fa-chevron-down text-gray-400 transform transition-transform group-[.active]:rotate-180"></i>
                </div>
                <div class="text-gray-600 leading-relaxed hidden group-[.active]:block animate-fade-in">
                    Pour garantir la sécurité de vos données et la rentabilité du service, l'accès est limité à <strong
                        class="text-gray-900">deux appareils</strong> (ex: votre mobile et votre ordinateur).
                </div>
            </div>

            <!-- Question 5 -->
            <div class="bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-lg transition duration-300 border border-transparent hover:border-gray-100 group cursor-pointer"
                onclick="this.classList.toggle('active')">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-oblink-orange transition">Comment sont
                        sécurisés mes paiements ?</h3>
                    <i
                        class="fas fa-chevron-down text-gray-400 transform transition-transform group-[.active]:rotate-180"></i>
                </div>
                <div class="text-gray-600 leading-relaxed hidden group-[.active]:block animate-fade-in">
                    Tous les flux financiers sont gérés par <strong class="text-purple-600">Stripe</strong>, le leader
                    mondial du paiement sécurisé. OBLINK n'a jamais accès à vos coordonnées bancaires.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-10 md:py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span
                class="inline-block px-4 py-2 bg-oblink-orange/10 text-oblink-orange rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-newspaper mr-2"></i>BLOG OBLINK
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-oblink-gray mb-4"
                style="font-family: 'Montserrat', sans-serif;">
                Conseils & <span class="text-oblink-orange">Actualités</span>
            </h2>
            <p class="text-xl text-oblink-gray/70 max-w-2xl mx-auto">
                Guides pratiques, témoignages et actualités pour réussir en tant qu'opticien indépendant
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <?php
            // Query latest 3 posts
            $args = array(
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $latest_posts = new WP_Query($args);

            if ($latest_posts->have_posts()):
                while ($latest_posts->have_posts()):
                    $latest_posts->the_post();
                    $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    if (!$thumb_url) {
                        // Fallback image if no featured image
                        $thumb_url = 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800';
                    }
                    ?>
                    <article class="group">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <div class="relative overflow-hidden rounded-2xl mb-4 h-56">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span
                                        class="inline-block px-3 py-1 bg-oblink-orange text-white rounded-full text-xs font-semibold mb-2">
                                        <?php
                                        $cats = get_the_category();
                                        echo !empty($cats) ? esc_html($cats[0]->name) : 'Actualité';
                                        ?>
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i><?php echo get_the_date('d M Y'); ?></span>
                                        <span><i class="fas fa-clock mr-1"></i>5 min</span>
                                    </div>
                                </div>
                            </div>
                            <h3
                                class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <span
                                class="inline-flex items-center text-oblink-orange font-semibold text-sm group-hover:underline">
                                Lire l'article <i
                                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback content if no posts exist (so the section isn't empty in dev)
                ?>
                <div class="col-span-3 text-center text-gray-400 py-10">
                    <p>Aucun article publié pour le moment.</p>
                </div>
                <?php
            endif;
            ?>
        </div>

        <!-- CTA vers le blog -->
        <div class="text-center">
            <a href="<?php echo home_url('/blog'); ?>"
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white rounded-xl font-semibold hover:shadow-xl transition transform hover:scale-105">
                <i class="fas fa-newspaper mr-2"></i>
                Découvrir tous les articles
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Community Newsletter Section -->
<section class="py-8 md:py-16 pb-16 md:pb-32 mb-20 relative overflow-hidden">
    <!-- Background with gradient and mesh -->
    <div class="absolute inset-0 bg-gray-900">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-oblink-gray opacity-90"></div>
        <!-- Abstract Shapes -->
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-oblink-orange/20 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-oblink-violet/20 rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2">
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span
            class="inline-block px-4 py-1.5 rounded-full bg-white/10 text-white/90 text-sm font-semibold mb-4 border border-white/20 backdrop-blur-sm">
            <i class="fas fa-star text-oblink-orange mr-2"></i>Rejoignez l'élite de l'optique
        </span>

        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight"
            style="font-family: 'Overpass', sans-serif;">
            Ne manquez aucune <span
                class="bg-gradient-to-r from-oblink-orange to-oblink-orange/80 bg-clip-text text-transparent">opportunité</span>.
        </h2>

        <p class="text-xl text-gray-300 mb-6 max-w-2xl mx-auto leading-relaxed">
            Recevez en exclusivité les dernières missions, les actualités du secteur et nos conseils d'experts. Pas de
            spam, juste de la valeur.
        </p>

        <form class="max-w-lg mx-auto relative group"
            onsubmit="event.preventDefault(); showToast('Merci ! Vous faites désormais partie du cercle.', 'success');">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-oblink-orange to-oblink-violet rounded-xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200">
            </div>
            <div class="relative flex items-center bg-white rounded-xl p-1.5 shadow-2xl">
                <div class="flex-shrink-0 pl-4 pr-2 text-gray-400">
                    <i class="fas fa-envelope"></i>
                </div>
                <input type="email" placeholder="Votre email professionnel" required
                    class="flex-1 p-3 text-gray-900 placeholder-gray-400 bg-transparent border-none focus:ring-0 focus:outline-none w-full">
                <button type="submit"
                    class="px-6 py-3 bg-oblink-gray text-white font-bold rounded-lg hover:bg-gray-800 transition-all duration-200 shadow-md whitespace-nowrap">
                    Rejoindre le cercle
                </button>
            </div>
            <p class="text-gray-500 text-xs mt-4">
                <i class="fas fa-lock mr-1"></i> Vos données sont protégées. Désinscription à tout moment.
            </p>
        </form>
    </div>
</section>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>