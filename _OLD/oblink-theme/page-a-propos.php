<?php
/*
Template Name: À Propos
*/
include 'header-inc.php';
?>

<div class="max-w-4xl mx-auto px-4 py-32">
    <h1 class="text-5xl font-bold text-oblink-gray mb-6" style="font-family: 'Montserrat', sans-serif;">
        À propos d'<span class="text-oblink-orange">OBLINK</span>
    </h1>

    <div class="prose prose-lg max-w-none">
        <p class="text-xl text-oblink-gray/80 mb-8">
            OBLINK est la première plateforme de mise en relation spécialisée dans le secteur de l'optique en France.
        </p>

        <div class="glass p-8 mb-8 rounded-2xl">
            <h2 class="text-2xl font-bold text-oblink-gray mb-4">Notre Mission</h2>
            <p class="text-oblink-gray/80">
                Connecter instantanément les opticiens et vendeurs indépendants aux magasins et entreprises d'optique.
                Nous croyons en un secteur où la flexibilité, la confiance et la simplicité sont les maîtres mots.
            </p>
        </div>

        <h2 class="text-3xl font-bold text-oblink-gray mb-4">Notre Histoire</h2>
        <p class="text-oblink-gray/80 mb-6">
            L'idée d'OBLINK est née d'une observation simple : la mise en relation entre opticiens et entreprises reste
            archaïque dans un secteur pourtant moderne.
            Après avoir observé les difficultés des opticiens indépendants à trouver des missions et des magasins à
            recruter rapidement,
            nous avons décidé de créer la solution qui manquait au marché.
        </p>

        <div class="grid md:grid-cols-3 gap-6 my-12">
            <div class="glass p-6 text-center border-2 border-oblink-orange rounded-xl">
                <div class="text-4xl font-bold text-oblink-orange mb-2">2025</div>
                <div class="text-oblink-gray/70">Année de création</div>
            </div>
            <div class="glass p-6 text-center border-2 border-oblink-blue rounded-xl">
                <div class="text-4xl font-bold text-oblink-blue mb-2">500+</div>
                <div class="text-oblink-gray/70">Opticiens actifs</div>
            </div>
            <div class="glass p-6 text-center border-2 border-oblink-violet rounded-xl">
                <div class="text-4xl font-bold text-oblink-violet mb-2">200+</div>
                <div class="text-oblink-gray/70">Entreprises partenaires</div>
            </div>
        </div>

        <h2 class="text-3xl font-bold text-oblink-gray mb-4">Nos Valeurs</h2>
        <div class="space-y-6 mb-8">
            <div class="flex items-start glass p-6 rounded-xl">
                <i class="fas fa-bolt text-oblink-orange text-3xl mr-4 mt-1"></i>
                <div>
                    <h3 class="text-xl font-bold mb-2">Rapidité</h3>
                    <p class="text-oblink-gray/80">Une mise en relation instantanée, des réponses en moins de 48h</p>
                </div>
            </div>
            <div class="flex items-start glass p-6 rounded-xl">
                <i class="fas fa-shield-alt text-oblink-blue text-3xl mr-4 mt-1"></i>
                <div>
                    <h3 class="text-xl font-bold mb-2">Confiance</h3>
                    <p class="text-oblink-gray/80">Validation rigoureuse en 4 étapes, profils vérifiés et authentifiés
                    </p>
                </div>
            </div>
            <div class="flex items-start glass p-6 rounded-xl">
                <i class="fas fa-hands-helping text-oblink-violet text-3xl mr-4 mt-1"></i>
                <div>
                    <h3 class="text-xl font-bold mb-2">Transparence</h3>
                    <p class="text-oblink-gray/80">Tarification claire, pas de frais cachés, rémunération équitable</p>
                </div>
            </div>
        </div>

        <div class="glass p-8 text-center rounded-2xl">
            <h2 class="text-2xl font-bold text-oblink-gray mb-4">Rejoignez l'aventure !</h2>
            <p class="text-oblink-gray/80 mb-6">Que vous soyez opticien ou entreprise, OBLINK vous accompagne</p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="<?php echo home_url('/register?type=opticien'); ?>"
                    class="px-6 py-3 bg-oblink-orange text-white rounded-lg font-semibold hover:bg-oblink-orange/90 transition">
                    Je suis opticien
                </a>
                <a href="<?php echo home_url('/register?type=entreprise'); ?>"
                    class="px-6 py-3 bg-oblink-violet text-white rounded-lg font-semibold hover:bg-oblink-violet/90 transition">
                    Je suis une entreprise
                </a>
            </div>
        </div>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>