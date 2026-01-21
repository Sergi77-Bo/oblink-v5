<?php get_header(); ?>

<div class="pt-32 pb-20 px-4 min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-violet-50">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card p-8 md:p-12">
            <?php
            while (have_posts()):
                the_post();
                ?>
                <h1 class="text-3xl md:text-4xl font-bold text-oblink-gray mb-8"
                    style="font-family: 'Montserrat', sans-serif;">
                    <?php the_title(); ?>
                </h1>

                <div class="prose prose-lg max-w-none text-oblink-gray/80">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>