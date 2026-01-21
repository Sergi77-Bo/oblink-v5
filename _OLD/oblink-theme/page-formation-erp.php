<?php
/*
Template Name: Académie Oblink (Anciennement Formation ERP)
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header: La Vision Académie -->
        <div class="text-center mb-16 relative">
            <span
                class="inline-block py-1 px-3 rounded-full bg-oblink-orange/10 text-oblink-orange font-bold text-sm mb-4 uppercase tracking-wider">
                <i class="fas fa-graduation-cap mr-2"></i>Apprendre & Grandir
            </span>
            <h1 class="text-4xl md:text-6xl font-black font-display text-oblink-gray mb-6">
                L'Académie <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-oblink-violet">OBLINK</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-3xl mx-auto font-body leading-relaxed">
                Formations certifiantes, tutoriels logiciels et masterclasses d'experts.
                Augmentez votre valeur sur le marché ou monétisez votre savoir.
            </p>
        </div>

        <!-- Section 1: Logiciels & ERP (Gratuit - Partenaires) -->
        <div class="mb-20">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                <h2 class="text-2xl md:text-3xl font-bold text-oblink-gray flex items-center gap-3">
                    <span
                        class="w-10 h-10 rounded-xl bg-oblink-blue text-white flex items-center justify-center text-lg"><i
                            class="fas fa-laptop-code"></i></span>
                    Maîtriser les Outils (Gratuit)
                </h2>
                <span class="bg-green-100 text-green-700 font-bold px-3 py-1 rounded-full text-xs">OFFERT PAR LES
                    ÉDITEURS</span>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Course Card: Cosium -->
                <div onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ')"
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group cursor-pointer">
                    <div class="relative h-48 bg-gray-900 overflow-hidden">
                        <!-- YouTube Thumbnail Preview -->
                        <div class="absolute inset-0 flex items-center justify-center bg-gray-900">
                            <img src="https://www.cosium.com/wp-content/uploads/2019/04/Cosium-Logo-White.png"
                                alt="Cosium" class="h-12 w-auto object-contain opacity-90">
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-white/20 backdrop-blur text-white text-xs font-bold px-2 py-1 rounded">
                            <i class="fas fa-clock mr-1"></i> 2h30
                        </div>
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span
                                class="w-16 h-16 rounded-full bg-white text-oblink-blue flex items-center justify-center text-2xl shadow-2xl transform group-hover:scale-110 transition">
                                <i class="fas fa-play ml-1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-oblink-gray mb-1">Maîtriser Cosium Optic</h3>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">De la création client à la télétransmission.
                            Le guide complet officiel.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">
                                    C</div>
                                <span class="text-xs font-bold text-gray-500">Team Cosium</span>
                            </div>
                            <span class="text-oblink-blue font-bold">GRATUIT</span>
                        </div>
                    </div>
                </div>

                <!-- Course Card: Ivoirnet -->
                <div onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ')"
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group cursor-pointer">
                    <div class="relative h-48 bg-emerald-800 overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-white font-black text-3xl tracking-tighter">
                                IVOIRNET</h3>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-white/20 backdrop-blur text-white text-xs font-bold px-2 py-1 rounded">
                            <i class="fas fa-clock mr-1"></i> 1h45
                        </div>
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span
                                class="w-16 h-16 rounded-full bg-white text-emerald-600 flex items-center justify-center text-2xl shadow-2xl transform group-hover:scale-110 transition">
                                <i class="fas fa-play ml-1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-oblink-gray mb-1">Ivoirnet : L'essentiel</h3>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Gérer un magasin indépendant avec Ivoirnet.
                            Tiers-payant inclus.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                    I</div>
                                <span class="text-xs font-bold text-gray-500">Team Ivoirnet</span>
                            </div>
                            <span class="text-oblink-blue font-bold">GRATUIT</span>
                        </div>
                    </div>
                </div>

                <!-- Course Card: WinOptics -->
                <div onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ')"
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group cursor-pointer">
                    <div class="relative h-48 bg-orange-700 overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="text-white font-black text-3xl tracking-tighter">
                                WinOptics</h3>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-white/20 backdrop-blur text-white text-xs font-bold px-2 py-1 rounded">
                            <i class="fas fa-clock mr-1"></i> 1h00
                        </div>
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span
                                class="w-16 h-16 rounded-full bg-white text-orange-600 flex items-center justify-center text-2xl shadow-2xl transform group-hover:scale-110 transition">
                                <i class="fas fa-play ml-1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-oblink-gray mb-1">WinOptics Start</h3>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Prise en main rapide pour les remplacements
                            d'été.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-xs font-bold">
                                    W</div>
                                <span class="text-xs font-bold text-gray-500">Win Academy</span>
                            </div>
                            <span class="text-oblink-blue font-bold">GRATUIT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Expertise Clinique & Technique (Premium) -->
        <div class="mb-20">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                <h2 class="text-2xl md:text-3xl font-bold text-oblink-gray flex items-center gap-3">
                    <span
                        class="w-10 h-10 rounded-xl bg-oblink-violet text-white flex items-center justify-center text-lg"><i
                            class="fas fa-microscope"></i></span>
                    Expertise Clinique (Certifiant)
                </h2>
                <a href="#" class="text-sm font-bold text-gray-400 hover:text-oblink-violet">Tout voir <i
                        class="fas fa-arrow-right ml-1"></i></a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Course Card: Réfraction -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group">
                    <div class="relative h-48 bg-indigo-900 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-eye text-6xl text-white/20 group-hover:scale-110 transition"></i>
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                            <span class="bg-oblink-orange text-white text-[10px] font-bold px-2 py-1 rounded">BEST
                                SELLER</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg text-oblink-gray leading-tight">Refraction Complexe : Le Cas
                                par Cas</h3>
                            <div class="flex items-center text-yellow-400 text-xs gap-1">
                                <i class="fas fa-star"></i> 4.9
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Analysez et résolvez 99% des plaintes clients
                            en examen de vue.</p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg"
                                    class="w-8 h-8 rounded-full border border-gray-100" alt="Instructor">
                                <span class="text-xs font-bold text-gray-600">Dr. Marc L.</span>
                            </div>
                            <span class="font-black text-xl text-oblink-gray">159 €</span>
                        </div>
                    </div>
                </div>

                <!-- Course Card: Contactologie -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group">
                    <div class="relative h-48 bg-teal-800 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-dot-circle text-6xl text-white/20 group-hover:scale-110 transition"></i>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg text-oblink-gray leading-tight">Adaptation Lentilles Rigides
                            </h3>
                            <div class="flex items-center text-yellow-400 text-xs gap-1">
                                <i class="fas fa-star"></i> 4.8
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Ne laissez plus partir de clients faute de
                            compétence en rigides.</p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg"
                                    class="w-8 h-8 rounded-full border border-gray-100" alt="Instructor">
                                <span class="text-xs font-bold text-gray-600">Sarah B.</span>
                            </div>
                            <span class="font-black text-xl text-oblink-gray">129 €</span>
                        </div>
                    </div>
                </div>
                <!-- Course Card: Low Vision -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group">
                    <div class="relative h-48 bg-gray-800 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-search-plus text-6xl text-white/20 group-hover:scale-110 transition"></i>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-lg text-oblink-gray leading-tight">Initiation Basse Vision</h3>
                            <div class="flex items-center text-yellow-400 text-xs gap-1">
                                <i class="fas fa-star"></i> 4.5
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Un marché de niche très rentable. Apprenez
                            les bases.</p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <img src="https://randomuser.me/api/portraits/men/85.jpg"
                                    class="w-8 h-8 rounded-full border border-gray-100" alt="Instructor">
                                <span class="text-xs font-bold text-gray-600">Jean V.</span>
                            </div>
                            <span class="font-black text-xl text-oblink-gray">89 €</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- CTA: Devenir Formateur -->
        <div
            class="bg-gradient-to-br from-oblink-gray to-gray-900 rounded-3xl p-8 md:p-16 relative overflow-hidden text-center md:text-left">
            <!-- Background Decoration -->
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-oblink-orange/20 rounded-full blur-[100px] pointer-events-none transform translate-x-1/2 -translate-y-1/2">
            </div>

            <div class="relative z-10 grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span
                        class="inline-block py-1 px-3 rounded-full bg-white/10 text-white font-bold text-xs mb-4 border border-white/20">
                        APPEL AUX EXPERTS
                    </span>
                    <h2 class="text-3xl md:text-4xl font-black text-white font-display mb-6">Monétisez votre expertise
                        optique</h2>
                    <ul class="space-y-4 mb-8 text-gray-300">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-oblink-orange"></i>
                            <span>Touchez <strong>70% de commission</strong> sur chaque vente.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-oblink-orange"></i>
                            <span>Nous gérons le marketing et la plateforme.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-oblink-orange"></i>
                            <span>Accès immédiat à +500 opticiens qualifiés.</span>
                        </li>
                    </ul>
                    <a href="mailto:partenaires@oblink.com?subject=Je veux devenir formateur"
                        class="inline-block px-8 py-4 bg-white text-oblink-gray font-bold rounded-xl hover:bg-oblink-orange hover:text-white transition shadow-lg transform hover:-translate-y-1">
                        Devenir Formateur Oblink
                    </a>
                </div>
                <div class="relative hidden md:block">
                    <!-- Simuler une carte profil formateur -->
                    <div
                        class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl transform rotate-3 hover:rotate-0 transition duration-500">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg"
                                class="w-16 h-16 rounded-full border-2 border-oblink-orange">
                            <div>
                                <h4 class="text-white font-bold text-lg">Sarah B.</h4>
                                <p class="text-gray-400 text-sm">Experte Contactologie</p>
                            </div>
                        </div>
                        <div class="bg-black/30 rounded-xl p-4 mb-2">
                            <div class="text-xs text-gray-400 uppercase font-bold mb-1">Revenus ce mois</div>
                            <div class="text-3xl font-black text-white">2 450,00 €</div>
                        </div>
                        <div class="text-xs text-center text-gray-400 mt-2 italic"> * Revenu moyen top formateur</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="fixed inset-0 bg-black/90 z-[9999] hidden items-center justify-center p-4" onclick="closeVideoModal()">
    <div class="relative w-full max-w-5xl" onclick="event.stopPropagation()">
        <button onclick="closeVideoModal()" class="absolute -top-12 right-0 text-white hover:text-oblink-orange transition text-2xl">
            <i class="fas fa-times"></i>
        </button>
        <div class="relative w-full" style="padding-bottom: 56.25%; height: 0;">
            <iframe id="videoIframe" class="absolute top-0 left-0 w-full h-full rounded-xl" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<script>
function openVideoModal(videoUrl) {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoIframe');
    iframe.src = videoUrl + '?autoplay=1';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoIframe');
    iframe.src = '';
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>