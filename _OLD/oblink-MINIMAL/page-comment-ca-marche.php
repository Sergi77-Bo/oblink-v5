<?php
/**
 * Template Name: Comment ça marche
 */
include 'header-inc.php';
?>

<div class="pt-32 pb-20 bg-oblink-beige/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 text-oblink-gray" style="font-family: 'Montserrat', sans-serif;">
            Comment ça marche ?
        </h1>
        <p class="text-xl text-oblink-gray/80 mb-8 max-w-3xl mx-auto">
            Une plateforme simple et intuitive pour connecter les professionnels de l'optique.
        </p>
    </div>
</div>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Step 1 -->
        <div class="flex flex-col md:flex-row items-center mb-20">
            <div class="w-full md:w-1/2 mb-10 md:mb-0 md:pr-12">
                <div
                    class="w-20 h-20 bg-oblink-orange text-white rounded-full flex items-center justify-center text-4xl font-bold mb-6 shadow-lg">
                    1</div>
                <h3 class="text-3xl font-bold text-oblink-gray mb-4">Inscription & Profil</h3>
                <p class="text-lg text-oblink-gray/70">
                    Créez votre compte en quelques clics.
                    <br><br>
                    <strong>Candidats :</strong> Importez votre CV, diplômes et indiquez vos disponibilités.
                    <br>
                    <strong>Recruteurs :</strong> Créez la fiche de votre magasin et définissez vos besoins.
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-100 rounded-3xl h-64 w-full flex items-center justify-center">
                    <i class="fas fa-user-plus text-6xl text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="flex flex-col md:flex-row-reverse items-center mb-20">
            <div class="w-full md:w-1/2 mb-10 md:mb-0 md:pl-12">
                <div
                    class="w-20 h-20 bg-oblink-blue text-white rounded-full flex items-center justify-center text-4xl font-bold mb-6 shadow-lg">
                    2</div>
                <h3 class="text-3xl font-bold text-oblink-gray mb-4">Validation & Matching</h3>
                <p class="text-lg text-oblink-gray/70">
                    Notre algorithme vous propose les meilleures correspondances.
                    <br><br>
                    Nous validons manuellement chaque profil pour garantir la qualité du réseau. Vous recevez des
                    notifications dès qu'une opportunité correspond à vos critères.
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-100 rounded-3xl h-64 w-full flex items-center justify-center">
                    <i class="fas fa-check-circle text-6xl text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 mb-10 md:mb-0 md:pr-12">
                <div
                    class="w-20 h-20 bg-oblink-violet text-white rounded-full flex items-center justify-center text-4xl font-bold mb-6 shadow-lg">
                    3</div>
                <h3 class="text-3xl font-bold text-oblink-gray mb-4">Mission & Paiement</h3>
                <p class="text-lg text-oblink-gray/70">
                    Collaborez en toute sérénité.
                    <br><br>
                    Une fois la mission validée, le contrat est généré automatiquement. Le paiement est sécurisé et
                    versé à la fin de la mission (ou fin de mois pour les longues durées).
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-gray-100 rounded-3xl h-64 w-full flex items-center justify-center">
                    <i class="fas fa-handshake text-6xl text-gray-300"></i>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>