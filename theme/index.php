<?php
/**
 * Main template file
 */

get_header('minimal');

?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="md:col-span-2">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <article class="mb-8 pb-8 border-b border-gray-200">
                    <h2 class="text-3xl font-bold mb-2">
                        <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-orange-500">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="text-sm text-gray-500 mb-4">
                        Par <?php the_author(); ?> le <?php echo get_the_date('j F Y'); ?>
                    </div>
                    <div class="text-gray-700">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="text-orange-500 hover:text-orange-600 font-semibold mt-4 inline-block">
                        Lire plus →
                    </a>
                </article>
                <?php
            }
        } else {
            ?>
            <p class="text-gray-500">Aucun contenu trouvé.</p>
            <?php
        }
        ?>
    </div>
    
    <aside class="md:col-span-1">
        <div class="bg-orange-50 rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4 text-gray-900">À propos</h3>
            <p class="text-gray-700"><?php bloginfo('description'); ?></p>
        </div>
    </aside>
</div>

<?php

get_footer('minimal');
