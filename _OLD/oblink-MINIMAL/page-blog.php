<?php
/**
 * Template Name: Blog
 */

// Basic security check (though Template implies public access)
if (!defined('ABSPATH')) {
    exit;
}

include 'header-inc.php';
?>

<div class="container mx-auto px-4 py-8 pt-32 min-h-screen">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4 font-display text-oblink-gray">Le Blog <span
                class="text-oblink-orange">OBLINK</span></h1>
        <p class="text-lg text-gray-500">Conseils, guides pratiques et actualités pour les opticiens indépendants et les
            entreprises d'optique</p>
    </div>

    <!-- FILTRES PAR CATÉGORIE -->
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <button class="category-filter active px-6 py-2.5 rounded-full font-bold transition-all duration-300"
            data-category="all">
            Tous
        </button>
        <?php
        $categories = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => true,
        ));

        foreach ($categories as $category):
            if ($category->slug !== 'non-classe'):
                ?>
                <button class="category-filter px-6 py-2.5 rounded-full font-bold transition-all duration-300"
                    data-category="<?php echo esc_attr($category->slug); ?>">
                    <?php echo esc_html($category->name); ?>
                </button>
                <?php
            endif;
        endforeach;
        ?>
    </div>

    <style>
        .category-filter {
            background: white;
            color: #6b7280;
            border: 2px solid #e5e7eb;
        }

        .category-filter:hover {
            border-color: #FF6600;
            color: #FF6600;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 102, 0, 0.2);
        }

        .category-filter.active {
            background: #FF6600;
            color: white;
            border-color: #FF6600;
            box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
        }

        .article-card {
            transition: opacity 0.3s, transform 0.3s;
        }

        .article-card.hidden {
            display: none;
        }
    </style>

    <?php
    // PERFORMANCE OPTIMIZATION: Single optimized query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'paged' => $paged,
        'post_status' => 'publish', // Explicitly only published posts
        'no_found_rows' => false, // We need pagination so true rows needed
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
    );
    $the_query = new WP_Query($args);
    ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="articles-grid">
        <?php
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();

                // Get post categories
                $post_categories = get_the_category();
                $category_slugs = array();
                if ($post_categories) {
                    foreach ($post_categories as $cat) {
                        $category_slugs[] = $cat->slug;
                    }
                }
                $categories_data = implode(' ', $category_slugs);
                ?>
                <article id="post-<?php the_ID(); ?>"
                    class="article-card <?php echo implode(' ', array_map(function ($slug) {
                        return 'cat-' . esc_attr($slug);
                    }, $category_slugs)); ?> bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 flex flex-col h-full"
                    data-categories="<?php echo esc_attr($categories_data); ?>">

                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden relative h-56"
                            aria-label="Lire l'article <?php the_title_attribute(); ?>">
                            <?php
                            // PERFORMANCE: Lazy loading added via attributes
                            the_post_thumbnail('medium_large', [
                                'class' => 'w-full h-full object-cover transform hover:scale-105 transition-transform duration-500',
                                'loading' => 'lazy'
                            ]);
                            ?>
                        </a>
                    <?php else: ?>
                        <a href="<?php the_permalink(); ?>"
                            class="block overflow-hidden relative h-56 bg-gray-100 flex items-center justify-center"
                            aria-label="Lire l'article <?php the_title_attribute(); ?>">
                            <i class="fas fa-image text-gray-300 text-4xl"></i>
                        </a>
                    <?php endif; ?>

                    <div class="p-6 flex-1 flex flex-col">
                        <div class="mb-3 flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-oblink-orange">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name);
                            } else {
                                echo 'Article';
                            }
                            ?>
                        </div>

                        <h2 class="text-xl font-bold mb-3 font-display leading-tight">
                            <a href="<?php the_permalink(); ?>"
                                class="text-oblink-gray hover:text-oblink-blue transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="text-gray-600 mb-4 text-sm flex-1 line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="text-xs text-gray-400">
                                <!-- SEO: Time tag -->
                                <i class="far fa-calendar-alt mr-1"></i> <time
                                    datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                            </div>
                            <a href="<?php the_permalink(); ?>"
                                class="text-sm font-bold text-oblink-blue hover:text-oblink-violet transition-colors flex items-center gap-1"
                                aria-label="Lire la suite de <?php the_title_attribute(); ?>">
                                Lire <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;

            // Pagination with Security Escaping
            echo '<div class="mt-12 col-span-full">';
            echo '<style>
                .pagination { display: flex; justify-content: center; gap: 8px; align-items: center; }
                .pagination a, .pagination span { display: inline-block; padding: 10px 16px; background: white; border: 2px solid #e5e7eb; border-radius: 8px; color: #4b5563; font-weight: 600; text-decoration: none; transition: all 0.3s ease; }
                .pagination a:hover { background: #FF6600; color: white; border-color: #FF6600; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3); }
                .pagination .current { background: #FF6600; color: white; border-color: #FF6600; box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3); }
                .pagination .dots { border: none; background: transparent; color: #9ca3af; }
            </style>';
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total' => $the_query->max_num_pages,
                'current' => $paged,
                'prev_text' => 'Précédent',
                'next_text' => 'Suivant',
                'mid_size' => 2,
                'type' => 'plain',
            ));
            echo '</div>';
            echo '</div>';

            wp_reset_postdata();
        else:
            ?>
            <div class="col-span-full text-center py-20 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                <i class="far fa-newspaper text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-400">Aucun article publié pour le moment.</h3>
                <p class="text-gray-400 mt-2">Revenez bientôt pour découvrir nos actualités.</p>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>

<script>
    // Système de filtrage des articles par catégorie
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.category-filter');
        const articles = document.querySelectorAll('.article-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                const selectedCategory = this.dataset.category;

                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Filter articles
                articles.forEach(article => {
                    if (selectedCategory === 'all') {
                        article.classList.remove('hidden');
                    } else {
                        const articleCategories = article.dataset.categories.split(' ');
                        if (articleCategories.includes(selectedCategory)) {
                            article.classList.remove('hidden');
                        } else {
                            article.classList.add('hidden');
                        }
                    }
                });
            });
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>