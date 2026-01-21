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
<?php include get_template_directory() . "/footer-content.php"; ?>
<?php wp_footer(); ?>
</body>

</html>