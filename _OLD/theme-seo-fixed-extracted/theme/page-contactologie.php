<?php
/*
Template Name: Calculateur Contactologie
*/
include 'header-inc.php';

// -----------------------------------------------------------------------------
// 1. DATA SOURCE (V40 Style + Expanded)
// -----------------------------------------------------------------------------
$lenses_db = [
    // === ALCON ===
    ['make' => 'Alcon', 'name' => 'Dailies Total 1', 'type' => 'daily', 'h2o' => '33%', 'modality' => 'daily', 'bc' => [8.5, 9.0], 'toric' => true, 'multifocal' => true, 'dry_eye' => true, 'desc' => 'Confort ultime. Matériau à gradient d\'eau (>80% surf).'],
    ['make' => 'Alcon', 'name' => 'Precision 1', 'type' => 'daily', 'h2o' => '51%', 'modality' => 'daily', 'bc' => [8.3, 8.7], 'toric' => true, 'multifocal' => false, 'dry_eye' => false, 'desc' => 'Excellent rapport qualité/prix.'],
    ['make' => 'Alcon', 'name' => 'Dailies AquaComfort Plus', 'type' => 'daily', 'h2o' => '69%', 'modality' => 'daily', 'bc' => [8.7], 'toric' => true, 'multifocal' => true, 'dry_eye' => false, 'desc' => 'Entrée de gamme hydrogel.'],
    ['make' => 'Alcon', 'name' => 'Air Optix Plus HydraGlyde', 'type' => 'monthly', 'h2o' => '33%', 'modality' => 'monthly', 'bc' => [8.6], 'toric' => true, 'multifocal' => true, 'dry_eye' => true, 'desc' => 'Résiste aux dépôts.'],

    // === JOHNSON & JOHNSON ===
    ['make' => 'J&J', 'name' => 'Acuvue Oasys 1-Day', 'type' => 'daily', 'h2o' => '38%', 'modality' => 'daily', 'bc' => [8.5, 9.0], 'toric' => true, 'multifocal' => false, 'dry_eye' => true, 'desc' => 'Technologie HydraLuxe. Top écrans.'],
    ['make' => 'J&J', 'name' => 'Acuvue Moist 1-Day', 'type' => 'daily', 'h2o' => '58%', 'modality' => 'daily', 'bc' => [8.5, 9.0], 'toric' => true, 'multifocal' => true, 'dry_eye' => false, 'desc' => 'L\'entrée de gamme multifocale historique.'],
    ['make' => 'J&J', 'name' => 'Acuvue Oasys', 'type' => 'biweekly', 'h2o' => '38%', 'modality' => 'biweekly', 'bc' => [8.4, 8.8], 'toric' => true, 'multifocal' => true, 'dry_eye' => true, 'desc' => 'Le standard mondial.'],

    // === COOPERVISION ===
    ['make' => 'Cooper', 'name' => 'MyDay', 'type' => 'daily', 'h2o' => '54%', 'modality' => 'daily', 'bc' => [8.4], 'toric' => true, 'multifocal' => true, 'dry_eye' => false, 'desc' => 'Smart Silicone. Très souple.'],
    ['make' => 'Cooper', 'name' => 'Biofinity', 'type' => 'monthly', 'h2o' => '48%', 'modality' => 'monthly', 'bc' => [8.6], 'toric' => true, 'multifocal' => true, 'dry_eye' => true, 'desc' => 'La référence absolue. Gamme XR dispo.'],
    ['make' => 'Cooper', 'name' => 'Clariti 1 Day', 'type' => 'daily', 'h2o' => '56%', 'modality' => 'daily', 'bc' => [8.6], 'toric' => true, 'multifocal' => true, 'dry_eye' => false, 'desc' => 'SiHy abordable.'],

    // === BAUSCH ===
    ['make' => 'B&L', 'name' => 'Biotrue ONEday', 'type' => 'daily', 'h2o' => '78%', 'modality' => 'daily', 'bc' => [8.6], 'toric' => true, 'multifocal' => true, 'dry_eye' => true, 'desc' => 'Bio-inspirée. 78% d\'eau.'],
    ['make' => 'B&L', 'name' => 'Ultra', 'type' => 'monthly', 'h2o' => '46%', 'modality' => 'monthly', 'bc' => [8.5], 'toric' => true, 'multifocal' => true, 'dry_eye' => true, 'desc' => 'MoistureSeal Technology.'],
];


// -----------------------------------------------------------------------------
// 2. OPTICAL ENGINE (Expert Mode)
// -----------------------------------------------------------------------------
function calculate_vertex($pwr)
{
    if (abs($pwr) < 4.00)
        return $pwr;
    return $pwr / (1 - (0.012 * $pwr)); // Precision calc
}

function process_eye_expert($sphere, $cyl, $axe, $add, $k1, $k2, $modality, $dry, $db)
{
    if ($sphere === '')
        return null;

    $S = floatval($sphere);
    $C = floatval($cyl);
    $A = intval($axe);
    $Add = floatval($add);
    $K1 = floatval($k1);
    $K2 = floatval($k2);

    // --- 1. DESIGN TYPE ---
    $is_multifocal = ($Add >= 0.75);
    $is_toric = (abs($C) >= 0.75);

    $design_label = 'Sphérique';
    if ($is_toric)
        $design_label = 'Torique';
    if ($is_multifocal)
        $design_label = ($is_toric ? 'Torique ' : '') . 'Multifocale';

    // --- 2. POWER CALCULATION ---
    $final_sphere = 0;
    $final_cyl = 0;

    if ($is_toric) {
        // FULL TORIC CALCULATION (Vertex on both meridians)
        $M1 = $S; // First meridian power
        $M2 = $S + $C; // Second meridian power

        $M1_v = calculate_vertex($M1);
        $M2_v = calculate_vertex($M2);

        $final_sphere = round($M1_v * 4) / 4; // Round to 0.25
        $final_cyl = round(($M2_v - $M1_v) * 4) / 4; // Cyl is diff
    } else {
        // SPHERICAL EQUIVALENT (Low Astigmatism)
        // Rule: Sphere + (Cyl / 2) -> Then Vertex
        $SE = $S + ($C / 2);
        $final_sphere = round(calculate_vertex($SE) * 4) / 4;
        $final_cyl = 0;
    }

    // --- 3. BC CALCULATION ---
    $bc_target = 8.6;
    if ($K1 && $K2) {
        $avg_k = ($K1 + $K2) / 2;
        $bc_target = round($avg_k + 0.8, 1);
    }

    // --- 4. FILTERING ---
    $picks = [];
    foreach ($db as $lens) {
        if ($lens['modality'] !== $modality)
            continue;

        // STRICT CAPABILITY CHECK
        if ($is_toric && !$lens['toric'])
            continue;
        if ($is_multifocal && !$lens['multifocal'])
            continue;

        // BC FIT
        $fit = false;
        foreach ($lens['bc'] as $b) {
            if (abs($b - $bc_target) <= 0.35)
                $fit = true;
        }
        if (!$fit)
            continue;

        // Scoring
        $score = 10;
        if ($dry && $lens['dry_eye'])
            $score += 20;
        $lens['score'] = $score;
        $picks[] = $lens;
    }

    usort($picks, function ($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    return [
        'pwr_display' => ($final_sphere > 0 ? '+' : '') . number_format($final_sphere, 2),
        'cyl_display' => $is_toric ? number_format($final_cyl, 2) : null,
        'axe_display' => $is_toric ? $A : null,
        'is_se' => (!$is_toric && abs($C) > 0), // Flag: Is Spherical Equivalent used?
        'bc' => $bc_target,
        'design' => $design_label,
        'picks' => $picks
    ];
}

$od_res = null;
$og_res = null;
$posted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 0. CSRF Protection
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'oblink_contactologie_calc')) {
        wp_die('Action non autorisée (Nonce invalide).');
    }

    $posted = true;
    $dry = isset($_POST['dry_eye']);
    $mod = sanitize_text_field($_POST['modality']);

    // Check if COPY G to D is active (or user clicked "Identique") 
    // Handled by JS on frontend to fill values, but backend processes what it receives.

    // Helper for safe float input
    function get_float_input($key)
    {
        return isset($_POST[$key]) ? floatval($_POST[$key]) : 0;
    }

    // Helper for safe int input
    function get_int_input($key)
    {
        return isset($_POST[$key]) ? intval($_POST[$key]) : 0;
    }

    $od_res = process_eye_expert(get_float_input('od_s'), get_float_input('od_c'), get_int_input('od_a'), get_float_input('od_add'), get_float_input('od_k1'), get_float_input('od_k2'), $mod, $dry, $lenses_db);
    $og_res = process_eye_expert(get_float_input('og_s'), get_float_input('og_c'), get_int_input('og_a'), get_float_input('og_add'), get_float_input('og_k1'), get_float_input('og_k2'), $mod, $dry, $lenses_db);
}
?>

<div class="min-h-screen bg-gray-50 pt-28 pb-20">
    <div class="max-w-[1400px] mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black font-display text-oblink-gray">
                Calculateur <span class="text-oblink-orange">Lentilles Pro</span>
            </h1>
        </div>

        <!-- FORMULAIRE STYLE OPTIEXPERT -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-oblink-blue to-oblink-orange"></div>

            <form method="POST" action="">
                <?php wp_nonce_field('oblink_contactologie_calc'); ?>

                <!-- CONTROLS TOP -->
                <div class="mb-8 border-b border-gray-100 pb-6 space-y-4">
                    <div class="flex flex-wrap gap-4 items-center">
                        <label
                            class="flex items-center gap-2 cursor-pointer bg-gray-50 px-4 py-2 rounded-lg border border-gray-200 hover:border-oblink-orange transition">
                            <input type="checkbox" name="dry_eye"
                                class="text-oblink-orange focus:ring-oblink-orange rounded" <?php echo isset($_POST['dry_eye']) ? 'checked' : ''; ?>>
                            <span class="font-bold text-gray-700">Sécheresse Oculaire</span>
                        </label>
                        <select name="modality"
                            class="px-4 py-2 bg-gray-50 rounded-lg font-bold border border-gray-200 outline-none focus:border-oblink-orange">
                            <option value="daily" <?php echo (isset($_POST['modality']) && $_POST['modality'] === 'daily') ? 'selected' : ''; ?>>
                                Journalières (Daily)</option>
                            <option value="monthly" <?php echo ($_POST['modality'] ?? '') === 'monthly' ? 'selected' : ''; ?>>Mensuelles (Monthly)</option>
                            <option value="biweekly" <?php echo ($_POST['modality'] ?? '') === 'biweekly' ? 'selected' : ''; ?>>Bi-mensuelles</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full md:w-auto bg-oblink-gray text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                        Calculer l'équipement
                    </button>
                </div>

                <div class="grid lg:grid-cols-2 gap-16 relative">
                    <!-- SEPARATOR LINE -->
                    <div class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-px bg-gray-100 -ml-px"></div>

                    <!-- OD COL -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div
                                class="w-10 h-10 rounded-full bg-oblink-blue text-white flex items-center justify-center font-bold text-lg shadow-md shadow-blue-200">
                                D</div>
                            <h3 class="text-xl font-bold text-oblink-blue">Œil Droit</h3>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">Sphère</label>
                                    <input type="number" step="0.25" placeholder="-2.00" name="od_s"
                                        value="<?php echo esc_attr($_POST['od_s'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-lg font-mono focus:border-oblink-blue outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">Cylindre</label>
                                    <input type="number" step="0.25" placeholder="-0.75" name="od_c"
                                        value="<?php echo esc_attr($_POST['od_c'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-lg font-mono focus:border-oblink-blue outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">Axe °</label>
                                    <input type="number" placeholder="180" name="od_a"
                                        value="<?php echo esc_attr($_POST['od_a'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-lg font-mono focus:border-oblink-blue outline-none transition">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-1 border-r border-gray-100 pr-4">
                                    <label
                                        class="text-xs font-bold text-oblink-blue uppercase mb-1 block">Addition</label>
                                    <input type="number" step="0.25" placeholder="+2.00" name="od_add"
                                        value="<?php echo esc_attr($_POST['od_add'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-blue-50/50 border border-blue-100 rounded-lg text-lg font-mono focus:border-oblink-blue outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">K1
                                        (Plat)</label>
                                    <input type="number" step="0.01" placeholder="7.80" name="od_k1"
                                        value="<?php echo esc_attr($_POST['od_k1'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm font-mono focus:border-oblink-blue outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">K2
                                        (Cambré)</label>
                                    <input type="number" step="0.01" placeholder="7.60" name="od_k2"
                                        value="<?php echo esc_attr($_POST['od_k2'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm font-mono focus:border-oblink-blue outline-none transition">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- OG COL -->
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-oblink-orange text-white flex items-center justify-center font-bold text-lg shadow-md shadow-orange-200">
                                    G</div>
                                <h3 class="text-xl font-bold text-oblink-orange">Œil Gauche</h3>
                            </div>
                            <label
                                class="flex items-center gap-2 cursor-pointer text-sm text-gray-500 hover:text-oblink-orange">
                                <input type="checkbox" id="copy_od"
                                    class="rounded text-oblink-orange focus:ring-oblink-orange" onclick="copyODtoOG()">
                                Copier OD
                            </label>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">Sphère</label>
                                    <input type="number" step="0.25" placeholder="-2.00" name="og_s" id="og_s"
                                        value="<?php echo esc_attr($_POST['og_s'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-lg font-mono focus:border-oblink-orange outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">Cylindre</label>
                                    <input type="number" step="0.25" placeholder="-0.75" name="og_c" id="og_c"
                                        value="<?php echo esc_attr($_POST['og_c'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-lg font-mono focus:border-oblink-orange outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">Axe °</label>
                                    <input type="number" placeholder="180" name="og_a" id="og_a"
                                        value="<?php echo esc_attr($_POST['og_a'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-lg font-mono focus:border-oblink-orange outline-none transition">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-1 border-r border-gray-100 pr-4">
                                    <label
                                        class="text-xs font-bold text-oblink-orange uppercase mb-1 block">Addition</label>
                                    <input type="number" step="0.25" placeholder="+2.00" name="og_add" id="og_add"
                                        value="<?php echo esc_attr($_POST['og_add'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-orange-50/50 border border-orange-100 rounded-lg text-lg font-mono focus:border-oblink-orange outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">K1
                                        (Plat)</label>
                                    <input type="number" step="0.01" placeholder="7.80" name="og_k1" id="og_k1"
                                        value="<?php echo esc_attr($_POST['og_k1'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm font-mono focus:border-oblink-orange outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase mb-1 block">K2
                                        (Cambré)</label>
                                    <input type="number" step="0.01" placeholder="7.60" name="og_k2" id="og_k2"
                                        value="<?php echo esc_attr($_POST['og_k2'] ?? ''); ?>"
                                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm font-mono focus:border-oblink-orange outline-none transition">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php if ($posted): ?>
            <div class="grid lg:grid-cols-2 gap-8">

                <!-- RESULT OD -->
                <?php if ($od_res): ?>
                    <div>
                        <div
                            class="bg-oblink-blue/10 rounded-t-2xl p-4 border-b border-oblink-blue/20 flex justify-between items-center">
                            <h3 class="font-black text-oblink-blue text-lg">LENTILLES DROITES (OD)</h3>
                            <div class="flex flex-col items-end">
                                <span class="text-2xl font-mono font-bold text-oblink-blue leading-none">
                                    <?php echo $od_res['pwr_display']; ?>
                                    <?php if ($od_res['cyl_display'])
                                        echo '<span class="text-lg text-gray-600">(' . $od_res['cyl_display'] . ')</span> ' . $od_res['axe_display'] . '°'; ?>
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mt-1">
                                    BC: <?php echo $od_res['bc']; ?> • <?php echo $od_res['design']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="bg-white rounded-b-2xl shadow-lg border border-gray-100 p-6 space-y-4">
                            <?php if ($od_res['is_se']): ?>
                                <div class="p-3 bg-yellow-50 text-yellow-800 text-xs rounded-lg mb-4 flex gap-2">
                                    <i class="fas fa-info-circle mt-0.5"></i>
                                    <div>Astigmatisme faible (<0.75). La puissance a été convertie en <b>Équivalent Sphérique</b>
                                            (Sph + Cyl/2) pour optimiser la vision.</div>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($od_res['picks'] as $p): ?>
                                <div
                                    class="flex items-start gap-4 p-4 border border-gray-100 rounded-xl hover:shadow-md transition group bg-white">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center font-bold text-gray-300 text-xl group-hover:bg-oblink-blue group-hover:text-white transition">
                                        <?php echo substr($p['make'], 0, 1); ?>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg"><?php echo $p['name']; ?></h4>
                                        <p class="text-sm text-gray-500 mb-2"><?php echo $p['make']; ?> • <?php echo $p['h2o']; ?>
                                            H2O</p>
                                        <p class="text-xs text-oblink-blue italic bg-blue-50 inline-block px-2 py-1 rounded">
                                            <?php echo $p['desc']; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- RESULT OG -->
                <?php if ($og_res): ?>
                    <div>
                        <div
                            class="bg-oblink-orange/10 rounded-t-2xl p-4 border-b border-oblink-orange/20 flex justify-between items-center">
                            <h3 class="font-black text-oblink-orange text-lg">LENTILLES GAUCHES (OG)</h3>
                            <div class="flex flex-col items-end">
                                <span class="text-2xl font-mono font-bold text-oblink-orange leading-none">
                                    <?php echo $og_res['pwr_display']; ?>
                                    <?php if ($og_res['cyl_display'])
                                        echo '<span class="text-lg text-gray-600">(' . $og_res['cyl_display'] . ')</span> ' . $og_res['axe_display'] . '°'; ?>
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mt-1">
                                    BC: <?php echo $og_res['bc']; ?> • <?php echo $og_res['design']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="bg-white rounded-b-2xl shadow-lg border border-gray-100 p-6 space-y-4">
                            <?php if ($og_res['is_se']): ?>
                                <div class="p-3 bg-yellow-50 text-yellow-800 text-xs rounded-lg mb-4 flex gap-2">
                                    <i class="fas fa-info-circle mt-0.5"></i>
                                    <div>Astigmatisme faible (<0.75). La puissance a été convertie en <b>Équivalent Sphérique</b>
                                            (Sph + Cyl/2) pour optimiser la vision.</div>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($og_res['picks'] as $p): ?>
                                <div
                                    class="flex items-start gap-4 p-4 border border-gray-100 rounded-xl hover:shadow-md transition group bg-white">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center font-bold text-gray-300 text-xl group-hover:bg-oblink-orange group-hover:text-white transition">
                                        <?php echo substr($p['make'], 0, 1); ?>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg"><?php echo $p['name']; ?></h4>
                                        <p class="text-sm text-gray-500 mb-2"><?php echo $p['make']; ?> • <?php echo $p['h2o']; ?>
                                            H2O</p>
                                        <p class="text-xs text-oblink-orange italic bg-orange-50 inline-block px-2 py-1 rounded">
                                            <?php echo $p['desc']; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function copyODtoOG() {
        if (document.getElementById('copy_od').checked) {
            document.getElementById('og_s').value = document.getElementsByName('od_s')[0].value;
            document.getElementById('og_c').value = document.getElementsByName('od_c')[0].value;
            document.getElementById('og_a').value = document.getElementsByName('od_a')[0].value;
            document.getElementById('og_add').value = document.getElementsByName('od_add')[0].value;
            document.getElementById('og_k1').value = document.getElementsByName('od_k1')[0].value;
            document.getElementById('og_k2').value = document.getElementsByName('od_k2')[0].value;
        }
    }

    // Mobile Accordion Toggle
    const toggleBtn = document.getElementById('toggle-calculator');
    const calcFields = document.getElementById('calculator-fields');
    const toggleIcon = document.getElementById('toggle-icon');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            calcFields.classList.toggle('hidden');
            calcFields.classList.toggle('grid');
            toggleIcon.classList.toggle('rotate-180');

            if (calcFields.classList.contains('hidden')) {
                toggleBtn.querySelector('span').textContent = 'Afficher les champs de saisie';
            } else {
                toggleBtn.querySelector('span').textContent = 'Masquer les champs de saisie';
            }
        });
    }
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>