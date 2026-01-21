<?php
/*
Template Name: Politique de Confidentialité (RGPD)
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-white pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <span
                class="inline-block py-1 px-3 rounded-full bg-blue-50 text-oblink-blue font-bold text-sm mb-4 uppercase tracking-wider">
                Données Personnelles
            </span>
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-6">Politique de Confidentialité
            </h1>
            <p class="text-xl text-gray-500 max-w-3xl mx-auto">
                Vos données sont précieuses. Voici comment OBLINK les protège, conformément au RGPD.
            </p>
        </div>

        <div class="prose prose-lg text-gray-600 mx-auto">

            <h3>1. Collecte des données</h3>
            <p>Dans le cadre de l'utilisation de la plateforme, OBLINK est amené à collecter les données suivantes :</p>
            <ul>
                <li><strong>Identité :</strong> Nom, Prénom, Email, Téléphone.</li>
                <li><strong>Professionnelles :</strong> Diplômes, Numéro ADELI / RPPS, CV, Expérience.</li>
                <li><strong>Financières :</strong> RIB, Données de facturation (traitées par Stripe).</li>
                <li><strong>Connexion :</strong> Adresse IP, logs de connexion.</li>
            </ul>

            <h3>2. Données de Santé</h3>
            <p>OBLINK n'héberge <strong>aucune donnée de santé</strong> relative aux patients des opticiens
                (ordonnances, mesures de vue). Ces données restent exclusivement dans le logiciel métier du magasin et
                ne transitent pas par la plateforme.</p>

            <h3>3. Utilisation des données</h3>
            <p>Les données sont collectées pour les finalités suivantes :</p>
            <ul>
                <li>Mise en relation entre Opticiens et Magasins.</li>
                <li>Vérification des qualifications professionnelles.</li>
                <li>Gestion des paiements et de la facturation.</li>
                <li>Envoi de notifications liées aux missions.</li>
            </ul>

            <h3>4. Partage des données</h3>
            <p>Vos données ne sont jamais vendues à des tiers. Elles sont transmises uniquement :</p>
            <ul>
                <li>Aux magasins (pour les profils freelances) dans le cadre d'une candidature.</li>
                <li>À notre prestataire de paiement (Stripe) pour les obligations légales KYC (Know Your Customer).</li>
                <li>Aux autorités compétentes en cas de réquisition judiciaire.</li>
            </ul>

            <h3>5. Sécurité</h3>
            <p>OBLINK met en œuvre toutes les mesures techniques (chiffrement SSL, serveurs sécurisés) pour protéger vos
                données contre l'accès non autorisé.</p>

            <h3>6. Vos Droits</h3>
            <p>Conformément au RGPD, vous disposez d'un droit d'accès, de rectification, de portabilité et d'effacement
                de vos données. Pour exercer ce droit, contactez notre DPO à : <a
                    href="mailto:dpo@oblink.fr">dpo@oblink.fr</a>.</p>
        </div>

    </div>
</div>

<!-- GLOBAL HARDCODED FOOTER REUSE -->
<div class="footer-wrapper">
    <?php include get_template_directory() . '/footer-content.php'; ?>
</div>
<?php wp_footer(); ?>
</body>

</html>