<?php
/*
Template Name: Marketplace Formations V2 (Premium)
Description: Modern course marketplace with filters, ratings, wishlist, quick view
*/
header('Content-Type: text/html; charset=utf-8');
include 'header-inc.php';
?>

<style>
    /* Premium Card Hover Effects */
    .course-card {
        transition: all 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-8px);
    }

    /* Quick View Modal */
    .modal-backdrop {
        backdrop-filter: blur(8px);
        background: rgba(0, 0, 0, 0.6);
        display: none;
        /* Default hidden */
    }

    .modal-backdrop.flex {
        display: flex;
    }

    /* Rating Stars */
    .rating-stars {
        color: #FCD34D;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-violet-50/30 to-orange-50/20 pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12">
            <span
                class="inline-block py-1 px-4 rounded-full bg-oblink-violet/10 text-oblink-violet font-bold text-sm mb-4 uppercase">
                <i class="fas fa-graduation-cap mr-2"></i>Académie OBLINK
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-oblink-gray mb-6">
                L'Académie <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-oblink-orange to-oblink-violet">OBLINK</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                <strong class="text-oblink-violet">47 formations</strong> pour booster votre carrière en optique
            </p>
        </div>

        <div class="grid lg:grid-cols-4 gap-8">

            <!-- SIDEBAR FILTERS -->
            <aside class="lg:col-span-1 space-y-6">

                <!-- Search -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <input type="text" id="search-courses" placeholder="Rechercher une formation..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-violet focus:ring-2 focus:ring-oblink-violet/20 transition">
                </div>

                <!-- Filter: Category -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-layer-group text-oblink-violet"></i>Catégorie
                    </h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="category" value="all"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet" checked>
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Toutes</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="category" value="logiciels"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Logiciels
                                ERP</span>
                            <span class="ml-auto text-xs text-gray-400">12</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="category" value="clinique"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Expertise
                                Clinique</span>
                            <span class="ml-auto text-xs text-gray-400">18</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="category" value="vente"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Vente &
                                Management</span>
                            <span class="ml-auto text-xs text-gray-400">10</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="category" value="certif"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet">
                            <span
                                class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Certifications</span>
                            <span class="ml-auto text-xs text-gray-400">7</span>
                        </label>
                    </div>
                </div>

                <!-- Filter: Price -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-euro-sign text-oblink-orange"></i>Prix
                    </h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" value="free"
                                class="filter-price w-5 h-5 rounded border-gray-300 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Gratuit</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" value="0-50"
                                class="filter-price w-5 h-5 rounded border-gray-300 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">Moins de
                                50€</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" value="50-150"
                                class="filter-price w-5 h-5 rounded border-gray-300 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">50€ -
                                150€</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" value="150+"
                                class="filter-price w-5 h-5 rounded border-gray-300 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-700 group-hover:text-oblink-violet transition">150€+</span>
                        </label>
                    </div>
                </div>

                <!-- Filter: Rating -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-star text-yellow-400"></i>Note minimum
                    </h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="rating" value="all"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet" checked>
                            <span class="text-sm text-gray-700">Toutes</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="rating" value="4"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet">
                            <div class="rating-stars text-sm">★★★★☆ et plus</div>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="rating" value="4.5"
                                class="w-5 h-5 text-oblink-violet focus:ring-oblink-violet">
                            <div class="rating-stars text-sm">★★★★★ 4.5+</div>
                        </label>
                    </div>
                </div>

                <!-- Reset -->
                <button id="reset-filters-courses"
                    class="w-full px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition">
                    <i class="fas fa-redo mr-2"></i>Réinitialiser
                </button>

            </aside>

            <!-- MAIN CONTENT -->
            <main class="lg:col-span-3">

                <!-- Toolbar -->
                <div
                    class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-6 flex items-center justify-between">
                    <p class="text-sm text-gray-600"><span id="courses-count"
                            class="font-bold text-oblink-violet">47</span> formations trouvées</p>

                    <select id="sort-courses"
                        class="px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-violet focus:ring-2 focus:ring-oblink-violet/20 transition text-sm">
                        <option value="popular">Les plus populaires</option>
                        <option value="rating">Mieux notées</option>
                        <option value="price-asc">Prix croissant</option>
                        <option value="price-desc">Prix décroissant</option>
                        <option value="newest">Plus récentes</option>
                    </select>
                </div>

                <!-- Courses Grid -->
                <div id="courses-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Courses will be injected here -->
                </div>

            </main>

        </div>

    </div>
</div>

<!-- Quick View Modal -->
<div id="quick-view-modal" class="fixed inset-0 z-50 hidden items-center justify-center modal-backdrop"
    onclick="closeQuickView()">
    <div class="bg-white rounded-3xl max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto"
        onclick="event.stopPropagation()">
        <div id="modal-content" class="p-8">
            <!-- Content injected dynamically -->
        </div>
    </div>
</div>

<script>
    // MOCK DATA
    const MOCK_COURSES = [
        { id: 1, title: "Maîtriser Cosium Optic", instructor: "Team Cosium", category: "logiciels", price: 0, rating: 4.9, students: 1247, duration: "2h30", image: "cosium", bestseller: true, certified: false },
        { id: 2, title: "Réfraction Complexe : Le Cas par Cas", instructor: "Dr. Marc L.", category: "clinique", price: 159, rating: 4.9, students: 523, duration: "8h", image: "refraction", bestseller: true, certified: true },
        { id: 3, title: "Adaptation Lentilles Rigides", instructor: "Sarah B.", category: "clinique", price: 129, rating: 4.8, students: 387, duration: "6h", image: "lentilles", bestseller: false, certified: true },
        { id: 4, title: "Ivoirnet : L'essentiel", instructor: "Team Ivoirnet", category: "logiciels", price: 0, rating: 4.7, students: 892, duration: "1h45", image: "ivoirnet", bestseller: false, certified: false },
        { id: 5, title: "Vente Consultative en Optique", instructor: "Julie M.", category: "vente", price: 89, rating: 4.6, students: 654, duration: "4h", image: "vente", bestseller: false, certified: false },
        { id: 6, title: "Initiation Basse Vision", instructor: "Jean V.", category: "clinique", price: 89, rating: 4.5, students: 234, duration: "5h", image: "basse-vision", bestseller: false, certified: true },
        { id: 7, title: "WinOptics Start", instructor: "Win Academy", category: "logiciels", price: 0, rating: 4.8, students: 743, duration: "1h", image: "winoptics", bestseller: false, certified: false },
        { id: 8, title: "Manager une Équipe Optique", instructor: "Pierre D.", category: "vente", price: 119, rating: 4.7, students: 421, duration: "7h", image: "management", bestseller: false, certified: false },
        { id: 9, title: "Certification Contactologie Avancée", instructor: "Dr. Anne P.", category: "certif", price: 199, rating: 4.9, students: 178, duration: "12h", image: "certif-contact", bestseller: false, certified: true },
    ];

    let allCourses = [...MOCK_COURSES];
    let filteredCourses = [...MOCK_COURSES];

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        renderCourses();
        setupEventListeners();
    });

    function setupEventListeners() {
        // Search
        document.getElementById('search-courses').addEventListener('input', applyFilters);

        // Category filter
        document.querySelectorAll('input[name="category"]').forEach(radio => {
            radio.addEventListener('change', applyFilters);
        });

        // Price filters
        document.querySelectorAll('.filter-price').forEach(cb => {
            cb.addEventListener('change', applyFilters);
        });

        // Rating filter
        document.querySelectorAll('input[name="rating"]').forEach(radio => {
            radio.addEventListener('change', applyFilters);
        });

        // Sort
        document.getElementById('sort-courses').addEventListener('change', () => {
            sortCourses();
            renderCourses();
        });

        // Reset
        document.getElementById('reset-filters-courses').addEventListener('click', resetFilters);
    }

    function applyFilters() {
        const searchTerm = document.getElementById('search-courses').value.toLowerCase();
        const selectedCategory = document.querySelector('input[name="category"]:checked').value;
        const selectedPrices = Array.from(document.querySelectorAll('.filter-price:checked')).map(cb => cb.value);
        const selectedRating = document.querySelector('input[name="rating"]:checked').value;

        filteredCourses = allCourses.filter(course => {
            // Search
            const matchesSearch = !searchTerm || course.title.toLowerCase().includes(searchTerm) || course.instructor.toLowerCase().includes(searchTerm);

            // Category
            const matchesCategory = selectedCategory === 'all' || course.category === selectedCategory;

            // Price
            let matchesPrice = selectedPrices.length === 0;
            if (selectedPrices.includes('free') && course.price === 0) matchesPrice = true;
            if (selectedPrices.includes('0-50') && course.price > 0 && course.price <= 50) matchesPrice = true;
            if (selectedPrices.includes('50-150') && course.price > 50 && course.price <= 150) matchesPrice = true;
            if (selectedPrices.includes('150+') && course.price > 150) matchesPrice = true;

            // Rating
            const matchesRating = selectedRating === 'all' || course.rating >= parseFloat(selectedRating);

            return matchesSearch && matchesCategory && matchesPrice && matchesRating;
        });

        sortCourses();
        renderCourses();
    }

    function sortCourses() {
        const sortValue = document.getElementById('sort-courses').value;

        filteredCourses.sort((a, b) => {
            switch (sortValue) {
                case 'popular':
                    return b.students - a.students;
                case 'rating':
                    return b.rating - a.rating;
                case 'price-asc':
                    return a.price - b.price;
                case 'price-desc':
                    return b.price - a.price;
                case 'newest':
                    return b.id - a.id;
                default:
                    return 0;
            }
        });
    }

    function renderCourses() {
        const container = document.getElementById('courses-container');
        document.getElementById('courses-count').textContent = filteredCourses.length;

        if (filteredCourses.length === 0) {
            container.innerHTML = '<div class="col-span-3 text-center py-12"><p class="text-gray-500 text-lg">Aucune formation trouvée</p></div>';
            return;
        }

        container.innerHTML = filteredCourses.map(course => `
        <div class="course-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden cursor-pointer group">
            <!-- Thumbnail -->
            <div class="relative h-48 bg-gradient-to-br ${getGradient(course.image)} flex items-center justify-center overflow-hidden">
                <i class="fas ${getIcon(course.category)} text-6xl text-white/20 group-hover:scale-110 transition"></i>
                ${course.bestseller ? '<span class="absolute top-3 left-3 bg-oblink-orange text-white text-xs font-bold px-3 py-1 rounded-full">🔥 BEST SELLER</span>' : ''}
                ${course.certified ? '<span class="absolute top-3 right-3 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full"><i class="fas fa-certificate mr-1"></i>CERTIFIÉ</span>' : ''}
                <button onclick="addToWishlist(${course.id}); event.stopPropagation();" class="absolute bottom-3 right-3 w-10 h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center hover:bg-oblink-orange hover:text-white transition shadow-lg">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
            
            <!-- Content -->
            <div class="p-5" onclick="showQuickView(${course.id})">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-1 text-yellow-400 text-sm">
                        ${'\u2605'.repeat(Math.floor(course.rating))}${'\u2606'.repeat(5 - Math.floor(course.rating))}
                        <span class="text-gray-600 ml-1 font-semibold">${course.rating}</span>
                    </div>
                    <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i>${course.students}</span>
                </div>
                
                <h3 class="font-bold text-lg text-oblink-gray mb-2 group-hover:text-oblink-violet transition line-clamp-2">${course.title}</h3>
                
                <div class="flex items-center gap-2 mb-4 text-xs text-gray-500">
                    <img src="https://randomuser.me/api/portraits/men/${course.id}.jpg" class="w-6 h-6 rounded-full">
                    <span>${course.instructor}</span>
                    <span>·</span>
                    <span><i class="fas fa-clock mr-1"></i>${course.duration}</span>
                </div>
                
                <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                    <span class="font-black text-2xl text-oblink-gray">${course.price === 0 ? '<span class="text-green-600">GRATUIT</span>' : course.price + '€'}</span>
                    <button onclick="buyCourse(${course.id}); event.stopPropagation();" class="px-4 py-2 bg-oblink-violet hover:bg-oblink-violet/90 text-white font-semibold rounded-lg transition">
                        ${course.price === 0 ? 'Voir' : 'Acheter'}
                    </button>
                </div>
            </div>
        </div>
    `).join('');
    }

    function getGradient(image) {
        const gradients = {
            cosium: 'from-gray-900 to-gray-700',
            refraction: 'from-indigo-900 to-indigo-700',
            lentilles: 'from-teal-800 to-teal-600',
            ivoirnet: 'from-emerald-800 to-emerald-600',
            vente: 'from-orange-700 to-orange-500',
            'basse-vision': 'from-gray-800 to-gray-600',
            winoptics: 'from-orange-700 to-orange-500',
            management: 'from-blue-800 to-blue-600',
            'certif-contact': 'from-violet-800 to-violet-600',
        };
        return gradients[image] || 'from-gray-700 to-gray-500';
    }

    function getIcon(category) {
        const icons = {
            logiciels: 'fa-laptop-code',
            clinique: 'fa-microscope',
            vente: 'fa-chart-line',
            certif: 'fa-certificate',
        };
        return icons[category] || 'fa-book';
    }

    function showQuickView(courseId) {
        const course = allCourses.find(c => c.id === courseId);
        const modal = document.getElementById('quick-view-modal');
        const content = document.getElementById('modal-content');

        content.innerHTML = `
        <button onclick="closeQuickView()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 text-2xl">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <div class="h-64 rounded-2xl bg-gradient-to-br ${getGradient(course.image)} flex items-center justify-center mb-6">
                    <i class="fas ${getIcon(course.category)} text-8xl text-white/30"></i>
                </div>
                ${course.bestseller ? '<span class="inline-block bg-oblink-orange text-white text-xs font-bold px-3 py-1 rounded-full mb-3">🔥 BEST SELLER</span>' : ''}
            </div>
            
            <div>
                <h2 class="text-3xl font-black text-oblink-gray mb-4">${course.title}</h2>
                
                <div class="flex items-center gap-2 mb-4">
                    <div class="flex items-center gap-1 text-yellow-400 text-lg">
                        ${'\u2605'.repeat(Math.floor(course.rating))}${'\u2606'.repeat(5 - Math.floor(course.rating))}
                        <span class="text-gray-600 ml-2 font-bold">${course.rating}</span>
                    </div>
                    <span class="text-gray-500">·</span>
                    <span class="text-sm text-gray-600"><i class="fas fa-users mr-1"></i>${course.students} étudiants</span>
                </div>
                
                <div class="flex items-center gap-3 mb-6">
                    <img src="https://randomuser.me/api/portraits/men/${course.id}.jpg" class="w-12 h-12 rounded-full border-2 border-oblink-violet">
                    <div>
                        <p class="font-bold text-gray-900">${course.instructor}</p>
                        <p class="text-sm text-gray-500">Expert certifié</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-4 mb-6">
                    <h4 class="font-bold text-gray-900 mb-3">Ce que vous allez apprendre</h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Maîtriser toutes les fonctionnalités</li>
                        <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Gagner du temps au quotidien</li>
                        <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Devenir autonome rapidement</li>
                    </ul>
                </div>
                
                <div class="flex items-center gap-4 mb-6">
                    <span class="text-4xl font-black text-oblink-gray">${course.price === 0 ? '<span class="text-green-600">GRATUIT</span>' : course.price + '€'}</span>
                    <span class="text-sm text-gray-500"><i class="fas fa-clock mr-1"></i>${course.duration}</span>
                </div>
                
                <button onclick="buyCourse(${course.id})" class="w-full px-8 py-4 bg-oblink-violet hover:bg-oblink-violet/90 text-white font-bold rounded-xl transition shadow-lg">
                    ${course.price === 0 ? 'Commencer maintenant' : 'Acheter la formation'}
                </button>
            </div>
        </div>
    `;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeQuickView() {
        document.getElementById('quick-view-modal').classList.add('hidden');
        document.getElementById('quick-view-modal').classList.remove('flex');
    }

    function addToWishlist(courseId) {
        // Simple LocalStorage Wishlist logic
        let wishlist = JSON.parse(localStorage.getItem('oblink_wishlist') || '[]');
        
        if (wishlist.includes(courseId)) {
            wishlist = wishlist.filter(id => id !== courseId);
            if (typeof showToast === 'function') {
                showToast('Retiré des favoris', 'info');
            } else {
                alert('Retiré des favoris');
            }
        } else {
            wishlist.push(courseId);
            if (typeof showToast === 'function') {
                showToast('Ajouté aux favoris ! 💜', 'success');
            } else {
                alert('Ajouté aux favoris ! 💜');
            }
        }
        
        localStorage.setItem('oblink_wishlist', JSON.stringify(wishlist));
        
        // Refresh grid to update heart icons if we implemented that check in render
        renderCourses(); 
    }

    function buyCourse(courseId) {
        const course = allCourses.find(c => c.id === courseId);
        if (!course) return;

        if (course.price === 0) {
            // Free course access
            if (typeof showToast === 'function') {
                showToast('Accès au cours gratuit...', 'success');
            }
            // Redirect to course content (mock URL)
            setTimeout(() => {
                window.location.href = `<?php echo home_url('/cours/'); ?>` + course.id;
            }, 1000);
        } else {
            // Paid course flow
            if (typeof showToast === 'function') {
                showToast('Redirection vers le paiement...', 'info');
            }
            // Redirect to payment/checkout
            setTimeout(() => {
                window.location.href = `<?php echo home_url('/paiement?course_id='); ?>` + courseId;
            }, 1000);
        }
    }

    function resetFilters() {
        document.getElementById('search-courses').value = '';
        document.querySelector('input[name="category"][value="all"]').checked = true;
        document.querySelectorAll('.filter-price').forEach(cb => cb.checked = false);
        document.querySelector('input[name="rating"][value="all"]').checked = true;
        applyFilters();
    }

    // Modal Keyboard Accessibility
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape") {
            const modal = document.getElementById('quick-view-modal');
            if (!modal.classList.contains('hidden')) {
                closeQuickView();
            }
        }
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>