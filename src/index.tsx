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
                    <a href="/about" class="block text-oblink-gray hover:text-oblink-orange">À propos</a>
                    <a href="/login" class="block text-center px-4 py-2 text-oblink-blue border-2 border-oblink-blue rounded-lg">Connexion</a>
                    <a href="/register" class="block text-center px-4 py-2 bg-oblink-orange text-white rounded-lg">S'inscrire</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section with Parallax -->
        <section class="pt-32 pb-20 bg-gradient-to-br from-oblink-orange/5 to-oblink-violet/5 relative overflow-hidden" id="hero">
            <!-- Animated background elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="floating-shape shape-1"></div>
                <div class="floating-shape shape-2"></div>
                <div class="floating-shape shape-3"></div>
                <div class="floating-shape shape-4"></div>
            </div>
            
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
                    
                    <!-- Double CTA with animated cards -->
                    <div class="flex flex-col md:flex-row gap-6 justify-center items-center max-w-4xl mx-auto">
                        <a href="/opticiens" class="cta-card cta-card-optician group w-full md:w-auto">
                            <div class="cta-card-front">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-glasses mr-4 text-3xl text-oblink-blue"></i>
                                        <div class="text-left">
                                            <div class="font-semibold text-lg">Je suis Opticien</div>
                                            <div class="text-sm opacity-75">Trouver des missions</div>
                                        </div>
                                    </div>
                                    <i class="fas fa-arrow-right ml-4 group-hover:translate-x-2 transition-transform"></i>
                                </div>
                            </div>
                            <div class="cta-card-back">
                                <div class="character-illustration optician-illustration"></div>
                            </div>
                        </a>
                        
                        <a href="/entreprises" class="cta-card cta-card-company group w-full md:w-auto">
                            <div class="cta-card-front">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-store mr-4 text-3xl text-white"></i>
                                        <div class="text-left">
                                            <div class="font-semibold text-lg">Je suis Entreprise</div>
                                            <div class="text-sm opacity-90">Recruter des talents</div>
                                        </div>
                                    </div>
                                    <i class="fas fa-arrow-right ml-4 group-hover:translate-x-2 transition-transform"></i>
                                </div>
                            </div>
                            <div class="cta-card-back">
                                <div class="character-illustration company-illustration"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section with Animation -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center stat-card">
                        <div class="text-4xl font-bold text-oblink-orange mb-2 counter" data-target="8.3">0</div>
                        <div class="text-sm text-oblink-gray/70">Marché optique français (Md€)</div>
                    </div>
                    <div class="text-center stat-card">
                        <div class="text-4xl font-bold text-oblink-blue mb-2 counter" data-target="13300">0</div>
                        <div class="text-sm text-oblink-gray/70">Magasins d'optique</div>
                    </div>
                    <div class="text-center stat-card">
                        <div class="text-4xl font-bold text-oblink-violet mb-2 counter" data-target="44000">0</div>
                        <div class="text-sm text-oblink-gray/70">Opticiens diplômés</div>
                    </div>
                    <div class="text-center stat-card">
                        <div class="text-4xl font-bold text-oblink-pink mb-2">+15%</div>
                        <div class="text-sm text-oblink-gray/70">Croissance freelancing</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How it works -->
        <section id="comment-ca-marche" class="py-20 bg-oblink-beige/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-oblink-gray mb-4" style="font-family: 'Montserrat', sans-serif;">
                        Comment ça marche ?
                    </h2>
                    <p class="text-lg text-oblink-gray/70">Simple, rapide, efficace</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="process-card bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                        <div class="step-number mb-6">
                            <span class="text-3xl font-bold text-oblink-orange">1</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-oblink-gray">Créez votre profil</h3>
                        <p class="text-oblink-gray/70">Inscrivez-vous en quelques minutes et complétez votre profil professionnel avec vos diplômes, expériences et disponibilités.</p>
                    </div>
                    
                    <div class="process-card bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2" style="animation-delay: 0.1s;">
                        <div class="step-number mb-6">
                            <span class="text-3xl font-bold text-oblink-blue">2</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-oblink-gray">Validation 4 étapes</h3>
                        <p class="text-oblink-gray/70">Votre profil est validé par notre équipe : diplômes, expérience, test de connaissances et entretien vidéo.</p>
                    </div>
                    
                    <div class="process-card bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2" style="animation-delay: 0.2s;">
                        <div class="step-number mb-6">
                            <span class="text-3xl font-bold text-oblink-violet">3</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-oblink-gray">Connectez & Travaillez</h3>
                        <p class="text-oblink-gray/70">Recevez des propositions de missions adaptées ou postulez directement. Gérez tout depuis votre dashboard.</p>
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
                    
                    <div class="relative">
                        <div class="image-card">
                            <div class="image-placeholder optician-feature">
                                <div class="tech-grid"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- For Companies Section -->
        <section id="pour-entreprises" class="py-20 bg-oblink-beige/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="relative order-2 md:order-1">
                        <div class="image-card">
                            <div class="image-placeholder company-feature">
                                <div class="tech-grid"></div>
                            </div>
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

        <!-- Services Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-oblink-gray mb-4" style="font-family: 'Montserrat', sans-serif;">
                        Un écosystème <span class="text-oblink-orange">complet</span>
                    </h2>
                    <p class="text-lg text-oblink-gray/70">Bien plus qu'une simple mise en relation</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-shield-alt"></i></div>
                        <h3 class="text-xl font-bold mb-3">Assurance RC Pro</h3>
                        <p class="text-oblink-gray/70">Protection adaptée aux missions en optique</p>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-briefcase"></i></div>
                        <h3 class="text-xl font-bold mb-3">Portage salarial</h3>
                        <p class="text-oblink-gray/70">Travaillez sans auto-entreprise</p>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-graduation-cap"></i></div>
                        <h3 class="text-xl font-bold mb-3">Formations continues</h3>
                        <p class="text-oblink-gray/70">Webinaires et modules de formation</p>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-gavel"></i></div>
                        <h3 class="text-xl font-bold mb-3">Assistance juridique</h3>
                        <p class="text-oblink-gray/70">Support pour contrats et questions fiscales</p>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-file-invoice"></i></div>
                        <h3 class="text-xl font-bold mb-3">Facturation simplifiée</h3>
                        <p class="text-oblink-gray/70">Outils de gestion administrative</p>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-users"></i></div>
                        <h3 class="text-xl font-bold mb-3">Communauté active</h3>
                        <p class="text-oblink-gray/70">Forum d'échange entre professionnels</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-gradient-to-br from-oblink-orange/5 to-oblink-violet/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-oblink-gray mb-4" style="font-family: 'Montserrat', sans-serif;">
                        Ils nous font confiance
                    </h2>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="testimonial-card">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-oblink-blue/10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-user text-2xl text-oblink-blue"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Sarah D.</h4>
                                <p class="text-sm text-oblink-gray/70">Opticienne freelance</p>
                            </div>
                        </div>
                        <p class="text-oblink-gray/70 italic">"OBLINK m'a permis de franchir le pas vers l'indépendance en toute sérénité. J'ai trouvé mes premières missions en moins d'une semaine et l'accompagnement administratif est vraiment précieux."</p>
                        <div class="flex text-yellow-400 mt-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-oblink-orange/10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-store text-2xl text-oblink-orange"></i>
                            </div>
                            <div>
                                <h4 class="font-bold">Pierre M.</h4>
                                <p class="text-sm text-oblink-gray/70">Gérant magasin optique</p>
                            </div>
                        </div>
                        <p class="text-oblink-gray/70 italic">"Plus besoin de payer des fortunes en intérim ! OBLINK me permet de trouver des remplaçants qualifiés en 48h maximum. Les profils sont validés et la plateforme est très simple à utiliser."</p>
                        <div class="flex text-yellow-400 mt-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
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
