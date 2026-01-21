<?php
/*
Template Name: Profil Opticien
*/

include 'header-inc.php';

// Get ID from query parameter
$profile_id = get_query_var('opticien_id') ? get_query_var('opticien_id') : (isset($_GET['id']) ? $_GET['id'] : 1);
$is_logged_in = is_user_logged_in();

// Mock data
$mock_profiles = [
    1 => [
        'id' => 1,
        'name' => 'Sarah Dubois',
        'avatar' => 'SD',
        'location' => 'Paris (75)',
        'fullAddress' => 'Île-de-France',
        'experience' => '5 ans',
        'specialties' => ['Contactologie', 'Basse vision', 'Adaptation enfants'],
        'rating' => 4.9,
        'reviews' => 42,
        'missions' => 47,
        'hourlyRate' => 35,
        'available' => true,
        'bio' => "Opticienne diplômée avec 5 ans d'expérience, je me spécialise dans la contactologie et l'accompagnement des patients en basse vision. Passionnée par mon métier, j'aime créer une relation de confiance avec chaque patient et proposer des solutions adaptées à leurs besoins spécifiques.",
        'education' => 'BTS Opticien-Lunetier - ISO Paris (2019)',
        'languages' => ['Français', 'Anglais'],
        'travelRadius' => 50,
        'zones' => ['Paris', 'Val-d\'Oise', 'Hauts-de-Seine', 'Seine-Saint-Denis'],
        'certifications' => ['Diplôme BTS Opticien-Lunetier', 'Formation contactologie avancée', 'Certification basse vision'],
        'availability' => 'Disponible immédiatement',
        'missionTypes' => ['Remplacements ponctuels', 'Remplacements vacances', 'Missions week-end']
    ],
    'default' => [
        'id' => 0,
        'name' => 'Profil Inconnu',
        'avatar' => '??',
        'location' => 'Inconnu',
        'fullAddress' => '',
        'experience' => 'N/A',
        'specialties' => [],
        'rating' => 0,
        'reviews' => 0,
        'missions' => 0,
        'hourlyRate' => 0,
        'available' => false,
        'bio' => "Ce profil n'existe pas ou a été supprimé.",
        'education' => '',
        'languages' => [],
        'travelRadius' => 0,
        'zones' => [],
        'certifications' => [],
        'availability' => 'Indisponible',
        'missionTypes' => []
    ]
];

$profile = isset($mock_profiles[$profile_id]) ? $mock_profiles[$profile_id] : $mock_profiles[1];

// Privacy Filter
$display_name = $is_logged_in ? $profile['name'] : substr($profile['name'], 0, strpos($profile['name'], ' ') + 2) . '.';
?>

<!-- Profile Header -->
<div class="bg-gradient-to-r from-oblink-blue to-oblink-violet text-white pt-32 pb-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center gap-8">
            <div class="w-32 h-32 rounded-full bg-white flex items-center justify-center text-oblink-orange font-bold text-5xl shadow-2xl"
                style="font-family: 'Montserrat', sans-serif;">
                <?php echo $profile['avatar']; ?>
            </div>
            <div class="flex-grow">
                <div class="flex items-start justify-between">
                    <div>
                        <h1 class="text-4xl font-bold mb-2" style="font-family: 'Montserrat', sans-serif;">
                            <?php echo $display_name; ?>
                        </h1>
                        <div class="flex items-center gap-4 text-lg opacity-90 mb-4">
                            <span><i class="fas fa-map-marker-alt mr-2"></i><?php echo $profile['location']; ?></span>
                            <span><i class="fas fa-briefcase mr-2"></i><?php echo $profile['experience']; ?>
                                d'expérience</span>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <div class="flex">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="font-bold"><?php echo $profile['rating']; ?>/5</span>
                                <span class="opacity-75">(<?php echo $profile['reviews']; ?> avis)</span>
                            </div>
                            <div class="px-4 py-2 bg-white/20 rounded-full">
                                <?php echo $profile['missions']; ?> missions réalisées
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <?php if ($profile['available']): ?>
                            <div class="px-4 py-2 bg-green-500 text-white rounded-full font-semibold mb-3"><i
                                    class="fas fa-check-circle mr-2"></i>Disponible</div>
                        <?php else: ?>
                            <div class="px-4 py-2 bg-gray-500 text-white rounded-full font-semibold mb-3"><i
                                    class="fas fa-clock mr-2"></i>Occupé</div>
                        <?php endif; ?>

                        <div class="text-3xl font-bold <?php echo $is_logged_in ? '' : 'blur-sm select-none'; ?>">
                            <?php echo $profile['hourlyRate']; ?>€<span class=" text-lg font-normal opacity-75">
                            /h</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Alert for non-logged in users causing blur -->
            <?php if (!$is_logged_in): ?>
                <div class="bg-orange-50 border-l-4 border-oblink-orange p-4 roundedshadow-sm">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-lock text-oblink-orange"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-orange-700">
                                Vous consultez une version limitée de ce profil.
                                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                                    class="font-bold underline hover:text-orange-800">Inscrivez-vous gratuitement</a> pour
                                voir les tarifs et contacter ce professionnel.
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Bio -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-oblink-gray mb-4 flex items-center">
                    <i class="fas fa-user text-oblink-orange mr-3"></i>
                    À propos
                </h2>
                <p class="text-oblink-gray/80 leading-relaxed"><?php echo $profile['bio']; ?></p>
            </div>

            <!-- Specialties -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-oblink-gray mb-4 flex items-center">
                    <i class="fas fa-star text-oblink-orange mr-3"></i>
                    Spécialités
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <?php foreach ($profile['specialties'] as $spec): ?>
                        <div class="flex items-center gap-3 p-4 bg-oblink-beige/30 rounded-lg">
                            <i class="fas fa-check-circle text-oblink-orange text-xl"></i>
                            <span class="font-semibold"><?php echo $spec; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Education & Certifications -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-oblink-gray mb-4 flex items-center">
                    <i class="fas fa-graduation-cap text-oblink-orange mr-3"></i>
                    Formation & Certifications
                </h2>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-certificate text-oblink-blue mt-1"></i>
                        <span class="font-semibold"><?php echo $profile['education']; ?></span>
                    </div>
                    <?php foreach ($profile['certifications'] as $cert): ?>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-award text-oblink-violet mt-1"></i>
                            <span><?php echo $cert; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Travel & Availability -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-oblink-gray mb-4 flex items-center">
                    <i class="fas fa-map text-oblink-orange mr-3"></i>
                    Zones d'intervention
                </h2>
                <div class="mb-4">
                    <div class="text-sm text-oblink-gray/70 mb-2">Rayon de déplacement</div>
                    <div class="text-xl font-bold text-oblink-blue"><?php echo $profile['travelRadius']; ?> km</div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($profile['zones'] as $zone): ?>
                        <span
                            class="px-3 py-2 bg-oblink-blue/10 text-oblink-blue rounded-lg font-semibold"><?php echo $zone; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Contact Box -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-oblink-orange/20 sticky top-24">
                <h3 class="text-xl font-bold text-oblink-gray mb-6">Contacter <?php echo $display_name; ?></h3>

                <?php if ($is_logged_in): ?>
                    <button
                        class="w-full px-6 py-4 bg-oblink-orange text-white rounded-xl font-bold hover:bg-oblink-orange/90 transition shadow-lg mb-4 flex items-center justify-center">
                        <i class="fas fa-envelope mr-2"></i> Envoyer un message
                    </button>
                    <button
                        class="w-full px-6 py-4 border-2 border-oblink-blue text-oblink-blue rounded-xl font-bold hover:bg-oblink-blue hover:text-white transition flex items-center justify-center">
                        <i class="fas fa-phone mr-2"></i> Afficher le numéro
                    </button>
                    <div class="mt-6 text-center text-sm text-oblink-gray/60">
                        <i class="fas fa-shield-alt mr-1"></i> Paiement sécurisé via OBLINK
                    </div>
                <?php else: ?>
                    <div class="text-center p-4 bg-gray-50 rounded-xl mb-4">
                        <i class="fas fa-lock text-3xl text-gray-300 mb-3"></i>
                        <p class="text-sm text-gray-500 mb-4">Coordonnées masquées</p>
                        <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                            class="block w-full px-6 py-3 bg-oblink-blue text-white rounded-xl font-bold hover:bg-blue-600 transition shadow-lg">
                            S'inscrire pour voir
                        </a>
                    </div>
                    <p class="text-xs text-center text-gray-400">L'inscription est gratuite pour les entreprises.</p>
                <?php endif; ?>
            </div>

            <!-- Languages -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h3 class="font-bold text-oblink-gray mb-4">Langues parlées</h3>
                <div class="space-y-2">
                    <?php foreach ($profile['languages'] as $lang): ?>
                        <div class="flex justify-between items-center">
                            <span><?php echo $lang; ?></span>
                            <span class="text-oblink-orange"><i class="fas fa-check"></i></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>