<?php include 'header-inc.php'; ?>

<style>
    /* === ARTICLE STYLING === */
    .article-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #1f2937;
    }

    /* Headers */
    .article-content h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #FF6600;
        margin-top: 3rem;
        margin-bottom: 1.5rem;
        border-bottom: 3px solid #FF6600;
        padding-bottom: 0.5rem;
        scroll-margin-top: 120px;
        /* For anchor links */
    }

    .article-content h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #303030;
        margin-top: 2rem;
        margin-bottom: 1rem;
        scroll-margin-top: 120px;
    }

    /* Paragraphs */
    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content strong {
        color: #FF6600;
        font-weight: 700;
    }

    /* Lists */
    .article-content ul,
    .article-content ol {
        margin: 1.5rem 0;
        padding-left: 2rem;
    }

    .article-content li {
        margin-bottom: 0.75rem;
        line-height: 1.8;
    }

    .article-content ul li::marker {
        color: #FF6600;
    }

    .article-content ol li::marker {
        color: #FF6600;
        font-weight: 700;
    }

    /* Tables */
    .article-content table {
        width: 100%;
        margin: 2rem 0;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    .article-content table th {
        background: linear-gradient(135deg, #FF6600 0%, #ff8833 100%);
        color: white;
        padding: 1rem;
        text-align: left;
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .article-content table td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        font-size: 1rem;
    }

    .article-content table tr:last-child td {
        border-bottom: none;
    }

    .article-content table tr:nth-child(even) {
        background-color: #f9fafb;
    }

    .article-content table tr:hover {
        background-color: #fff7ed;
        transition: background-color 0.2s;
    }

    /* Blockquotes */
    .article-content blockquote {
        background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
        border-left: 5px solid #FF6600;
        padding: 1.5rem 2rem;
        margin: 2rem 0;
        border-radius: 8px;
        font-style: italic;
        font-size: 1.1rem;
        color: #78350f;
        box-shadow: 0 2px 4px rgba(255, 102, 0, 0.1);
    }

    /* Code blocks */
    .article-content pre {
        background: #1e293b;
        color: #e2e8f0;
        padding: 1.5rem;
        border-radius: 12px;
        overflow-x: auto;
        margin: 2rem 0;
        font-family: 'Courier New', monospace;
        font-size: 0.95rem;
        line-height: 1.6;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .article-content code {
        background: #f3f4f6;
        color: #FF6600;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
    }

    .article-content pre code {
        background: none;
        color: inherit;
        padding: 0;
    }

    /* Colored info boxes */
    .article-content div[style*="background"] {
        border-radius: 12px;
        padding: 1.5rem 2rem !important;
        margin: 2rem 0 !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    /* Links */
    .article-content a {
        color: #0099FF;
        font-weight: 600;
        text-decoration: none;
        border-bottom: 2px solid transparent;
        transition: all 0.3s;
    }

    .article-content a:hover {
        color: #9A48D0;
        border-bottom-color: #9A48D0;
    }

    /* Horizontal rules */
    .article-content hr {
        border: none;
        height: 2px;
        background: linear-gradient(90deg, transparent, #FF6600, transparent);
        margin: 3rem 0;
    }

    /* Superscript references */
    .article-content sup {
        font-size: 0.75em;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
        top: -0.5em;
    }

    .article-content sup a {
        color: #0099FF;
        font-weight: 600;
        text-decoration: none;
        padding: 0 2px;
    }

    .article-content sup a:hover {
        color: #9A48D0;
        text-decoration: underline;
    }

    /* Sources section styling */
    .article-content h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #303030;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .article-content ol {
        background: #f8fafc;
        padding: 1.5rem 2rem 1.5rem 3rem;
        border-radius: 8px;
        border-left: 3px solid #0099FF;
        margin: 1.5rem 0;
    }

    .article-content ol li a {
        color: #0099FF;
        word-break: break-word;
    }

    /* Table of Contents */
    .toc {
        background: #f8fafc;
        border-left: 4px solid #0099FF;
        padding: 1.5rem 2rem;
        margin: 2rem 0;
        border-radius: 8px;
    }

    .toc h3 {
        margin-top: 0 !important;
        color: #0099FF !important;
        border-bottom: none !important;
        font-size: 1.25rem !important;
    }

    .toc ul {
        margin: 1rem 0 0 0;
        padding-left: 1.5rem;
    }

    .toc li {
        margin-bottom: 0.5rem;
    }

    .toc a {
        color: #475569;
        font-weight: 500;
    }

    .toc a:hover {
        color: #0099FF;
    }

    /* Share buttons */
    .share-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .share-linkedin {
        background: #0077b5;
        color: white;
    }

    .share-twitter {
        background: #1DA1F2;
        color: white;
    }

    .share-facebook {
        background: #1877f2;
        color: white;
    }

    .share-email {
        background: #64748b;
        color: white;
    }

    /* Sidebar */
    .sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .meta-item:last-child {
        border-bottom: none;
    }

    .meta-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF6600, #ff8833);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
</style>

<div class="pt-32 pb-20 px-4 min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-violet-50">
    <div class="max-w-7xl mx-auto">
        <?php
        while (have_posts()):
            the_post();

            // Calculate reading time
            $content = get_the_content();
            $word_count = str_word_count(strip_tags($content));
            $reading_time = ceil($word_count / 200); // 200 words per minute
        
            // Get excerpt for meta description
            $excerpt = get_the_excerpt();

            // Get current URL for sharing
            $current_url = urlencode(get_permalink());
            $title = urlencode(get_the_title());
            ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- MAIN CONTENT -->
                <div class="lg:col-span-2">
                    <!-- Article Header -->
                    <div class="mb-8">
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

                        <?php if ($excerpt): ?>
                            <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                                <?php echo esc_html($excerpt); ?>
                            </p>
                        <?php endif; ?>

                        <div class="flex items-center gap-4 text-gray-500 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar"></i>
                                <?php echo get_the_date('d/m/Y'); ?>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-clock"></i>
                                <?php echo $reading_time; ?> min de lecture
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()): ?>
                        <div class="rounded-2xl overflow-hidden shadow-xl mb-8">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Content -->
                    <div class="glass-card p-8 md:p-12">
                        <div class="article-content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Tags -->
                        <?php if (get_the_tags()): ?>
                            <div class="mt-8 pt-8 border-t border-gray-200">
                                <div class="flex flex-wrap gap-2">
                                    <?php
                                    $tags = get_the_tags();
                                    foreach ($tags as $tag) {
                                        echo '<span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">#' . esc_html($tag->name) . '</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Share Section -->
                    <div class="glass-card p-6 mt-8">
                        <h3 class="text-lg font-bold text-oblink-gray mb-4">📢 Partager cet article</h3>
                        <div class="share-buttons">
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $current_url; ?>"
                                target="_blank" class="share-btn share-linkedin">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>&text=<?php echo $title; ?>"
                                target="_blank" class="share-btn share-twitter">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>"
                                target="_blank" class="share-btn share-facebook">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $current_url; ?>"
                                class="share-btn share-email">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                        <div>
                            <?php previous_post_link('%link', '<div class="glass-card p-4 hover:scale-105 transition transform h-full"><span class="block text-xs text-gray-500 mb-2">← Article précédent</span><span class="font-bold text-oblink-gray line-clamp-2">%title</span></div>'); ?>
                        </div>
                        <div>
                            <?php next_post_link('%link', '<div class="glass-card p-4 hover:scale-105 transition transform h-full text-right"><span class="block text-xs text-gray-500 mb-2">Article suivant →</span><span class="font-bold text-oblink-gray line-clamp-2">%title</span></div>'); ?>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="lg:col-span-1">
                    <div class="sidebar">
                        <!-- Meta Info -->
                        <div class="sidebar-card">
                            <h3 class="font-bold text-oblink-gray mb-4 text-lg">📋 Informations</h3>

                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Publié le</div>
                                    <div class="font-semibold text-gray-700"><?php echo get_the_date('d/m/Y'); ?></div>
                                </div>
                            </div>

                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Temps de lecture</div>
                                    <div class="font-semibold text-gray-700"><?php echo $reading_time; ?> minutes</div>
                                </div>
                            </div>

                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-folder"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Catégorie</div>
                                    <div class="font-semibold text-gray-700">
                                        <?php echo !empty($categories) ? esc_html($categories[0]->name) : 'Article'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Card -->
                        <div class="sidebar-card" style="background: linear-gradient(135deg, #FF6600 0%, #ff8833 100%);">
                            <h3 class="font-bold text-white mb-3 text-lg">🚀 Lancez-vous !</h3>
                            <p class="text-white/90 text-sm mb-4">
                                Créez votre profil gratuitement et accédez à des centaines de missions.
                            </p>
                            <a href="<?php echo home_url('/inscription-opticien'); ?>"
                                class="block w-full text-center px-4 py-3 bg-white text-oblink-orange font-bold rounded-lg hover:bg-gray-50 transition">
                                Créer mon compte
                            </a>
                        </div>

                        <!-- Related Links -->
                        <div class="sidebar-card">
                            <h3 class="font-bold text-oblink-gray mb-4 text-lg">🔗 Ressources utiles</h3>
                            <ul class="space-y-3">
                                <li>
                                    <a href="<?php echo home_url('/simulateur'); ?>"
                                        class="text-oblink-blue hover:text-oblink-violet flex items-center gap-2">
                                        <i class="fas fa-calculator"></i> Simulateur de revenus
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('/formation-erp'); ?>"
                                        class="text-oblink-blue hover:text-oblink-violet flex items-center gap-2">
                                        <i class="fas fa-graduation-cap"></i> Formations gratuites
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('/emploi-opticien'); ?>"
                                        class="text-oblink-blue hover:text-oblink-violet flex items-center gap-2">
                                        <i class="fas fa-briefcase"></i> Voir les missions
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('/blog'); ?>"
                                        class="text-oblink-blue hover:text-oblink-violet flex items-center gap-2">
                                        <i class="fas fa-newspaper"></i> Tous les articles
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        endwhile;
        ?>
    </div>
</div>

<script>
    // Auto-generate table of contents from H2 headings
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.querySelector('.article-content');
        const headings = content.querySelectorAll('h2');

        if (headings.length >= 3) {
            const toc = document.createElement('div');
            toc.className = 'toc';
            toc.innerHTML = '<h3>📑 Sommaire</h3><ul></ul>';

            const tocList = toc.querySelector('ul');

            headings.forEach((heading, index) => {
                const id = 'section-' + index;
                heading.id = id;

                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#' + id;
                a.textContent = heading.textContent;
                li.appendChild(a);
                tocList.appendChild(li);
            });

            // Insert TOC after first paragraph
            const firstP = content.querySelector('p');
            if (firstP) {
                firstP.after(toc);
            }
        }
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>