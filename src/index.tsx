import { Hono } from 'hono'
import { cors } from 'hono/cors'
import { serveStatic } from 'hono/cloudflare-workers'

const app = new Hono()

// Enable CORS for frontend-backend communication
app.use('/api/*', cors())

// Serve static files from public directory
app.use('/static/*', serveStatic({ root: './public' }))
app.use('/images/*', serveStatic({ root: './public' }))

// API routes
app.get('/api/stats', (c) => {
  return c.json({
    market: '8.3 Md€',
    stores: 13300,
    opticians: 44000,
    growth: '+15%'
  })
})

// Blog route
app.get('/blog', (c) => {
  return c.html(`
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog OBLINK - Actualités et conseils pour opticiens freelance</title>
        <meta name="description" content="Découvrez nos articles sur la gestion freelance, la réglementation optique, et les témoignages d'opticiens indépendants.">
        <link rel="canonical" href="https://oblink.fr/blog">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" rel="stylesheet">
        <link href="/static/styles.css" rel="stylesheet">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'oblink-orange': '#FF6600',
                            'oblink-blue': '#62929E',
                            'oblink-violet': '#9A48D0',
                            'oblink-gray': '#393D3F'
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-gradient-to-br from-slate-50 via-blue-50 to-violet-50">
        <!-- Navbar -->
        <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <a href="/" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-oblink-orange to-oblink-violet rounded-xl flex items-center justify-center">
                            <i class="fas fa-glasses text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-oblink-orange to-oblink-violet bg-clip-text text-transparent">
                            OBLINK
                        </span>
                    </a>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/#comment" class="text-oblink-gray hover:text-oblink-orange transition">Comment ça marche</a>
                        <a href="/#opticiens" class="text-oblink-gray hover:text-oblink-orange transition">Pour Opticiens</a>
                        <a href="/#entreprises" class="text-oblink-gray hover:text-oblink-orange transition">Pour Entreprises</a>
                        <a href="/blog" class="text-oblink-orange font-semibold border-b-2 border-oblink-orange">Blog</a>
                        <a href="/connexion" class="text-oblink-gray hover:text-oblink-orange transition">Connexion</a>
                        <a href="/inscription" class="px-6 py-2 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white rounded-lg font-semibold hover:shadow-lg transition">
                            S'inscrire
                        </a>
                    </div>
                    
                    <button id="mobile-menu-button" class="md:hidden text-oblink-gray">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-xl shadow-xl">
                <div class="px-4 pt-2 pb-4 space-y-2">
                    <a href="/#comment" class="block px-4 py-2 text-oblink-gray hover:bg-oblink-orange/10 rounded-lg transition">Comment ça marche</a>
                    <a href="/#opticiens" class="block px-4 py-2 text-oblink-gray hover:bg-oblink-orange/10 rounded-lg transition">Pour Opticiens</a>
                    <a href="/#entreprises" class="block px-4 py-2 text-oblink-gray hover:bg-oblink-orange/10 rounded-lg transition">Pour Entreprises</a>
                    <a href="/blog" class="block px-4 py-2 bg-oblink-orange/10 text-oblink-orange font-semibold rounded-lg">Blog</a>
                    <a href="/connexion" class="block px-4 py-2 text-oblink-gray hover:bg-oblink-orange/10 rounded-lg transition">Connexion</a>
                    <a href="/inscription" class="block px-4 py-2 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white rounded-lg font-semibold text-center">S'inscrire</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="pt-32 pb-16 px-4">
            <div class="max-w-7xl mx-auto text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/60 backdrop-blur-xl border border-white/40 rounded-full mb-6 shadow-xl">
                    <i class="fas fa-newspaper text-oblink-orange mr-2"></i>
                    <span class="text-sm font-semibold text-oblink-gray">Blog OBLINK</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-oblink-orange via-oblink-violet to-oblink-blue bg-clip-text text-transparent" style="font-family: 'Montserrat', sans-serif;">
                    Actualités & Conseils
                </h1>
                <p class="text-xl text-oblink-gray/70 max-w-3xl mx-auto mb-8">
                    Découvrez nos articles, témoignages et guides pratiques pour réussir en tant qu'opticien freelance
                </p>
                
                <!-- Filtres -->
                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button class="filter-btn active px-6 py-2 rounded-full font-semibold transition" data-category="all">
                        Tous les articles
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition" data-category="temoignage">
                        <i class="fas fa-star mr-2"></i>Témoignages
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition" data-category="reglementation">
                        <i class="fas fa-balance-scale mr-2"></i>Réglementation
                    </button>
                    <button class="filter-btn px-6 py-2 rounded-full font-semibold transition" data-category="gestion">
                        <i class="fas fa-calculator mr-2"></i>Gestion
                    </button>
                </div>
            </div>
        </section>

        <!-- Articles Grid -->
        <section class="pb-20 px-4">
            <div class="max-w-7xl mx-auto">
                <div id="articles-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Article 1 -->
                    <article class="article-card group" data-category="temoignage">
                        <a href="/#blog" class="block glass-card p-0 overflow-hidden h-full hover:scale-105 transition-transform duration-300">
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=800" 
                                    alt="Opticienne freelance Sophie" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-orange text-white rounded-full text-xs font-semibold mb-2">
                                        Témoignage
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>20 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>7 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                    J'ai quitté mon CDI pour devenir opticienne freelance
                                </h3>
                                <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-4">
                                    Sophie, 32 ans, raconte son parcours : de salariée en magasin à opticienne indépendante avec 15 clients réguliers...
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-oblink-orange to-oblink-violet rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            SL
                                        </div>
                                        <span class="text-oblink-gray/70">Sophie Laurent</span>
                                    </div>
                                    <span class="inline-flex items-center text-oblink-orange font-semibold group-hover:underline">
                                        Lire <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>

                    <!-- Article 2 -->
                    <article class="article-card group" data-category="reglementation">
                        <a href="/#blog" class="block glass-card p-0 overflow-hidden h-full hover:scale-105 transition-transform duration-300">
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800" 
                                    alt="Facturation électronique" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-blue text-white rounded-full text-xs font-semibold mb-2">
                                        Réglementation
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>18 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>10 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                    Facturation électronique 2025 : Guide complet
                                </h3>
                                <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-4">
                                    Tout ce que vous devez savoir sur la réforme : dates clés, plateforme PDT, mentions obligatoires...
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-oblink-blue to-oblink-violet rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            MD
                                        </div>
                                        <span class="text-oblink-gray/70">Marie Dubois</span>
                                    </div>
                                    <span class="inline-flex items-center text-oblink-orange font-semibold group-hover:underline">
                                        Lire <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>

                    <!-- Article 3 -->
                    <article class="article-card group" data-category="gestion">
                        <a href="/#blog" class="block glass-card p-0 overflow-hidden h-full hover:scale-105 transition-transform duration-300">
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=800" 
                                    alt="Calculer taux horaire" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-violet text-white rounded-full text-xs font-semibold mb-2">
                                        Gestion
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>15 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>12 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                    Calculer votre taux horaire : méthode complète
                                </h3>
                                <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-4">
                                    Charges sociales, congés, frais professionnels, marge : calculez précisément votre taux horaire...
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-oblink-violet to-oblink-orange rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            PB
                                        </div>
                                        <span class="text-oblink-gray/70">Pierre Bernard</span>
                                    </div>
                                    <span class="inline-flex items-center text-oblink-orange font-semibold group-hover:underline">
                                        Lire <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>

                    <!-- Article 4 -->
                    <article class="article-card group" data-category="gestion">
                        <a href="/#blog" class="block glass-card p-0 overflow-hidden h-full hover:scale-105 transition-transform duration-300">
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800" 
                                    alt="Développer clientèle" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-violet text-white rounded-full text-xs font-semibold mb-2">
                                        Gestion
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>12 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>8 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                    5 stratégies pour développer votre clientèle
                                </h3>
                                <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-4">
                                    Réseaux sociaux, partenariats locaux, bouche-à-oreille : les meilleures techniques pour attirer des clients...
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-oblink-orange to-oblink-blue rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            AL
                                        </div>
                                        <span class="text-oblink-gray/70">Antoine Leroy</span>
                                    </div>
                                    <span class="inline-flex items-center text-oblink-orange font-semibold group-hover:underline">
                                        Lire <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>

                    <!-- Article 5 -->
                    <article class="article-card group" data-category="temoignage">
                        <a href="/#blog" class="block glass-card p-0 overflow-hidden h-full hover:scale-105 transition-transform duration-300">
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1559521783-1d1599583485?w=800" 
                                    alt="Opticien en campagne" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-orange text-white rounded-full text-xs font-semibold mb-2">
                                        Témoignage
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>10 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>6 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                    Opticien freelance en milieu rural : mon retour d'expérience
                                </h3>
                                <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-4">
                                    Marc intervient dans 5 magasins en zone rurale. Il partage ses astuces logistiques et relationnelles...
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-oblink-orange to-oblink-violet rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            MT
                                        </div>
                                        <span class="text-oblink-gray/70">Marc Thomas</span>
                                    </div>
                                    <span class="inline-flex items-center text-oblink-orange font-semibold group-hover:underline">
                                        Lire <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>

                    <!-- Article 6 -->
                    <article class="article-card group" data-category="reglementation">
                        <a href="/#blog" class="block glass-card p-0 overflow-hidden h-full hover:scale-105 transition-transform duration-300">
                            <div class="relative overflow-hidden h-56">
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800" 
                                    alt="Assurance responsabilité civile" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-blue text-white rounded-full text-xs font-semibold mb-2">
                                        Réglementation
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>8 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>9 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                    Assurance RC Pro : ce que vous devez savoir
                                </h3>
                                <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-4">
                                    Obligations légales, garanties essentielles, montants de couverture : tout sur l'assurance responsabilité civile...
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-oblink-blue to-oblink-orange rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            CG
                                        </div>
                                        <span class="text-oblink-gray/70">Claire Girard</span>
                                    </div>
                                    <span class="inline-flex items-center text-oblink-orange font-semibold group-hover:underline">
                                        Lire <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>

                </div>

                <!-- CTA -->
                <div class="text-center mt-16">
                    <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white rounded-xl font-semibold hover:shadow-xl transition transform hover:scale-105">
                        <i class="fas fa-home mr-2"></i>
                        Retour à l'accueil
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-oblink-gray text-white py-12 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-oblink-orange to-oblink-violet rounded-xl flex items-center justify-center">
                                <i class="fas fa-glasses text-white text-xl"></i>
                            </div>
                            <span class="text-2xl font-bold">OBLINK</span>
                        </div>
                        <p class="text-white/70 text-sm">
                            La plateforme qui connecte les opticiens freelance avec les opportunités professionnelles.
                        </p>
                    </div>
                    
                    <div>
                        <h4 class="font-bold mb-4">Navigation</h4>
                        <ul class="space-y-2 text-sm text-white/70">
                            <li><a href="/" class="hover:text-oblink-orange transition">Accueil</a></li>
                            <li><a href="/#comment" class="hover:text-oblink-orange transition">Comment ça marche</a></li>
                            <li><a href="/#opticiens" class="hover:text-oblink-orange transition">Pour Opticiens</a></li>
                            <li><a href="/#entreprises" class="hover:text-oblink-orange transition">Pour Entreprises</a></li>
                            <li><a href="/blog" class="hover:text-oblink-orange transition">Blog</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold mb-4">Légal</h4>
                        <ul class="space-y-2 text-sm text-white/70">
                            <li><a href="/mentions-legales" class="hover:text-oblink-orange transition">Mentions légales</a></li>
                            <li><a href="/politique-confidentialite" class="hover:text-oblink-orange transition">Confidentialité</a></li>
                            <li><a href="/cgu" class="hover:text-oblink-orange transition">CGU</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold mb-4">Suivez-nous</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-oblink-orange rounded-lg flex items-center justify-center transition">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-oblink-orange rounded-lg flex items-center justify-center transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-oblink-orange rounded-lg flex items-center justify-center transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-white/10 pt-8 text-center text-sm text-white/50">
                    <p>&copy; <span id="year"></span> OBLINK. Tous droits réservés.</p>
                </div>
            </div>
        </footer>

        <script src="/static/app.js"></script>
    </body>
    </html>
  `)
})

// Default route - Homepage
app.get('/', (c) => {
  return c.html(`
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OBLINK - Un opticien en un clin d'œil</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
        <link href="/static/styles.css" rel="stylesheet">
        <script>
          tailwind.config = {
            theme: {
              extend: {
                colors: {
                  'oblink-orange': '#FF6600',
                  'oblink-blue': '#62929E',
                  'oblink-violet': '#9A48D0',
                  'oblink-pink': '#FF1493',
                  'oblink-beige': '#EAEBC4',
                  'oblink-gray': '#303030',
                }
              }
            }
          }
        </script>
    </head>
    <body class="bg-white text-oblink-gray">
        <!-- Navigation -->
        <nav class="fixed w-full bg-white/95 backdrop-blur-md shadow-md z-50 transition-all duration-300" id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center">
                        <a href="/" class="flex items-center group">
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-oblink-orange to-oblink-violet flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                                <span class="text-white font-bold text-xl">O</span>
                            </div>
                            <span class="ml-3 text-2xl font-bold text-oblink-orange" style="font-family: 'Montserrat', sans-serif;">OBLINK</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#comment-ca-marche" class="text-oblink-gray hover:text-oblink-orange transition relative nav-link">Comment ça marche</a>
                        <a href="#pour-opticiens" class="text-oblink-gray hover:text-oblink-orange transition relative nav-link">Pour Opticiens</a>
                        <a href="#pour-entreprises" class="text-oblink-gray hover:text-oblink-orange transition relative nav-link">Pour Entreprises</a>
                        <a href="/blog" class="text-oblink-gray hover:text-oblink-orange transition relative nav-link">
                            <i class="fas fa-newspaper mr-1"></i>Blog
                        </a>
                        <a href="/about" class="text-oblink-gray hover:text-oblink-orange transition relative nav-link">À propos</a>
                        <a href="/login" class="px-4 py-2 text-oblink-blue border-2 border-oblink-blue rounded-lg hover:bg-oblink-blue hover:text-white transition-all duration-300 transform hover:scale-105">Connexion</a>
                        <a href="/register" class="px-4 py-2 bg-oblink-orange text-white rounded-lg hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">S'inscrire</a>
                    </div>
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-oblink-gray">
                            <i class="fas fa-bars text-2xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
                <div class="px-4 py-4 space-y-3">
                    <a href="#comment-ca-marche" class="block text-oblink-gray hover:text-oblink-orange">Comment ça marche</a>
                    <a href="#pour-opticiens" class="block text-oblink-gray hover:text-oblink-orange">Pour Opticiens</a>
                    <a href="#pour-entreprises" class="block text-oblink-gray hover:text-oblink-orange">Pour Entreprises</a>
                    <a href="/blog" class="block text-oblink-gray hover:text-oblink-orange"><i class="fas fa-newspaper mr-1"></i>Blog</a>
                    <a href="/about" class="block text-oblink-gray hover:text-oblink-orange">À propos</a>
                    <a href="/login" class="block text-center px-4 py-2 text-oblink-blue border-2 border-oblink-blue rounded-lg">Connexion</a>
                    <a href="/register" class="block text-center px-4 py-2 bg-oblink-orange text-white rounded-lg">S'inscrire</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section with Glassmorphism -->
        <section class="pt-32 pb-20 relative overflow-hidden" id="hero">
            <!-- Background gradient orbs -->
            <div class="hero-bg"></div>
            <div class="hero-gradient-orb orb-1"></div>
            <div class="hero-gradient-orb orb-2"></div>
            <div class="hero-gradient-orb orb-3"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <div class="inline-flex items-center px-4 py-2 bg-white rounded-full shadow-sm mb-6 animate-fade-in-down">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 pulse-animation"></span>
                        <span class="text-sm text-oblink-gray">+500 opticiens actifs • +200 magasins partenaires</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in" style="font-family: 'Montserrat', sans-serif;">
                        <span class="text-oblink-orange">Un opticien</span><br/>
                        <span class="text-oblink-gray">en un clin d'œil</span>
                    </h1>
                    <p class="text-xl text-oblink-gray/80 mb-12 max-w-3xl mx-auto animate-fade-in-up">
                        OBLINK connecte instantanément les opticiens et vendeurs indépendants aux magasins d'optique.
                        Simple, rapide, fiable.
                    </p>
                    
                    <!-- CTA Cards with Glassmorphism and Characters -->
                    <div class="flex flex-col md:flex-row gap-8 justify-center items-stretch max-w-6xl mx-auto">
                        <a href="/opticiens" class="cta-card-glass group w-full md:w-1/2 animate-scale-in" style="animation-delay: 0.2s">
                            <div class="cta-card-content flex-col md:flex-row">
                                <img src="/images/optician.png" alt="Opticien" class="cta-character animate-float">
                                <div class="cta-info">
                                    <span class="cta-badge cta-badge-optician">
                                        <i class="fas fa-glasses mr-2"></i>OPTICIEN
                                    </span>
                                    <h3 class="text-2xl md:text-3xl font-bold text-oblink-gray mb-3">
                                        Je cherche des missions
                                    </h3>
                                    <p class="text-oblink-gray/70 mb-6">
                                        Accédez à des missions qualifiées partout en France. Liberté et accompagnement.
                                    </p>
                                    <div class="flex items-center text-oblink-blue font-semibold">
                                        Créer mon profil
                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <a href="/entreprises" class="cta-card-glass group w-full md:w-1/2 animate-scale-in" style="animation-delay: 0.4s">
                            <div class="cta-card-content flex-col md:flex-row">
                                <img src="/images/company.png" alt="Entreprise" class="cta-character animate-float" style="animation-delay: 1s">
                                <div class="cta-info">
                                    <span class="cta-badge cta-badge-company">
                                        <i class="fas fa-store mr-2"></i>ENTREPRISE
                                    </span>
                                    <h3 class="text-2xl md:text-3xl font-bold text-oblink-gray mb-3">
                                        Je recrute des talents
                                    </h3>
                                    <p class="text-oblink-gray/70 mb-6">
                                        Trouvez rapidement des opticiens qualifiés et pré-validés. Économisez jusqu'à 40%.
                                    </p>
                                    <div class="flex items-center text-oblink-orange font-semibold">
                                        Publier une offre
                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section with Glassmorphism -->
        <section class="py-20 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="stat-card-glass text-center animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="stat-number counter" data-target="8.3">0</div>
                        <div class="text-sm text-oblink-gray/70 font-medium">Marché optique français (Md€)</div>
                    </div>
                    <div class="stat-card-glass text-center animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="stat-number counter" data-target="13300">0</div>
                        <div class="text-sm text-oblink-gray/70 font-medium">Magasins d'optique</div>
                    </div>
                    <div class="stat-card-glass text-center animate-fade-in-up" style="animation-delay: 0.3s">
                        <div class="stat-number counter" data-target="44000">0</div>
                        <div class="text-sm text-oblink-gray/70 font-medium">Opticiens diplômés</div>
                    </div>
                    <div class="stat-card-glass text-center animate-fade-in-up" style="animation-delay: 0.4s">
                        <div class="stat-number">+15%</div>
                        <div class="text-sm text-oblink-gray/70 font-medium">Croissance freelancing</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How it works with 3D Carousel -->
        <section id="comment-ca-marche" class="py-24 pb-40 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-5xl font-bold text-oblink-gray mb-4" style="font-family: 'Montserrat', sans-serif;">
                        Comment ça marche ?
                    </h2>
                    <p class="text-xl text-oblink-gray/70">Simple, rapide, efficace</p>
                </div>
                
                <!-- 3D Carousel Container -->
                <div class="carousel-3d-container">
                    <div class="carousel-3d" id="processCarousel">
                        <!-- Slide 1 -->
                        <div class="carousel-3d-item active" data-index="0">
                            <div class="process-card-glass">
                                <div class="process-number">
                                    <span class="text-oblink-orange">1</span>
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-oblink-gray">Créez votre profil</h3>
                                <p class="text-oblink-gray/80 leading-relaxed">Inscrivez-vous en quelques minutes et complétez votre profil professionnel avec vos diplômes, expériences et disponibilités.</p>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="carousel-3d-item next" data-index="1">
                            <div class="process-card-glass">
                                <div class="process-number">
                                    <span class="text-oblink-blue">2</span>
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-oblink-gray">Validation 4 étapes</h3>
                                <p class="text-oblink-gray/80 leading-relaxed">Votre profil est validé par notre équipe : diplômes, expérience, test de connaissances et entretien vidéo.</p>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="carousel-3d-item prev" data-index="2">
                            <div class="process-card-glass">
                                <div class="process-number">
                                    <span class="text-oblink-violet">3</span>
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-oblink-gray">Connectez & Travaillez</h3>
                                <p class="text-oblink-gray/80 leading-relaxed">Recevez des propositions de missions adaptées ou postulez directement. Gérez tout depuis votre dashboard.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Controls -->
                    <div class="carousel-controls">
                        <button class="carousel-btn" id="carousel-prev" aria-label="Précédent">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-btn" id="carousel-next" aria-label="Suivant">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <div class="carousel-indicator active" data-slide="0"></div>
                        <div class="carousel-indicator" data-slide="1"></div>
                        <div class="carousel-indicator" data-slide="2"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- For Opticians Section -->
        <section id="pour-opticiens" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="feature-content">
                        <span class="inline-block px-4 py-2 bg-oblink-blue/10 text-oblink-blue rounded-full text-sm font-semibold mb-4">
                            POUR LES OPTICIENS
                        </span>
                        <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                            Trouvez des missions en toute <span class="text-oblink-orange">liberté</span>
                        </h2>
                        <p class="text-lg text-oblink-gray/70 mb-8">
                            Que vous soyez en transition vers l'indépendance ou opticien établi, OBLINK vous donne accès à un vivier de missions qualifiées partout en France.
                        </p>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start feature-item">
                                <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold mb-1">Missions adaptées à votre profil</h4>
                                    <p class="text-oblink-gray/70">Filtrez par localisation, spécialité et disponibilités</p>
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
                        
                        <a href="/opticiens" class="inline-block px-8 py-4 bg-oblink-orange text-white rounded-lg hover:bg-oblink-orange/90 transition shadow-lg transform hover:scale-105">
                            Créer mon profil d'opticien <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    
                    <div class="relative animate-scale-in" style="animation-delay: 0.3s">
                        <div class="feature-image-wrapper">
                            <img src="/images/optician.png" alt="Opticien professionnel" class="feature-character">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- For Companies Section -->
        <section id="pour-entreprises" class="py-20 bg-oblink-beige/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="relative order-2 md:order-1 animate-scale-in" style="animation-delay: 0.3s">
                        <div class="feature-image-wrapper">
                            <img src="/images/company.png" alt="Gestionnaire entreprise" class="feature-character" style="animation-delay: 1s">
                        </div>
                    </div>
                    
                    <div class="order-1 md:order-2 feature-content">
                        <span class="inline-block px-4 py-2 bg-oblink-orange/10 text-oblink-orange rounded-full text-sm font-semibold mb-4">
                            POUR LES ENTREPRISES
                        </span>
                        <h2 class="text-4xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
                            Recrutez des talents <span class="text-oblink-orange">validés</span>
                        </h2>
                        <p class="text-lg text-oblink-gray/70 mb-8">
                            Trouvez rapidement des opticiens qualifiés pour vos remplacements urgents, missions ponctuelles ou recrutements permanents.
                        </p>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start feature-item">
                                <i class="fas fa-check-circle text-oblink-orange text-xl mr-4 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold mb-1">Profils pré-validés</h4>
                                    <p class="text-oblink-gray/70">Processus de validation en 4 étapes pour garantir la qualité</p>
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
                        
                        <a href="/entreprises" class="inline-block px-8 py-4 bg-oblink-orange text-white rounded-lg hover:bg-oblink-orange/90 transition shadow-lg transform hover:scale-105">
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
                    <h2 class="text-3xl md:text-4xl font-bold text-oblink-gray mb-2" style="font-family: 'Montserrat', sans-serif;">
                        Écosystème <span class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-oblink-violet">360°</span>
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
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange via-oblink-violet to-oblink-blue">4.9/5</span> sur 180+ avis
                    </h2>
                </div>
                
                <!-- Horizontal scroll on mobile, grid on desktop -->
                <div class="flex md:grid md:grid-cols-2 gap-4 md:gap-6 overflow-x-auto md:overflow-visible snap-x snap-mandatory md:snap-none pb-4 md:pb-0 -mx-4 px-4 md:mx-0">
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
                            "J'ai trouvé mes premières missions en moins d'une semaine. L'accompagnement administratif est vraiment précieux."
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

        <!-- Blog Section -->
        <section class="py-20 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="inline-block px-4 py-2 bg-oblink-orange/10 text-oblink-orange rounded-full text-sm font-semibold mb-4">
                        <i class="fas fa-newspaper mr-2"></i>BLOG OBLINK
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-oblink-gray mb-4" style="font-family: 'Montserrat', sans-serif;">
                        Conseils & <span class="text-oblink-orange">Actualités</span>
                    </h2>
                    <p class="text-xl text-oblink-gray/70 max-w-2xl mx-auto">
                        Guides pratiques, témoignages et actualités pour réussir en tant qu'opticien indépendant
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <!-- Article 1 -->
                    <article class="group">
                        <a href="/blog/1" class="block">
                            <div class="relative overflow-hidden rounded-2xl mb-4 h-56">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800" 
                                    alt="Témoignage opticienne freelance" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-orange text-white rounded-full text-xs font-semibold mb-2">
                                        Témoignage
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>20 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>7 min</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                J'ai quitté mon CDI pour devenir opticienne freelance
                            </h3>
                            <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-3">
                                Sophie, 32 ans, raconte son parcours : de salariée en magasin à opticienne indépendante avec 15 clients réguliers...
                            </p>
                            <span class="inline-flex items-center text-oblink-orange font-semibold text-sm group-hover:underline">
                                Lire l'article <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </a>
                    </article>
                    
                    <!-- Article 2 -->
                    <article class="group">
                        <a href="/blog/2" class="block">
                            <div class="relative overflow-hidden rounded-2xl mb-4 h-56">
                                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800" 
                                    alt="Facturation électronique" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-blue text-white rounded-full text-xs font-semibold mb-2">
                                        Réglementation
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>18 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>10 min</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                Facturation électronique 2025 : Guide complet
                            </h3>
                            <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-3">
                                Tout ce que vous devez savoir sur la réforme : dates clés, plateforme PDT, mentions obligatoires...
                            </p>
                            <span class="inline-flex items-center text-oblink-orange font-semibold text-sm group-hover:underline">
                                Lire l'article <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </a>
                    </article>
                    
                    <!-- Article 3 -->
                    <article class="group">
                        <a href="/blog/3" class="block">
                            <div class="relative overflow-hidden rounded-2xl mb-4 h-56">
                                <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=800" 
                                    alt="Calculer taux horaire" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-oblink-gray/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-block px-3 py-1 bg-oblink-violet text-white rounded-full text-xs font-semibold mb-2">
                                        Gestion
                                    </span>
                                    <div class="flex items-center gap-3 text-white/80 text-xs">
                                        <span><i class="fas fa-calendar mr-1"></i>15 Jan 2025</span>
                                        <span><i class="fas fa-clock mr-1"></i>12 min</span>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-oblink-gray mb-2 group-hover:text-oblink-orange transition line-clamp-2">
                                Calculer votre taux horaire : méthode complète
                            </h3>
                            <p class="text-oblink-gray/70 text-sm line-clamp-3 mb-3">
                                Charges sociales, congés, frais professionnels, marge : calculez précisément votre taux horaire...
                            </p>
                            <span class="inline-flex items-center text-oblink-orange font-semibold text-sm group-hover:underline">
                                Lire l'article <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </a>
                    </article>
                </div>
                
                <!-- CTA vers le blog -->
                <div class="text-center">
                    <a href="/blog" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white rounded-xl font-semibold hover:shadow-xl transition transform hover:scale-105">
                        <i class="fas fa-newspaper mr-2"></i>
                        Découvrir tous les articles
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section class="py-20 bg-oblink-orange text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="tech-pattern"></div>
            </div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                <h2 class="text-4xl font-bold mb-6" style="font-family: 'Montserrat', sans-serif;">
                    Prêt à démarrer ?
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Rejoignez dès maintenant la première communauté d'opticiens et d'entreprises optiques en France
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/register?type=opticien" class="px-8 py-4 bg-white text-oblink-orange rounded-lg hover:bg-gray-100 transition shadow-lg font-semibold transform hover:scale-105">
                        Je suis Opticien
                    </a>
                    <a href="/register?type=entreprise" class="px-8 py-4 bg-oblink-gray text-white rounded-lg hover:bg-oblink-gray/90 transition shadow-lg font-semibold transform hover:scale-105">
                        Je suis Entreprise
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-oblink-gray text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-oblink-orange to-oblink-violet flex items-center justify-center mr-2">
                                <span class="text-white font-bold">O</span>
                            </div>
                            <span class="text-xl font-bold" style="font-family: 'Montserrat', sans-serif;">OBLINK</span>
                        </div>
                        <p class="text-white/70 text-sm">Un opticien en un clin d'œil</p>
                    </div>
                    
                    <div>
                        <h4 class="font-bold mb-4">Pour Opticiens</h4>
                        <ul class="space-y-2 text-sm text-white/70">
                            <li><a href="/opticiens" class="hover:text-white">Trouver des missions</a></li>
                            <li><a href="/opticiens/inscription" class="hover:text-white">S'inscrire</a></li>
                            <li><a href="/opticiens/services" class="hover:text-white">Services annexes</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold mb-4">Pour Entreprises</h4>
                        <ul class="space-y-2 text-sm text-white/70">
                            <li><a href="/entreprises" class="hover:text-white">Recruter des talents</a></li>
                            <li><a href="/entreprises/inscription" class="hover:text-white">S'inscrire</a></li>
                            <li><a href="/entreprises/tarifs" class="hover:text-white">Tarifs</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold mb-4">OBLINK</h4>
                        <ul class="space-y-2 text-sm text-white/70">
                            <li><a href="/about" class="hover:text-white">À propos</a></li>
                            <li><a href="/faq" class="hover:text-white">FAQ</a></li>
                            <li><a href="/contact" class="hover:text-white">Contact</a></li>
                            <li><a href="/legal" class="hover:text-white">Mentions légales</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-white/10 mt-8 pt-8 text-center text-sm text-white/50">
                    <p>© 2025 OBLINK - Tous droits réservés</p>
                </div>
            </div>
        </footer>

        <script src="/static/app.js"></script>
    </body>
    </html>
  `)
})

export default app
