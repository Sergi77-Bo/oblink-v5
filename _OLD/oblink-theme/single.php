<?php include 'header-inc.php'; ?>

<div class="pt-32 pb-20 px-4 min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-violet-50">
    <div class="max-w-4xl mx-auto">
        <?php
        while (have_posts()):
            the_post();
            ?>

            <!-- Article Header -->
            <div class="mb-8 text-center">
                <div
                    class="inline-flex items-center px-4 py-2 bg-white/60 backdrop-blur-xl border border-white/40 rounded-full mb-6 shadow-sm">
                    <span class="text-sm font-semibold text-oblink-orange uppercase tracking-wider">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo esc_html($categories[0]->name);
                        } else {
                            echo 'Article';
                        }
                        ?>
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-oblink-gray mb-6 leading-tight"
                    style="font-family: 'Montserrat', sans-serif;">
                    <?php the_title(); ?>
                </h1>

                <div class="flex items-center justify-center space-x-4 text-oblink-gray/70 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2"></i>
                        <?php echo get_the_date(); ?>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()): ?>
                <div class="rounded-2xl overflow-hidden shadow-xl mb-12">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover')); ?>
                </div>
            <?php endif; ?>

            <!-- Content -->
            <div class="glass-card p-8 md:p-12">
                <div
                    class="prose prose-lg max-w-none text-oblink-gray/80 prose-headings:text-oblink-gray prose-a:text-oblink-orange hover:prose-a:text-oblink-violet prose-img:rounded-lg prose-video:rounded-lg">
                    <?php the_content(); ?>
                </div>

                <!-- Share/Tags Footer -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap gap-2">
                        <?php
                        $tags = get_the_tags();
                        if ($tags) {
                            foreach ($tags as $tag) {
                                echo '<span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">#' . esc_html($tag->name) . '</span>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex justify-between mt-12">
                <div class="w-1/2 pr-4">
                    <?php previous_post_link('%link', '<div class="glass-card p-4 hover:scale-105 transition transform text-left"><span class="block text-xs text-gray-500 mb-1">Article précédent</span><span class="font-bold text-oblink-gray">%title</span></div>'); ?>
                </div>
                <div class="w-1/2 pl-4 text-right">
                    <?php next_post_link('%link', '<div class="glass-card p-4 hover:scale-105 transition transform text-right"><span class="block text-xs text-gray-500 mb-1">Article suivant</span><span class="font-bold text-oblink-gray">%title</span></div>'); ?>
                </div>
            </div>

            <?php
        endwhile;
        ?>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>