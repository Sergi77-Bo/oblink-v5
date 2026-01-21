<?php
/*
Template Name: Emploi Opticien V2 (Premium UI)
Description: Matching Dashboard with Job Cards, TJM focus, and Real-time filters.
*/
include 'header-inc.php';
?>

<style>
    /* Gradient Text */
    .text-gradient {
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-image: linear-gradient(90deg, #FF6600, #9A48D0);
    }

    /* Glassmorphism Cards */
    .job-card-glass {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .job-card-glass:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        border-color: rgba(255, 102, 0, 0.3);
    }

    /* Soft Badge */
    .badge-soft {
        padding: 4px 12px;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 0.025em;
    }

    /* Filter Chips */
    .filter-chip {
        transition: all 0.2s;
    }

    .filter-chip:hover {
        transform: translateY(-1px);
    }

    .filter-chip.active {
        background: #303030;
        color: white;
        border-color: #303030;
    }
</style>

<div class="min-h-screen bg-gray-50/50 pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER: Matching Dashboard -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-6">
            <div>
                <span
                    class="inline-block py-1 px-3 rounded-full bg-oblink-orange/10 text-oblink-orange font-bold text-xs mb-3 uppercase tracking-wider">
                    <i class="fas fa-bolt mr-1"></i> Live Matching
                </span>
                <h1 class="text-3xl md:text-5xl font-black text-oblink-gray">
                    Missions <span class="text-gradient">Compatibles</span>
                </h1>
                <p class="text-gray-500 mt-2 font-medium">
                    24 missions correspondent à votre profil "Expert Cosium" à <span
                        class="text-oblink-gray font-bold">Paris</span> (30km).
                </p>
            </div>

            <!-- ZONE C: Flash Post Button (Pour les recruteurs en vue inversée, ou CTA général) -->
            <div class="flex gap-3">
                <a href="<?php echo home_url('/publier-offre'); ?>"
                    class="group relative px-6 py-4 bg-oblink-gray text-white rounded-2xl font-bold shadow-lg shadow-gray-200 overflow-hidden transition-all hover:scale-105">
                    <div
                        class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shimmer">
                    </div>
                    <span class="relative flex items-center gap-2">
                        <i class="fas fa-plus-circle text-oblink-orange"></i>
                        Déposer une mission Flash
                    </span>
                </a>
            </div>
        </div>

        <!-- ZONE A: FILTRES INTELLIGENTS (Métiers) -->
        <div
            class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 mb-10 sticky top-24 z-30 backdrop-blur-md bg-white/90">
            <div class="flex flex-col md:flex-row gap-6 items-center justify-between">

                <!-- Logiciels -->
                <div class="flex flex-wrap gap-2 items-center">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wide mr-2">Logiciels :</span>
                    <button
                        class="filter-chip px-4 py-2 rounded-xl border border-gray-200 text-gray-600 font-bold text-sm bg-white hover:border-oblink-blue active"
                        data-filter="software" data-value="all">Tous</button>
                    <button
                        class="filter-chip px-4 py-2 rounded-xl border border-gray-200 text-gray-600 font-bold text-sm bg-white hover:border-oblink-blue"
                        data-filter="software" data-value="Cosium">Cosium</button>
                    <button
                        class="filter-chip px-4 py-2 rounded-xl border border-gray-200 text-gray-600 font-bold text-sm bg-white hover:border-oblink-blue"
                        data-filter="software" data-value="Ivoirnet">Ivoirnet</button>
                    <button
                        class="filter-chip px-4 py-2 rounded-xl border border-gray-200 text-gray-600 font-bold text-sm bg-white hover:border-oblink-blue"
                        data-filter="software" data-value="WinOptics">WinOptics</button>
                </div>

                <div class="w-px h-8 bg-gray-200 hidden md:block"></div>

                <!-- Urgence & Type -->
                <div class="flex flex-wrap gap-2 items-center">
                    <button
                        class="filter-chip px-4 py-2 rounded-xl border border-red-100 text-red-500 font-bold text-sm bg-red-50/50 hover:bg-red-500 hover:text-white transition-colors"
                        data-filter="urgent" data-value="true">
                        <i class="fas fa-fire mr-1"></i> Urgent (24h)
                    </button>
                    <button
                        class="filter-chip px-4 py-2 rounded-xl border border-gray-200 text-gray-600 font-bold text-sm bg-white"
                        data-filter="type" data-value="remplacement">Remplacement</button>
                </div>

            </div>
        </div>

        <!-- ZONE B: LES CARTES D'ANNONCES (Grid) -->
        <div id="jobs-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Jobs injected via JS -->
        </div>

        <!-- Pagination -->
        <div id="pagination" class="flex justify-center mt-12 gap-2"></div>

    </div>
</div>

<script>
    // --- 15-20 REALISTIC MOCK MISSIONS ---
    const MISSIONS = [
        { id: 1, title: "Remplacement Opticien Diplômé", company: "Optic 2000", city: "Paris 15", software: "Cosium", tjm: 450, urgent: true, expert_required: true, type: "Remplacement", date: "Demain" },
        { id: 2, title: "Renfort Samedi Vente", company: "Afflelou", city: "Boulogne-Billancourt", software: "Cosium", tjm: 350, urgent: true, expert_required: false, type: "Intérim", date: "Samedi" },
        { id: 3, title: "Responsable Atelier (1 semaine)", company: "Krys", city: "Lyon 2", software: "Ivoirnet", tjm: 500, urgent: false, expert_required: true, type: "Remplacement", date: "22 Jan" },
        { id: 4, title: "Opticien Réfractionniste", company: "Indépendant", city: "Bordeaux", software: "WinOptics", tjm: 550, urgent: false, expert_required: true, type: "Audit", date: "25 Jan" },
        { id: 5, title: "Remplacement Congé Maladie", company: "Grand Optical", city: "Paris 08", software: "Cosium", tjm: 480, urgent: true, expert_required: true, type: "Remplacement", date: "Aujourd'h." },
        { id: 6, title: "Vendeur Lunettier", company: "Jimmy Fairly", city: "Lille", software: "PVO", tjm: 320, urgent: false, expert_required: false, type: "Intérim", date: "01 Fév" },
        { id: 7, title: "Expert Contactologie", company: "Lissac", city: "Strasbourg", software: "Ivoirnet", tjm: 600, urgent: false, expert_required: true, type: "Expertise", date: "10 Fév" },
        { id: 8, title: "Opticien Collaborateur", company: "Optical Center", city: "Toulouse", software: "WinOptics", tjm: 400, urgent: false, expert_required: false, type: "CDD Court", date: "15 Fév" },
        { id: 9, title: "Mission Urgente 3 jours", company: "Indépendant", city: "Marseille", software: "Cosium", tjm: 500, urgent: true, expert_required: true, type: "Remplacement", date: "Ce jeudi" },
        { id: 10, title: "Audit Tiers-Payant", company: "Réseau Santé", city: "Nantes", software: "Ivoirnet", tjm: 450, urgent: false, expert_required: true, type: "Audit", date: "Mars" },
        { id: 11, title: "Remplacement Directeur", company: "Atol", city: "Nice", software: "Cosium", tjm: 650, urgent: false, expert_required: true, type: "Management", date: "Avril" },
        { id: 12, title: "Vente Solaire Renfort", company: "Solaris", city: "Cannes", software: "PVO", tjm: 300, urgent: false, expert_required: false, type: "Saisonnier", date: "Mai" },
        { id: 13, title: "Optométriste Confirmé", company: "Santé Clair", city: "Paris 11", software: "WinOptics", tjm: 580, urgent: false, expert_required: true, type: "Consulting", date: "Juin" },
        { id: 14, title: "Remplacement maternité", company: "Ecouter Voir", city: "Rennes", software: "Cosium", tjm: 420, urgent: false, expert_required: true, type: "Remplacement", date: "Sept" },
        { id: 15, title: "Formateur en Magasin", company: "Zeiss", city: "Toute France", software: "Cosium", tjm: 700, urgent: false, expert_required: true, type: "Formation", date: "Oct" }
    ];

    let activeFilters = {
        software: 'all',
        urgent: false,
        type: 'all'
    };

    function renderJobs() {
        const container = document.getElementById('jobs-container');
        container.innerHTML = '';

        const filtered = MISSIONS.filter(m => {
            if (activeFilters.software !== 'all' && m.software !== activeFilters.software) return false;
            if (activeFilters.urgent && !m.urgent) return false;
            // Type filter logic matches on "string contains" for demo simplicity
            if (activeFilters.type !== 'all' && !m.type.toLowerCase().includes(activeFilters.type.toLowerCase())) return false;
            return true;
        });

        if (filtered.length === 0) {
            container.innerHTML = `<div class="col-span-3 text-center py-20">
                <div class="text-6xl mb-4">🤷‍♂️</div>
                <h3 class="text-xl font-bold text-gray-400">Aucune mission ne correspond.</h3>
                <button onclick="resetFilters()" class="mt-4 text-oblink-blue font-bold hover:underline">Réinitialiser les filtres</button>
            </div>`;
            return;
        }

        filtered.forEach(job => {
            const card = document.createElement('div');
            card.className = 'job-card-glass rounded-3xl p-6 relative flex flex-col h-full group cursor-pointer'; // Added cursor-pointer
            card.onclick = () => { // Add onclick handler
                window.location.href = '<?php echo home_url('/mission-detail'); ?>?id=' + job.id;
            };

            // Badge Software Color
            let softColor = "bg-gray-100 text-gray-600";
            if (job.software === "Cosium") softColor = "bg-blue-50 text-blue-600 border border-blue-100";
            if (job.software === "Ivoirnet") softColor = "bg-purple-50 text-purple-600 border border-purple-100";
            if (job.software === "WinOptics") softColor = "bg-orange-50 text-orange-600 border border-orange-100";

            card.innerHTML = `
                <div class="flex justify-between items-start mb-4">
                    <span class="badge-soft ${softColor} flex items-center gap-1">
                        <i class="fas fa-desktop text-xs"></i> ${job.software}
                    </span>
                    ${job.urgent ? `
                    <span class="badge-soft bg-red-500 text-white animate-pulse shadow-red-200 shadow-lg">
                        <i class="fas fa-bolt mr-1"></i> Urgent
                    </span>` : `<span class="text-xs font-bold text-gray-400">${job.date}</span>`}
                </div>

                <div class="mb-auto">
                    <h3 class="font-bold text-xl text-oblink-gray mb-1 group-hover:text-oblink-orange transition-colors">${job.title}</h3>
                    <p class="text-sm text-gray-500 font-medium flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-gray-300"></i> ${job.city}
                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                        ${job.company}
                    </p>
                </div>

                <div class="mt-6 pt-6 border-t border-gray-100 flex items-end justify-between">
                    <div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">TJM PROPOSÉ</div>
                        <div class="text-3xl font-black text-oblink-gray group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-oblink-orange group-hover:to-oblink-violet transition-all">
                            ${job.tjm}€<span class="text-sm text-gray-400 font-medium ml-1">/j</span>
                        </div>
                    </div>
                    
                    ${job.expert_required ? `
                        <div class="flex flex-col items-end">
                             <div class="w-10 h-10 rounded-full bg-gradient-to-br from-oblink-orange to-oblink-violet flex items-center justify-center text-white shadow-lg tooltip-trigger" title="Certification Expert Requise">
                                <i class="fas fa-certificate"></i>
                             </div>
                             <span class="text-[10px] font-bold text-oblink-gray mt-1">Expert Only</span>
                        </div>
                    ` : `
                        <button class="w-10 h-10 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center group-hover:bg-oblink-blue group-hover:text-white transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    `}
                </div>
            `;
            container.appendChild(card);
        });
    }

    // Filter Logic
    document.querySelectorAll('.filter-chip').forEach(btn => {
        btn.addEventListener('click', function () {
            const filterType = this.dataset.filter;
            const value = this.dataset.value;

            // Update UI
            if (filterType === 'software') {
                document.querySelectorAll('[data-filter="software"]').forEach(b => b.classList.remove('active', 'bg-oblink-gray', 'text-white', 'border-transparent'));
                // Reset generic style on all
                document.querySelectorAll('[data-filter="software"]').forEach(b => b.classList.add('bg-white', 'text-gray-600', 'border-gray-200'));

                // Active Style
                this.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');
                this.classList.add('active', 'bg-oblink-gray', 'text-white', 'border-transparent');
                activeFilters.software = value;
            }

            if (filterType === 'urgent') {
                this.classList.toggle('ring-2');
                this.classList.toggle('ring-red-300');
                activeFilters.urgent = !activeFilters.urgent;
            }

            if (filterType === 'type') {
                // Simple toggle for demo
                activeFilters.type = activeFilters.type === 'remplacement' ? 'all' : 'remplacement';
                this.classList.toggle('bg-gray-100');
            }

            renderJobs();
        });
    });

    function resetFilters() {
        activeFilters = { software: 'all', urgent: false, type: 'all' };
        document.querySelectorAll('.filter-chip').forEach(b => {
            // Reset UI styles... simplified for demo
            b.classList.remove('active', 'ring-2', 'ring-red-300', 'bg-oblink-gray', 'text-white');
            if (b.dataset.filter === 'software' && b.dataset.value === 'all') b.classList.add('active', 'bg-oblink-gray', 'text-white');
        });
        renderJobs();
    }

    // Init
    document.addEventListener('DOMContentLoaded', renderJobs);

</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>