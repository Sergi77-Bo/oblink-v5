<?php
/**
 * Template Name: Admin Dashboard
 * 
 * OBLINK CEO OS - Integrated Management System
 * Modules: Pilotage, CRM (Magasins/Opticiens), Sprint Académie, Notes.
 */

// 1. SECURITY & ACCESS
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    wp_redirect(home_url());
    exit;
}

// 2. DATA HANDLERS (Simple JSON Persistence)
// Fix: Data is now INSIDE the theme folder for easier deployment
$data_dir = get_template_directory() . '/academie/data';
if (!file_exists($data_dir))
    mkdir($data_dir, 0755, true);

// Wrapper to get/set data
function oblink_get_json($filename, $default = [])
{
    global $data_dir;
    $file = $data_dir . '/' . $filename;
    if (file_exists($file)) {
        return json_decode(file_get_contents($file), true) ?: $default;
    }
    return $default;
}

// Get All Data
$crm_magasins = oblink_get_json('crm_magasins.json');
$crm_opticiens = oblink_get_json('crm_opticiens.json');
$tasks = oblink_get_json('tasks.json');
$sprint = oblink_get_json('sprint_academy.json');

// Calculate KPIs for Overview
$total_prospects = count(array_filter($crm_magasins, fn($i) => $i['status'] === 'prospect')) +
    count(array_filter($crm_opticiens, fn($i) => $i['status'] === 'prospect'));
$total_active = count(array_filter($crm_magasins, fn($i) => $i['status'] === 'active')) +
    count(array_filter($crm_opticiens, fn($i) => $i['status'] === 'active'));

get_header();
?>

<div class="pt-32 pb-20 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER CEO -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-black text-gray-900">CEO Dashboard <span class="text-oblink-orange">OS</span>
                </h1>
                <p class="text-gray-500">Vue d'ensemble stratégique & opérationnelle</p>
            </div>
            <div class="flex gap-2">
                <button onclick="switchTab('overview')"
                    class="tab-btn active px-4 py-2 rounded-lg font-bold transition bg-white text-oblink-blue shadow-sm"
                    data-tab="overview">
                    🏠 Pilotage
                </button>
                <button onclick="switchTab('crm')"
                    class="tab-btn px-4 py-2 rounded-lg font-bold transition text-gray-500 hover:bg-white"
                    data-tab="crm">
                    🤝 CRM
                </button>
                <button onclick="switchTab('sprint')"
                    class="tab-btn px-4 py-2 rounded-lg font-bold transition text-gray-500 hover:bg-white"
                    data-tab="sprint">
                    🚀 Sprint
                </button>
                <button onclick="switchTab('notes')"
                    class="tab-btn px-4 py-2 rounded-lg font-bold transition text-gray-500 hover:bg-white"
                    data-tab="notes">
                    🧠 Notes
                </button>
            </div>
        </div>

        <!-- TAB 1: OVERVIEW (PILOTAGE) -->
        <div id="tab-overview" class="tab-content block">
            <!-- Flywheel Image -->
            <div class="bg-white p-6 rounded-2xl shadow-sm mb-8 flex justify-center">
                <img src="https://www.genspark.ai/api/files/s/BsR0lB0y?cache_control=3600" alt="Flywheel Strategy"
                    class="max-h-64 rounded-xl">
            </div>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-oblink-blue to-cyan-700 text-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-white/80 font-bold text-sm uppercase">Pipeline Actif</h3>
                    <div class="text-4xl font-black mt-2"><?php echo $total_prospects; ?> Prospects</div>
                    <p class="text-sm mt-2 opacity-80">Magasins & Opticiens en cours</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-green-500">
                    <h3 class="text-gray-400 font-bold text-sm uppercase">Convertis</h3>
                    <div class="text-4xl font-black text-gray-900 mt-2"><?php echo $total_active; ?></div>
                    <p class="text-sm mt-2 text-gray-500">Clients Signés / Placements</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-purple-500">
                    <h3 class="text-gray-400 font-bold text-sm uppercase">Sprint Académie</h3>
                    <div class="text-4xl font-black text-gray-900 mt-2">S3 / S8</div>
                    <p class="text-sm mt-2 text-gray-500">Prochaine étape: Simulateur</p>
                </div>
            </div>
        </div>

        <!-- TAB 2: CRM (KANBAN) -->
        <div id="tab-crm" class="tab-content hidden">
            <div class="flex justify-between mb-4">
                <h2 class="text-2xl font-bold">Pipelines</h2>
                <div class="flex gap-2">
                    <select id="crm-view-select" class="bg-white border text-sm rounded-lg p-2.5"
                        onchange="filterCrmView()">
                        <option value="all">Tout voir</option>
                        <option value="magasin">Magasins</option>
                        <option value="opticien">Opticiens</option>
                    </select>
                    <button class="bg-oblink-blue text-white px-4 py-2 rounded-lg text-sm hover:bg-oblink-dark">
                        <i class="fas fa-plus mr-1"></i> Nouveau
                    </button>
                </div>
            </div>

            <!-- Kanban Board -->
            <div class="grid grid-cols-5 gap-4 overflow-x-auto pb-4 h-[600px]">
                <!-- Columns -->
                <?php
                $columns = [
                    'prospect' => ['label' => 'Prospect', 'color' => 'bg-gray-100'],
                    'contacted' => ['label' => 'Contacté', 'color' => 'bg-blue-50'],
                    'meeting' => ['label' => 'RDV / Entretien', 'color' => 'bg-yellow-50'],
                    'hired' => ['label' => 'Onboardé', 'color' => 'bg-purple-50'],
                    'active' => ['label' => 'Actif / Gagné', 'color' => 'bg-green-50']
                ];

                foreach ($columns as $key => $col):
                    ?>
                    <div class="flex-shrink-0 w-64 flex flex-col <?php echo $col['color']; ?> rounded-xl p-3">
                        <h3 class="font-bold text-gray-700 mb-3 uppercase text-xs tracking-wider">
                            <?php echo $col['label']; ?>
                        </h3>
                        <div class="flex-1 space-y-3 overflow-y-auto crm-column" data-status="<?php echo $key; ?>">

                            <?php
                            // Render Magasins
                            foreach ($crm_magasins as $mag):
                                if ($mag['status'] === $key):
                                    ?>
                                    <div class="bg-white p-3 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition cursor-pointer crm-card"
                                        data-type="magasin">
                                        <div class="flex justify-between items-start">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-[10px] px-2 py-0.5 rounded-full font-bold">MAG</span>
                                            <i class="fas fa-ellipsis-h text-gray-300"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-900 mt-2 text-sm"><?php echo $mag['name']; ?></h4>
                                        <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>
                                            <?php echo $mag['city']; ?></p>
                                        <?php if ($mag['last_contact']): ?>
                                            <p class="text-[10px] text-gray-400 mt-2">Dernier: <?php echo $mag['last_contact']; ?></p>
                                        <?php else: ?>
                                            <p class="text-[10px] text-red-400 mt-2 font-bold">À relancer</p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; endforeach; ?>

                            <?php
                            // Render Opticiens
                            foreach ($crm_opticiens as $opt):
                                if ($opt['status'] === $key):
                                    ?>
                                    <div class="bg-white p-3 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition cursor-pointer crm-card"
                                        data-type="opticien">
                                        <div class="flex justify-between items-start">
                                            <span
                                                class="bg-orange-100 text-oblink-orange text-[10px] px-2 py-0.5 rounded-full font-bold">OPT</span>
                                            <i class="fas fa-ellipsis-h text-gray-300"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-900 mt-2 text-sm"><?php echo $opt['name']; ?></h4>
                                        <p class="text-xs text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>
                                            <?php echo $opt['city']; ?></p>
                                        <?php if ($opt['last_contact']): ?>
                                            <p class="text-[10px] text-gray-400 mt-2">Dernier: <?php echo $opt['last_contact']; ?></p>
                                        <?php else: ?>
                                            <p class="text-[10px] text-red-400 mt-2 font-bold">À relancer</p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; endforeach; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- TAB 3: SPRINT ACADÉMIE -->
        <div id="tab-sprint" class="tab-content hidden">
            <h2 class="text-2xl font-bold mb-6">Roadmap 8 Semaines</h2>

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Semaine</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Module</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Livrable</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deadline</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($sprint as $item): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                    <?php echo $item['week']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <?php echo $item['module']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo $item['deliverable']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo $item['deadline']; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($item['status'] === 'done'): ?>
                                        <span class="text-green-600 font-bold text-sm"><i class="fas fa-check-circle"></i>
                                            Fait</span>
                                    <?php elseif ($item['status'] === 'doing'): ?>
                                        <span class="text-orange-500 font-bold text-sm"><i class="fas fa-spinner fa-spin"></i>
                                            En cours</span>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-sm">À venir</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TAB 4: NOTES -->
        <div id="tab-notes" class="tab-content hidden">
            <h2 class="text-2xl font-bold mb-4">Notes & Décisions</h2>
            <textarea
                class="w-full h-96 p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-oblink-orange outline-none font-mono text-sm"
                placeholder="Journal de bord CEO..."></textarea>
            <button class="mt-4 bg-gray-900 text-white px-6 py-2 rounded-lg font-bold">Sauvegarder</button>
        </div>

    </div>
</div>

<script>
    // Simple Tab Switcher
    function switchTab(tabId) {
        // Buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-white', 'text-oblink-blue', 'shadow-sm');
            btn.classList.add('text-gray-500');
             if (btn.dataset.tab === tabId) {
                btn.classList.add('active', 'bg-white', 'text-oblink-blue', 'shadow-sm');
                btn.classList.remove('text-gray-500');
            }
        });

        // Content
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
            content.classList.remove('block');
        });
        document.getElementById('tab-' + tabId).classList.remove('hidden');
        document.getElementById('tab-' + tabId).classList.add('block');
    }

    // Filters for CRM
    function filterCrmView() {
        const type = document.getElementById('crm-view-select').value;
        document.querySelectorAll('.crm-card').forEach(card => {
            if (type === 'all' || card.dataset.type === type) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<?php get_footer(); ?>