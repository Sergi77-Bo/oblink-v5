</main><!-- Close Main -->

<!-- FOOTER -->
<!-- Added inline styles to force visibility even if Tailwind fails -->
<footer id="main-footer" class="bg-gray-900 text-white pt-12 pb-6 relative z-10"
        style="background-color: #1F2937 !important; color: #FFFFFF !important; border-top: 4px solid #FF6600; position: relative; width: 100%; display: block !important;">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

                        <!-- Brand & Mission -->
                        <div class="space-y-4">
                                <a href="<?php echo home_url('/'); ?>"
                                        class="inline-block text-2xl font-black tracking-tight"
                                        style="font-family: 'Overpass', sans-serif; text-decoration: none;">
                                        <span style="color:#FFF">OB</span><span style="color:#FF6600">LINK</span><span
                                                style="color:#0099FF">.</span>
                                </a>
                                <p class="text-sm leading-relaxed" style="color: #9CA3AF; max-width: 280px;">
                                        La première plateforme de mise en relation directe entre Opticiens Freelances et
                                        Magasins d'Optique.
                                </p>
                        </div>

                        <!-- Navigation Freelances -->
                        <div>
                                <h3 class="text-base font-bold mb-4" style="color:#FFF;">Pour les Opticiens</h3>
                                <ul class="space-y-2 text-sm" style="color: #9CA3AF;">
                                        <li><a href="<?php echo home_url('/inscription-opticien'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">Inscription Freelance</a></li>
                                        <li><a href="<?php echo home_url('/emploi-opticien'); ?>"
                                                        class="hover:text-white transition" style="color:inherit">Offres
                                                        d'emploi</a></li>
                                        <li><a href="<?php echo home_url('/simulateur'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">Simulateur de Revenus</a></li>
                                        <li><a href="<?php echo home_url('/formation-erp'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">Académie Oblink</a></li>
                                </ul>
                        </div>

                        <!-- Navigation Entreprises -->
                        <div>
                                <h3 class="text-base font-bold mb-4" style="color:#FFF;">Pour les Magasins</h3>
                                <ul class="space-y-2 text-sm" style="color: #9CA3AF;">
                                        <li><a href="<?php echo home_url('/inscription-entreprise'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">Recruter un Opticien</a></li>
                                        <li><a href="<?php echo home_url('/recherche-opticiens'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">CV-thèque</a></li>
                                        <li><a href="<?php echo home_url('/abonnements'); ?>"
                                                        class="hover:text-white transition" style="color:inherit">Tarifs
                                                        & Abonnements</a></li>
                                        <li><a href="<?php echo home_url('/generateur-contrat'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">Générateur de Contrat</a></li>
                                </ul>
                        </div>

                        <!-- Légal & Support -->
                        <div>
                                <h3 class="text-base font-bold mb-4" style="color:#FFF;">Informations</h3>
                                <ul class="space-y-2 text-sm" style="color: #9CA3AF;">
                                        <li><a href="<?php echo home_url('/a-propos'); ?>"
                                                        class="hover:text-white transition" style="color:inherit">À
                                                        propos</a></li>
                                        <li><a href="<?php echo home_url('/blog'); ?>"
                                                        class="hover:text-white transition" style="color:inherit">Le
                                                        Blog</a></li>
                                        <li><a href="mailto:contact@oblink.fr" class="hover:text-white transition"
                                                        style="color:inherit">Contact & Support</a></li>
                                        <li><a href="<?php echo home_url('/mentions-legales'); ?>"
                                                        class="hover:text-white transition"
                                                        style="color:inherit">Mentions Légales</a></li>
                                </ul>
                        </div>

                </div>

                <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs"
                        style="border-top-color: #374151; color: #6B7280;">
                        <div class="flex flex-col md:flex-row items-center gap-4">
                                <p>&copy; <?php echo date('Y'); ?> OBLINK. Tous droits réservés.</p>
                                <div class="flex items-center gap-4">
                                        <!-- Social Links -->
                                        <a href="#" class="text-gray-400 hover:text-white transition"><i
                                                        class="fab fa-linkedin-in text-lg"></i></a>
                                        <a href="#" class="text-gray-400 hover:text-white transition"><i
                                                        class="fab fa-instagram text-lg"></i></a>
                                        <a href="#" class="text-gray-400 hover:text-white transition"><i
                                                        class="fab fa-facebook-f text-lg"></i></a>
                                </div>
                        </div>

                        <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"
                                        style="background-color: #10B981; display:inline-block"></span>
                                <span>Système Opérationnel - <?php echo date('d/m/Y'); ?></span>
                        </div>
                </div>

        </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>