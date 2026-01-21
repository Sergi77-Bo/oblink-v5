<?php
/*
Template Name: CGU / CGV
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-white pt-32 pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-16">
            <span
                class="inline-block py-1 px-3 rounded-full bg-oblink-orange/10 text-oblink-orange font-bold text-sm mb-4 uppercase tracking-wider">
                Juridique
            </span>
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-6">Conditions Générales</h1>
            <p class="text-xl text-gray-500 max-w-3xl mx-auto">
                Dernière mise à jour : <?php echo date('d/m/Y'); ?>. <br>
                L'utilisation de la plateforme OBLINK implique l'acceptation pleine et entière des présentes conditions.
            </p>
        </div>

        <!-- Navigation Tabs (Fake Tabs for Visual Structure) -->
        <div class="flex flex-col md:flex-row gap-4 mb-12 border-b border-gray-200 pb-4">
            <a href="#cgu" class="px-6 py-2 bg-oblink-orange text-white rounded-lg font-bold">1. CGU (Pour Tous)</a>
            <a href="#cgv"
                class="px-6 py-2 bg-white border border-gray-200 text-oblink-gray rounded-lg font-bold hover:bg-gray-50">2.
                CGV (Pour Magasins)</a>
            <a href="#responsabilite"
                class="px-6 py-2 bg-white border border-gray-200 text-oblink-gray rounded-lg font-bold hover:bg-gray-50">3.
                Responsabilité</a>
        </div>

        <div class="grid md:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="md:col-span-2 space-y-12 prose prose-lg text-gray-600">

                <!-- SECTION 1 : CGU -->
                <section id="cgu" class="scroll-mt-32">
                    <h2 class="text-3xl font-bold text-oblink-gray mb-6 border-l-4 border-oblink-orange pl-4">1.
                        Conditions Générales d'Utilisation (CGU)</h2>
                    <p class="italic text-sm text-gray-400 mb-6">Applicables à tous les utilisateurs (Opticiens
                        Freelances et Magasins d'Optique).</p>

                    <h3 class="text-xl font-bold text-oblink-gray">1.1. Rôle de la plateforme</h3>
                    <p>OBLINK agit exclusivement en qualité d'intermédiaire technique de mise en relation. OBLINK n'est
                        ni l'employeur des opticiens freelances, ni le mandataire des magasins d'optique. La plateforme
                        ne saurait être tenue responsable de la qualité des prestations (examens de vue, montages)
                        réalisées.</p>

                    <h3 class="text-xl font-bold text-oblink-gray">1.2. Vérification des profils</h3>
                    <p>L'utilisateur Freelance certifie l'exactitude des informations fournies (Diplômes BTS/Licence,
                        Numéro ADELI/RPPS, Assurance RC Pro). OBLINK procède à des vérifications mais l'utilisateur
                        reste seul responsable en cas de fausse déclaration. Tout manquement entraînera la suspension
                        immédiate du compte.</p>

                    <h3 class="text-xl font-bold text-oblink-gray">1.3. Modération</h3>
                    <p>OBLINK se réserve le droit de modérer ou supprimer tout contenu (avis, commentaires, descriptions
                        de mission) jugé diffamatoire, injurieux ou contraire à l'éthique de la profession.</p>
                </section>

                <hr class="border-gray-200">

                <!-- SECTION 2 : CGV -->
                <section id="cgv" class="scroll-mt-32">
                    <h2 class="text-3xl font-bold text-oblink-gray mb-6 border-l-4 border-oblink-blue pl-4">2.
                        Conditions Générales de Vente (CGV)</h2>
                    <p class="italic text-sm text-gray-400 mb-6">Applicables aux clients Magasins souscrivant aux
                        services payants.</p>

                    <h3 class="text-xl font-bold text-oblink-gray">2.1. Modèle Économique</h3>
                    <p>L'accès à la CV-thèque et la publication d'offres sont soumis à la souscription d'un abonnement
                        (Pack Découverte, Premium ou Corporate). Les tarifs sont indiqués en euros HT. La commission de
                        mise en relation est facturée en sus au magasin donneur d'ordre.</p>

                    <h3 class="text-xl font-bold text-oblink-gray">2.2. Paiement et Séquestre</h3>
                    <p>Les paiements sont sécurisés et gérés par notre prestataire de services de paiement (PSP) agréé
                        (Stripe Connect). OBLINK n'encaisse pas les fonds pour compte de tiers ; les flux financiers
                        transitent directement via les comptes de cantonnement sécurisés.</p>

                    <h3 class="text-xl font-bold text-oblink-gray">2.3. Absence de Droit de Rétractation (B2B)</h3>
                    <p>Conformément au Code de Commerce, le droit de rétractation de 14 jours ne s'applique pas aux
                        transactions réalisées entre professionnels (B2B) dans le cadre de leur activité principale.</p>

                    <h3 class="text-xl font-bold text-oblink-gray">2.4. Lutte contre le travail dissimulé</h3>
                    <p>Le magasin est tenu de vérifier, via la plateforme, la conformité légale du freelance
                        (Attestation de vigilance URSSAF, Kbis) lors de la contractualisation et tous les 6 mois.</p>
                </section>

                <hr class="border-gray-200">

                <!-- SECTION 3 : NON CONTOURNEMENT -->
                <section id="responsabilite" class="scroll-mt-32">
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-8">
                        <h2 class="text-2xl font-bold text-red-600 mb-4 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-3"></i> 3. Clause de Non-Intermédiation
                        </h2>
                        <p class="font-bold mb-4">La pérennité d'OBLINK repose sur le respect de cette clause.</p>
                        <p>Il est strictement interdit aux utilisateurs (Magasins et Freelances) de contourner la
                            plateforme pour contractualiser en direct une mission initialement proposée via OBLINK.</p>
                        <p class="mb-0">En cas d'embauche directe ou de collaboration hors plateforme d'un freelance
                            présenté par OBLINK dans les 12 mois suivant la mise en relation, une <strong>indemnité
                                compensatrice forfaitaire</strong> sera facturée au magasin (voir grille tarifaire en
                            vigueur).</p>
                    </div>
                </section>

                </section>

                <hr class="border-gray-200">

                <!-- SECTION 4 : OBLINK ACADEMIE -->
<!-- SECTION 4 : OBLINK ACADEMIE (PASS REVISION) -->
                <section id="academie-conditions" class="scroll-mt-32">
                    <h2 class="text-3xl font-bold text-oblink-gray mb-6 border-l-4 border-purple-600 pl-4">4. Conditions Spécifiques - Pass Révision</h2>
                    <p class="italic text-sm text-gray-400 mb-6">Applicables à tout achat du "Pass Révision" ou "Pass Examen".</p>

                    <h3 class="text-xl font-bold text-oblink-gray mb-3">4.1. Objet du Service</h3>
                    <p>Le Pass Révision donne un accès personnel et non exclusif à la plateforme OBLINK Académie, incluant la base de quiz et le générateur d'exercices par Intelligence Artificielle.</p>

                    <h3 class="text-xl font-bold text-oblink-gray mb-3">4.2. Accès et Sécurité (Fair Use)</h3>
                    <ul class="list-disc pl-5 mb-4 space-y-2">
                        <li><strong>Limite d'appareils :</strong> L'accès est strictement personnel. Il est limité à <strong>deux (2) appareils simultanés</strong> (ex: un smartphone et un ordinateur). Toute détection de partage de compte entraînera une suspension immédiate sans remboursement.</li>
                        <li><strong>Quota IA :</strong> OBLINK applique une politique d'usage raisonnable ("Fair Use"). L'accès est limité à 50 nouvelles générations de questions par jour. Les questions déjà présentes en cache restent accessibles en illimité.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-oblink-gray mb-3">4.3. Absence de Garantie de Résultat</h3>
                    <p>OBLINK est un outil d'accompagnement. L'entreprise <strong>ne garantit pas la réussite aux examens</strong> du BTS OL. L'utilisateur reste seul responsable de l'assimilation de ses connaissances.</p>

                    <h3 class="text-xl font-bold text-oblink-gray mb-3">4.4. Responsabilité liée à l'IA</h3>
                    <p>Le contenu est généré ou assisté par Intelligence Artificielle. Bien que nous appliquions des filtres de contrôle, OBLINK ne peut être tenu responsable d'éventuelles erreurs factuelles isolées. Un système de "Signalement" permet de corriger toute imprécision sous 48h.</p>

                    <h3 class="text-xl font-bold text-oblink-gray mb-3">4.5. Droit de Rétractation et Remboursement (Article L221-28)</h3>
                    <div class="bg-purple-50 p-4 rounded-lg border border-purple-100 mb-4">
                        <p class="font-bold text-purple-900 mb-2">Attention : Renoncement au droit de rétractation</p>
                        <p class="text-sm text-purple-800">Conformément à l'article L221-28 du Code de la consommation, le droit de rétractation ne peut être exercé pour les contenus numériques fournis sur un support non matériel dont l'exécution a commencé après accord préalable exprès du consommateur. <strong>En validant l'achat du Pass, l'utilisateur accepte l'accès immédiat au service et renonce expressément à son droit de rétractation.</strong></p>
                    </div>

                    <h3 class="text-xl font-bold text-oblink-gray mb-3">4.6. Protection des Données</h3>
                    <p>Les données collectées (Email, résultats de quiz) servent uniquement à l'amélioration de l'expérience utilisateur et au suivi de progression. Elles ne sont jamais revendues à des tiers.</p>
                </section>

                <hr class="border-gray-200">

                <section>
                    <h3 class="text-xl font-bold text-oblink-gray">5. Propriété Intellectuelle</h3>
                    <p>La marque OBLINK, le logo, la charte graphique et le code source de la plateforme sont la
                        propriété exclusive de la société OBLINK SAS. Toute reproduction totale ou partielle est
                        interdite.</p>
                </section>

            </div>

            <!-- Sidebar Sticky -->
            <div class="hidden md:block">
                <div class="sticky top-32 space-y-6">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-oblink-gray mb-4">Besoin d'aide ?</h3>
                        <p class="text-sm text-gray-500 mb-4">Notre équipe juridique est disponible pour répondre à vos
                            questions sur le fonctionnement de la plateforme.</p>
                        <a href="mailto:contact@oblink.fr"
                            class="block text-center w-full py-3 bg-oblink-blue/10 text-oblink-blue font-bold rounded-lg hover:bg-oblink-blue hover:text-white transition">Contact
                            Support</a>
                    </div>

                    <div class="bg-oblink-gray p-6 rounded-2xl text-white">
                        <h3 class="font-bold mb-2">RGPD & Données</h3>
                        <p class="text-xs text-gray-400 mb-4">Consultez notre politique de confidentialité concernant
                            les données de santé et personnelles.</p>
                        <a href="<?php echo home_url('/confidentialite'); ?>"
                            class="text-oblink-orange text-sm font-bold underline">Voir la politique RGPD</a>
                    </div>
                </div>
            </div>

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