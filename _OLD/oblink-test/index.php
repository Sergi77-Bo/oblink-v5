<?php
/**
 * OBLINK Test Theme - Index
 */
get_header(); ?>

<div class="container">
    <h1>🎉 THÈME OBLINK FONCTIONNE !</h1>
    <p>Si vous voyez ce message, le thème est bien activé sur Hostinger.</p>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
