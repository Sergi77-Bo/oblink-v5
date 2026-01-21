<?php
// Footer
?>
        </main>
    </div>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">OBLINK</h3>
                    <p class="text-gray-400">Plateforme de formation et d'emploi pour l'optique.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Liens</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="<?php echo home_url('/'); ?>" class="hover:text-white">Accueil</a></li>
                        <li><a href="<?php echo home_url('/formations'); ?>" class="hover:text-white">Formations</a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>" class="hover:text-white">Blog</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Legal</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="<?php echo home_url('/mentions-legales'); ?>" class="hover:text-white">Mentions Légales</a></li>
                        <li><a href="<?php echo home_url('/privacy'); ?>" class="hover:text-white">Confidentialité</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; OBLINK <?php echo date('Y'); ?>. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>
