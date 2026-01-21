<?php
/**
 * Main template file - Minimal version
 * This is the default template for all pages/posts
 */

get_header('minimal');

if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <article <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    }
}

get_footer('minimal');
