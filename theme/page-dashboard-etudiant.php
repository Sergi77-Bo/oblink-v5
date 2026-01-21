<?php
/*
Template Name: Dashboard Etudiant
*/
/*
Template Name: Dashboard Etudiant
*/
include 'header-inc.php';

// DEMO MODE: Allow access with ?demo=jury parameter for presentation
$is_demo_mode = isset($_GET['demo']) && $_GET['demo'] === 'jury';

// Verification simple de connexion (à renforcer)
if (!$is_demo_mode && !is_user_logged_in()) {
    echo '<script>window.location.href="' . home_url('/connexion') . '";</script>';
    exit;
}

// Get user or set demo user
if ($is_demo_mode) {
    $demo_user = (object) [
        'display_name' => 'Étudiant (Mode Démo)',
        'user_email' => 'demo@oblink.fr'
    ];
    $current_user = $demo_user;
} else {
    $current_user = wp_get_current_user();
}

// Detect mode: BTS or VAE (from URL parameter or default to BTS)
$academy_mode = isset($_GET['mode']) ? sanitize_text_field($_GET['mode']) : 'bts';
$is_vae_mode = ($academy_mode === 'vae');

// Set mode-specific content
if ($is_vae_mode) {
    $dashboard_title = "Mon Espace VAE";
    $dashboard_icon = "fa-certificate";
    $welcome_message = "Prêt à valider vos acquis devant le jury ?";
} else {
    $dashboard_title = "Mon Espace BTS";
    $dashboard_icon = "fa-graduation-cap";
    $welcome_message = "Prêt à sécuriser des points pour l'examen ?";
}
?>

<div class="bg-gray-50 min-h-screen pb-20 font-sans">

    <!-- Top Bar -->
    <div class="bg-white border-b border-gray-200 sticky top-16 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas <?php echo $dashboard_icon; ?> text-oblink-orange mr-3"></i>
                    <?php echo $dashboard_title; ?>
                </h1>
                <div class="flex items-center gap-4">
                    <!-- Mode Toggle -->
                    <div class="hidden md:flex items-center gap-2 bg-gray-100 rounded-lg p-1">
                        <a href="?demo=jury&mode=bts"
                            class="px-4 py-2 rounded-md text-sm font-bold transition <?php echo !$is_vae_mode ? 'bg-white text-oblink-blue shadow-sm' : 'text-gray-500 hover:text-gray-700'; ?>">
                            BTS OL
                        </a>
                        <a href="?demo=jury&mode=vae"
                            class="px-4 py-2 rounded-md text-sm font-bold transition <?php echo $is_vae_mode ? 'bg-white text-oblink-violet shadow-sm' : 'text-gray-500 hover:text-gray-700'; ?>">
                            VAE
                        </a>
                    </div>
                    <div class="hidden md:flex items-center text-sm text-gray-500">
                        <span class="mr-2">Crédits IA:</span>
                        <span class="font-bold text-gray-900">500 / 500</span>
                    </div>
                    <button
                        class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-800 transition">
                        <i class="fas fa-play mr-2"></i>Nouveau Quiz
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Performance Cockpit Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Bonjour,
                <?php echo esc_html($current_user->display_name); ?> 👋
            </h2>

            <!-- Global Progress Bar + Countdown -->
            <div class="bg-gradient-to-r from-oblink-orange to-oblink-violet rounded-2xl p-6 text-white shadow-xl mb-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-2xl font-black mb-1">
                            <?php echo $is_vae_mode ? 'Progression VAE' : 'Progression BTS'; ?>
                        </h3>
                        <p class="text-white/80 text-sm">Votre niveau de préparation</p>
                    </div>
                    <div class="text-right">
                        <div class="text-4xl font-black">34%</div>
                        <div class="text-white/80 text-xs">de maîtrise</div>
                    </div>
                </div>
                <div class="h-4 bg-white/20 rounded-full overflow-hidden mb-3">
                    <div class="h-full bg-white rounded-full shadow-lg transition-all duration-1000" style="width: 34%">
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="flex items-center gap-2">
                        <i class="fas fa-fire text-yellow-300"></i>
                        <strong>3 jours</strong> de suite
                    </span>
                    <span class="flex items-center gap-2">
                        <i class="fas fa-clock"></i>
                        <strong>42 jours</strong> avant <?php echo $is_vae_mode ? 'l\'oral' : 'l\'épreuve'; ?>
                    </span>
                </div>
            </div>

            <!-- Quick AI Assistant Access -->
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div
                    class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition cursor-pointer">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <h4 class="font-bold text-lg mb-1">Assistant IA</h4>
                            <p class="text-purple-100 text-sm">Réponse en 3 secondes</p>
                        </div>
                        <i class="fas fa-robot text-4xl opacity-50"></i>
                    </div>
                    <button
                        class="w-full bg-white text-purple-600 px-4 py-3 rounded-lg font-bold hover:bg-purple-50 transition flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        Poser une question
                    </button>
                </div>

                <!-- Gamification Badges -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-sm">
                    <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-trophy text-yellow-500"></i>
                        Derniers Succès
                    </h4>
                    <div class="flex gap-3">
                        <div class="text-center">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-2xl mb-1 shadow-lg">
                                🏆
                            </div>
                            <span class="text-xs font-bold text-gray-700">Expert OGP</span>
                        </div>
                        <div class="text-center opacity-40">
                            <div
                                class="w-14 h-14 bg-gray-200 rounded-full flex items-center justify-center text-2xl mb-1">
                                🔒
                            </div>
                            <span class="text-xs font-bold text-gray-400">Maître AV</span>
                        </div>
                        <div class="text-center opacity-40">
                            <div
                                class="w-14 h-14 bg-gray-200 rounded-full flex items-center justify-center text-2xl mb-1">
                                🔒
                            </div>
                            <span class="text-xs font-bold text-gray-400">100 Quiz</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Left Column: Stats & Progress -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Progress Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4">Progression Globale</h3>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-500">Analyse de la Vision</span>
                            <span class="font-bold text-oblink-orange">42%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-oblink-orange rounded-full" style="width: 42%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-500">Optique Géométrique</span>
                            <span class="font-bold text-oblink-blue">15%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-oblink-blue rounded-full" style="width: 15%"></div>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-yellow-500 shadow-sm border border-gray-100">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 text-transform uppercase font-bold">Points forts</p>
                                <p class="text-sm font-bold text-gray-900">Hypermétropie, Prismes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4">Outils Rapides</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition text-center group">
                            <i
                                class="fas fa-file-pdf text-2xl text-red-500 mb-2 group-hover:scale-110 transition-transform"></i>
                            <p class="text-xs font-bold text-gray-700">Annales</p>
                        </a>
                        <a href="#" class="p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition text-center group">
                            <i
                                class="fas fa-robot text-2xl text-oblink-violet mb-2 group-hover:scale-110 transition-transform"></i>
                            <p class="text-xs font-bold text-gray-700">Coach IA</p>
                        </a>
                        <a href="#" class="p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition text-center group">
                            <i
                                class="fas fa-calculator text-2xl text-green-500 mb-2 group-hover:scale-110 transition-transform"></i>
                            <p class="text-xs font-bold text-gray-700">Formules</p>
                        </a>
                        <a href="#" class="p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition text-center group">
                            <i
                                class="fas fa-users text-2xl text-blue-500 mb-2 group-hover:scale-110 transition-transform"></i>
                            <p class="text-xs font-bold text-gray-700">Forum</p>
                        </a>
                    </div>
                </div>

                <?php if ($is_vae_mode): ?>
                    <!-- VAE-Specific: Livret 1 Checklist -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <i class="fas fa-file-alt text-indigo-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Livret 1 : Recevabilité</h3>
                                <p class="text-xs text-gray-500">Documents à préparer</p>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4 text-sm">
                            <label class="flex items-start gap-3 p-2 hover:bg-gray-50 rounded cursor-pointer">
                                <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 rounded">
                                <span class="text-gray-700">CERFA Livret 1 complété</span>
                            </label>
                            <label class="flex items-start gap-3 p-2 hover:bg-gray-50 rounded cursor-pointer">
                                <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 rounded">
                                <span class="text-gray-700">Bulletins de salaire (1 an minimum)</span>
                            </label>
                            <label class="flex items-start gap-3 p-2 hover:bg-gray-50 rounded cursor-pointer">
                                <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 rounded">
                                <span class="text-gray-700">Attestations employeurs</span>
                            </label>
                            <label class="flex items-start gap-3 p-2 hover:bg-gray-50 rounded cursor-pointer">
                                <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 rounded">
                                <span class="text-gray-700">Copies certifications/diplômes</span>
                            </label>
                        </div>
                        <div class="bg-indigo-50 p-3 rounded-lg text-xs text-indigo-700">
                            <i class="fas fa-info-circle mr-1"></i>
                            <strong>Délai :</strong> Réponse sous 2 mois max
                        </div>
                    </div>

                    <!-- VAE-Specific: Assistant Livret 2 -->
                    <div class="bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-2xl p-6 shadow-lg text-white">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-lg">Assistant Livret 2</h3>
                            <i class="fas fa-magic text-2xl opacity-50"></i>
                        </div>
                        <p class="text-indigo-100 text-sm mb-4">Transformez votre expérience en vocabulaire académique avec
                            l'IA</p>
                        <button
                            class="w-full bg-white text-indigo-600 px-4 py-3 rounded-xl font-bold hover:bg-indigo-50 transition">
                            <i class="fas fa-edit mr-2"></i>Rédiger mon Livret 2
                        </button>
                    </div>

                    <!-- VAE-Specific: Questions Jury -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-shield-alt text-orange-600"></i>
                            </div>
                            <h3 class="font-bold text-gray-900">Questions Pièges Jury</h3>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">27 ans d'oraux analysés par IA</p>
                        <button
                            class="w-full bg-gray-900 text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-800 transition text-sm">
                            Voir les 10 questions les plus fréquentes
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Main Column: Activity Feed / Simulations -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Banner -->
                <div
                    class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-6 text-white relative overflow-hidden shadow-lg">
                    <div class="absolute right-0 top-0 h-full w-1/3 bg-white/5 skew-x-12 transform translate-x-12">
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-2">
                            <?php echo $is_vae_mode ? 'Simulateur d\'Oral VAE 2026' : 'Simulateur d\'Examen 2026'; ?>
                        </h3>
                        <p class="text-gray-300 mb-4 text-sm max-w-md">
                            <?php echo $is_vae_mode
                                ? 'Pratiquez avec les questions types du jury basées sur 27 ans d\'oraux VAE.'
                                : 'Entraînez-vous sur des sujets probables générés par IA en fonction des tendances des 5 dernières années.'; ?>
                        </p>
                        <button
                            class="bg-white text-gray-900 px-5 py-2 rounded-lg text-sm font-bold hover:bg-gray-100 transition">
                            <?php echo $is_vae_mode ? 'Lancer une simulation d\'oral (30min)' : 'Lancer une simulation (1h)'; ?>
                        </button>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Recent Activity (DYNAMIC FROM RAG) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="font-bold text-gray-900">Quiz du Jour (Basé sur vos Annales)</h3>
                            <span class="text-xs font-bold bg-oblink-orange/10 text-oblink-orange px-2 py-1 rounded">IA
                                Generated</span>
                        </div>
                        <div class="divide-y divide-gray-100">
                            <?php
                            // Load RAG Database from theme folder (embedded in zip)
                            $json_path = get_template_directory() . '/rag_database.json';

                            $rag_data = null;
                            if (file_exists($json_path)) {
                                $rag_data = json_decode(file_get_contents($json_path), true);
                            }

                            if ($rag_data && !empty($rag_data['exams'])) {
                                // Flatten concepts to get a random list
                                $all_concepts = [];
                                foreach ($rag_data['exams'] as $exam) {
                                    foreach ($exam['concepts'] as $concept) {
                                        $concept['year'] = $exam['year'];
                                        $concept['subject_name'] = $exam['subject'];
                                        $all_concepts[] = $concept;
                                    }
                                }

                                // Take 2 random concepts
                                shuffle($all_concepts);
                                $todays_quiz = array_slice($all_concepts, 0, 2);

                                foreach ($todays_quiz as $index => $q) {
                                    $unique_id = 'quiz-' . $index;
                                    ?>
                                    <div class="p-6 hover:bg-gray-50 transition group">
                                        <div class="flex items-start gap-4 mb-4">
                                            <div
                                                class="w-10 h-10 rounded-full bg-oblink-blue/10 text-oblink-blue flex items-center justify-center shrink-0 font-bold">
                                                <?php echo substr($q['subject_name'], 0, 1); ?>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between mb-1 relative pr-8">
                                                    <h4 class="font-bold text-gray-900 text-sm">
                                                        <?php echo esc_html($q['topic']); ?> <span
                                                            class="text-gray-400 font-normal">•
                                                            <?php echo esc_html($q['year']); ?></span>
                                                        <?php if (isset($q['year']) && $q['year'] >= 2024): ?>
                                                            <span
                                                                class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-purple-100 text-purple-800 border border-purple-200">
                                                                Réforme 2024
                                                            </span>
                                                        <?php endif; ?>
                                                    </h4>

                                                    <!-- Close Button -->
                                                    <button onclick="this.closest('.group').style.display='none'"
                                                        class="absolute -top-1 -right-1 text-gray-300 hover:text-red-500 transition p-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>

                                                    <!-- Difficulty (moved via flex but kept structure) -->
                                                    <!-- <span class="text-xs text-gray-400">Difficulté: <?php echo str_repeat('★', $q['difficulty']); ?></span> -->
                                                </div>
                                                <div class="flex justify-between mb-3">
                                                    <span class="text-xs text-gray-400">Difficulté:
                                                        <?php echo str_repeat('★', $q['difficulty']); ?></span>
                                                </div>
                                                <p class="text-sm text-gray-800 font-medium mb-3">
                                                    "<?php echo esc_html($q['question_snippet']); ?>"
                                                </p>

                                                <!-- Hidden Answer -->
                                                <div id="<?php echo $unique_id; ?>"
                                                    class="hidden mt-3 p-4 bg-green-50 rounded-xl border border-green-100 text-sm">
                                                    <p class="font-bold text-green-800 mb-1"><i
                                                            class="fas fa-check-circle mr-2"></i>Réponse Officielle :</p>
                                                    <p class="text-gray-700 mb-2">
                                                        <?php echo esc_html($q['official_answer_snippet']); ?>
                                                    </p>

                                                    <?php if (!empty($q['common_mistakes'])): ?>
                                                        <div class="mt-2 pt-2 border-t border-green-200">
                                                            <p class="text-xs font-bold text-red-500 uppercase mb-1">⚠️ Pièges à
                                                                éviter :</p>
                                                            <ul class="list-disc list-inside text-xs text-gray-600">
                                                                <?php foreach ($q['common_mistakes'] as $mistake): ?>
                                                                    <li><?php echo esc_html($mistake); ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <button
                                                    onclick="document.getElementById('<?php echo $unique_id; ?>').classList.toggle('hidden')"
                                                    class="text-xs text-white bg-oblink-blue px-3 py-1.5 rounded-lg font-bold hover:bg-blue-700 transition">
                                                    <i class="fas fa-eye mr-1"></i> Voir la correction
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<div class="p-6 text-center text-gray-500">Aucune donnée de quiz disponible. Lancez l\'extraction IA.</div>';
                            }
                            ?>
                        </div>
                    </div>

                </div>

                <!-- Student-to-Pro Bridge -->
                <div class="bg-gradient-to-br from-oblink-blue to-blue-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold mb-2">Préparez l'Après-Examen</h3>
                            <p class="text-blue-100 text-sm mb-4">Envie de gagner de l'argent cet été ?</p>
                        </div>
                        <i class="fas fa-briefcase text-4xl opacity-30"></i>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
                        <div class="bg-white/10 rounded-lg p-3">
                            <div class="font-bold text-lg">127</div>
                            <div class="text-blue-100 text-xs">Jobs étudiants</div>
                        </div>
                        <div class="bg-white/10 rounded-lg p-3">
                            <div class="font-bold text-lg">€15-25/h</div>
                            <div class="text-blue-100 text-xs">Remplacement</div>
                        </div>
                    </div>
                    <a href="<?php echo home_url('/offres-emploi?filter=etudiant'); ?>"
                        class="block w-full bg-white text-oblink-blue px-4 py-3 rounded-xl font-bold hover:bg-blue-50 transition text-center">
                        <i class="fas fa-search mr-2"></i>Voir les jobs étudiants
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Floating AI Button (FAB) -->
    <button
        class="fixed bottom-8 right-8 w-16 h-16 bg-gradient-to-br from-purple-600 to-indigo-600 rounded-full shadow-2xl flex items-center justify-center text-white text-2xl hover:scale-110 transition z-50 group">
        <i class="fas fa-robot group-hover:animate-bounce"></i>
        <span
            class="absolute -top-12 right-0 bg-gray-900 text-white text-xs font-bold px-3 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
            💬 Bloqué sur un exo ?
        </span>
    </button>

    <?php
    include get_template_directory() . "/footer-content.php";
    wp_footer();
    ?>