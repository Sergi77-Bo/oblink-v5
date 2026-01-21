<?php
/**
 * Template Name: Presentation Style Malt
 * Description: A specialized landing page inspired by Malt's corporate branding.
 */
include 'header-inc.php';
?>

<!-- CUSTOM FONTS FOR THIS PAGE -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap');

    .font-malt {
        font-family: 'Montserrat', sans-serif;
    }

    /* Malt-style Organic Shape Separator */
    .shape-separator {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .shape-separator svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 120px;
    }

    .shape-separator .shape-fill {
        fill: #FFFFFF;
    }
</style>

<div class="bg-white min-h-screen">

    <!-- 1. HERO VIDEO SECTION -->
    <section class="relative h-screen w-full overflow-hidden flex items-center justify-center">
        <!-- Video Background Overlay -->
        <div class="absolute inset-0 bg-black/40 z-10"></div>

        <!-- Video Background -->
        <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover z-0">
            <!-- Placeholder for user video - to be replaced by actual file -->
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/presentation-hero.mp4"
                type="video/mp4">
        </video>

        <!-- Hero Content -->
        <div class="relative z-20 text-center px-4 max-w-7xl mx-auto">
            <h1
                class="font-malt text-6xl md:text-8xl text-white font-black tracking-tighter mb-6 drop-shadow-lg leading-tight uppercase">
                L'Avenir de<br>
                <span class="text-oblink-orange">l'Optique</span>
            </h1>
            <p class="text-xl md:text-2xl text-white font-medium max-w-2xl mx-auto mb-10 drop-shadow-md">
                Une vision nouvelle du recrutement et de la carrière pour les professionnels de la vision.
            </p>
            <a href="#video-reveal"
                class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white border-2 border-white rounded-full hover:bg-white hover:text-black transition-all duration-300">
                <i class="fas fa-play mr-3"></i> Découvrir le projet
            </a>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>

        <!-- Organic Shape Bottom -->
        <div class="shape-separator z-20">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- 2. SPLIT SCREEN: VISION & VALUES -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <!-- Left: Typography -->
                <div class="space-y-8">
                    <span
                        class="inline-block px-4 py-1 bg-orange-100 text-oblink-orange rounded-full font-bold text-sm tracking-wide uppercase">
                        Notre Mission
                    </span>
                    <h2 class="font-malt text-5xl md:text-6xl text-oblink-gray font-black leading-tight">
                        LIBÉRER<br>
                        LE POTENTIEL<br>
                        <span class="text-oblink-blue relative z-10">
                            HUMAIN
                            <svg class="absolute w-full h-4 -bottom-1 left-0 -z-10 text-blue-100 opacity-60"
                                viewBox="0 0 100 10" preserveAspectRatio="none">
                                <path d="M0 5 Q 50 10 100 5 L 100 10 L 0 10 Z" fill="currentColor" />
                            </svg>
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed font-light">
                        OBLINK n'est pas seulement une plateforme. C'est un écosystème conçu pour redonner le pouvoir
                        aux opticiens et simplifier la vie des entreprises.
                    </p>

                    <div class="space-y-4 pt-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-oblink-orange text-xl">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <span class="text-xl font-bold text-gray-800">Recrutement Instantané</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-oblink-blue text-xl">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <span class="text-xl font-bold text-gray-800">Géolocalisation Précise</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-violet-50 flex items-center justify-center text-oblink-violet text-xl">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <span class="text-xl font-bold text-gray-800">Formation Continue</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual Composition -->
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-oblink-orange/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10 grid grid-cols-2 gap-4">
                        <div class="space-y-4 mt-8">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                alt="Opticien travaillant"
                                class="rounded-2xl shadow-xl w-full h-64 object-cover hover:scale-105 transition duration-500">
                            <div class="bg-gray-900 text-white p-6 rounded-2xl shadow-xl text-center">
                                <span class="block text-4xl font-black font-malt text-oblink-orange">10x</span>
                                <span class="text-sm font-medium">Plus rapide qu'un cabinet classique</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-oblink-blue text-white p-6 rounded-2xl shadow-xl text-center">
                                <span class="block text-4xl font-black font-malt">100%</span>
                                <span class="text-sm font-medium">Digital & Sécurisé</span>
                            </div>
                            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                alt="Equipe heureuse"
                                class="rounded-2xl shadow-xl w-full h-80 object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PROJECT VIDEO SHOWCASE (USER VIDEO) -->
    <section id="video-reveal" class="py-24 bg-gray-900 text-white overflow-hidden relative">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-oblink-orange opacity-10 skew-x-12 transform translate-x-20">
        </div>

        <div class="max-w-6xl mx-auto px-4 relative z-10 text-center">
            <h2 class="font-malt text-4xl md:text-5xl font-black mb-12 uppercase tracking-wide">
                Le Projet <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-yellow-500">OBLINK</span>
            </h2>

            <!-- Video Container -->
            <div
                class="relative w-full max-w-4xl mx-auto rounded-3xl overflow-hidden shadow-2xl border-4 border-gray-800 bg-black aspect-video group cursor-pointer">
                <!-- PLAY BUTTON OVERLAY -->
                <div
                    class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/10 transition z-20 pointer-events-none">
                    <div
                        class="w-20 h-20 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-play text-white text-3xl ml-1"></i>
                    </div>
                </div>

                <video controls class="w-full h-full object-cover">
                    <!-- Replace with actual user video path -->
                    <source src="<?php echo get_template_directory_uri(); ?>/assets/video/presentation-full.mp4"
                        type="video/mp4">
                    otre navigateur ne supporte pas la lecture de vidéos.
                </video>
            </div>

            <p class="mt-8 text-gray-400 font-medium">
                Découvrez la genèse et les fonctionnalités clés de la plateforme.
            </p>
        </div>
    </section>

    <!-- 4. CTA / FOOTER OVERLAY -->
    <section class="py-20 bg-oblink-orange relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10"
            style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="font-malt text-4xl md:text-6xl text-white font-black mb-8 leading-tight">
                PRET A REJOINDRE<br>LE MOUVEMENT ?
            </h2>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="px-8 py-4 bg-white text-oblink-orange rounded-xl font-bold text-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                    Je suis Opticien
                </a>
                <a href="<?php echo home_url('/pour-entreprise'); ?>"
                    class="px-8 py-4 bg-gray-900 text-white rounded-xl font-bold text-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                    Je suis une Entreprise
                </a>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
?>