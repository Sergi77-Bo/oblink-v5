<?php
/**
 * Template Name: 404 Error Page
 */
include 'header-inc.php';
?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <!-- 404 Illustration -->
        <div class="mb-8">
            <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-oblink-blue/10 mb-6">
                <svg class="w-16 h-16 text-oblink-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-6xl md:text-8xl font-bold font-display text-oblink-blue mb-4">404</h1>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Page non trouvée</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
                Utilisez les liens ci-dessous pour continuer votre navigation.
            </p>
        </div>

        <!-- Quick Navigation Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto mb-12">

            <!-- Home -->
            <a href="<?php echo home_url('/'); ?>"
                class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-oblink-blue transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-oblink-blue/10 flex items-center justify-center mb-4 mx-auto group-hover:bg-oblink-blue/20 transition">
                    <i class="fas fa-home text-oblink-blue text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Accueil</h3>
                <p class="text-sm text-gray-500">Retour à l'accueil</p>
            </a>

            <!-- Job Offers -->
            <a href="<?php echo home_url('/emploi-opticien'); ?>"
                class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-oblink-orange transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-oblink-orange/10 flex items-center justify-center mb-4 mx-auto group-hover:bg-oblink-orange/20 transition">
                    <i class="fas fa-briefcase text-oblink-orange text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Offres d'Emploi</h3>
                <p class="text-sm text-gray-500">Voir les missions</p>
            </a>

            <!-- Blog -->
            <a href="<?php echo home_url('/blog'); ?>"
                class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-purple-500 transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-4 mx-auto group-hover:bg-purple-200 transition">
                    <i class="fas fa-newspaper text-purple-600 text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Blog</h3>
                <p class="text-sm text-gray-500">Actualités & conseils</p>
            </a>

            <!-- Contact -->
            <a href="<?php echo home_url('/contact'); ?>"
                class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-green-500 transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-4 mx-auto group-hover:bg-green-200 transition">
                    <i class="fas fa-envelope text-green-600 text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Contact</h3>
                <p class="text-sm text-gray-500">Besoin d'aide ?</p>
            </a>
        </div>

        <!-- Search Bar (Optional) -->
        <div class="max-w-xl mx-auto">
            <div class="bg-white rounded-full shadow-sm border border-gray-200 p-2 flex items-center gap-3">
                <i class="fas fa-search text-gray-400 ml-4"></i>
                <input type="text" id="search-404" placeholder="Rechercher sur OBLINK..."
                    class="flex-1 px-2 py-2 text-gray-900 placeholder-gray-400 focus:outline-none" />
                <button onclick="performSearch()"
                    class="px-6 py-2 bg-oblink-blue text-white font-semibold rounded-full hover:bg-oblink-blue/90 transition">
                    Rechercher
                </button>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-12">
            <button onclick="history.back()"
                class="inline-flex items-center gap-2 text-oblink-blue hover:text-oblink-blue/80 font-semibold transition">
                <i class="fas fa-arrow-left"></i>
                <span>Retour à la page précédente</span>
            </button>
        </div>
    </div>
</div>

<script>
    function performSearch() {
        const searchInput = document.getElementById('search-404');
        const query = searchInput.value.trim();

        if (query) {
            // Redirect to blog search or homepage with query
            window.location.href = '<?php echo home_url('/blog'); ?>?s=' + encodeURIComponent(query);
        }
    }

    // Allow Enter key to search
    document.getElementById('search-404')?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
</script>

<?php include get_template_directory() . "/footer-content.php"; ?>
<?php wp_footer(); ?>
</body>

</html>