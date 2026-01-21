<?php
/*
Template Name: Mentions Légales
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-white pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-display text-oblink-gray mb-8">Mentions Légales</h1>

        <div class="prose prose-lg text-gray-500">
            <h3>1. Éditeur du site</h3>
            <p>Le site OBLINK est édité par la société OBLINK SAS, au capital de 10 000 euros, immatriculée au Registre
                du Commerce et des Sociétés de Paris sous le numéro 123 456 789.</p>
            <p><strong>Siège social :</strong> 10 Rue de la Paix, 75000 Paris, France.</p>
            <p><strong>Email :</strong> contact@oblink.fr</p>

            <h3>2. Directeur de publication</h3>
            <p>Monsieur Sergio Sandoval.</p>

            <h3>3. Hébergement</h3>
            <p>Le site est hébergé par OVH SAS, 2 rue Kellermann - 59100 Roubaix - France.</p>

            <h3>4. Propriété intellectuelle</h3>
            <p>L'ensemble de ce site relève de la législation française et internationale sur le droit d'auteur et la
                propriété intellectuelle. Tous les droits de reproduction sont réservés.</p>
        </div>
    </div>
</div>

<!-- HARDCODED FOOTER REUSE -->
<footer id="main-footer" class="bg-gray-900 text-white pt-20 pb-10 relative z-10"
    style="background-color: #1F2937 !important; color: #FFFFFF !important; border-top: 4px solid #FF6600; display: block !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <div class="space-y-6">
                <span class="text-2xl font-black tracking-tight"
                    style="font-family: 'Montserrat', sans-serif; color:#FFF">OBLINK</span>
                <p class="text-sm text-gray-400">La plateforme des Opticiens Freelances.</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 text-white">Navigation</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="<?php echo home_url('/'); ?>" class="hover:text-white">Accueil</a></li>
                    <li><a href="<?php echo home_url('/inscription-opticien'); ?>"
                            class="hover:text-white">Opticiens</a></li>
                    <li><a href="<?php echo home_url('/inscription-entreprise'); ?>"
                            class="hover:text-white">Entreprises</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 pt-8 text-xs text-gray-500">
            &copy;
            <?php echo date('Y'); ?> OBLINK.
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>