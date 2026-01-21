<?php
/*
Template Name: Page Publier Offre
*/
include 'header-inc.php';

// Protection removed to allow Supabase client-side auth
// if (!is_user_logged_in()) { wp_redirect... }
?>

<!-- Auth Loading State -->
<div id="auth-loading" class="min-h-screen bg-gray-50 flex flex-col items-center justify-center pt-20">
    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-oblink-orange mb-4"></div>
    <p class="text-gray-500 font-medium">Vérification de vos accès...</p>
</div>

<!-- Protected Content (Hidden by default) -->
<div id="auth-protected-content" class="min-h-screen bg-gray-50 pt-24 pb-12 hidden">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8 text-center">
            <a href="<?php echo home_url('/dashboard-entreprise'); ?>"
                class="inline-flex items-center text-gray-500 hover:text-oblink-blue mb-4 transition">
                <i class="fas fa-arrow-left mr-2"></i> Retour au Dashboard
            </a>
            <h1 class="text-3xl font-bold font-display text-oblink-gray">Publier une nouvelle mission</h1>
            <p class="text-gray-500 mt-2">Trouvez le candidat idéal en quelques clics.</p>
        </div>

        <!-- Formulaire -->
        <form id="publish-offer-form" class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="p-8 space-y-8">

                <!-- Quick Templates (New Feature) -->
                <div class="bg-blue-50 p-4 rounded-2xl mb-6 border border-blue-100">
                    <h3 class="text-sm font-bold text-blue-800 mb-3"><i class="fas fa-bolt mr-2"></i>Remplissage Rapide
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="fillTemplate('rempla')"
                            class="px-3 py-1.5 bg-white text-blue-600 text-xs font-bold rounded-lg hover:bg-blue-100 border border-blue-200 transition">
                            Remplacement Été
                        </button>
                        <button type="button" onclick="fillTemplate('cdi')"
                            class="px-3 py-1.5 bg-white text-blue-600 text-xs font-bold rounded-lg hover:bg-blue-100 border border-blue-200 transition">
                            CDI Collaborateur
                        </button>
                        <button type="button" onclick="fillTemplate('samedi')"
                            class="px-3 py-1.5 bg-white text-blue-600 text-xs font-bold rounded-lg hover:bg-blue-100 border border-blue-200 transition">
                            Renfort Samedi
                        </button>
                    </div>
                </div>

                <!-- Section 1: Le Poste -->
                <div>
                    <h2 class="text-xl font-bold text-oblink-gray mb-4 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-blue/10 text-oblink-blue flex items-center justify-center text-sm mr-3">1</span>
                        Détails du poste
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label for="job_title" class="block text-sm font-bold text-gray-700 mb-1">Intitulé de la
                                mission</label>
                            <input type="text" id="job_title" name="job_title"
                                placeholder="Ex: Opticien Collaborateur / Remplaçant..." required aria-required="true"
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition font-bold text-oblink-gray placeholder-gray-400 validate-input">
                        </div>

                        <div>
                            <label for="job_type" class="block text-sm font-bold text-gray-700 mb-1">Type de poste
                                recherché <span class="text-red-500">*</span></label>
                            <select id="job_type" name="job_type" required aria-required="true"
                                aria-describedby="job_type_help"
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition font-medium cursor-pointer validate-input">
                                <optgroup label="💼 En Magasin">
                                    <option value="Opticien collaborateur H/F">Opticien collaborateur H/F</option>
                                    <option value="Opticien remplaçant H/F">Opticien remplaçant H/F</option>
                                    <option value="Opticien en alternance H/F">Opticien en alternance H/F</option>
                                    <option value="Opticien directeur, gérant ou responsable H/F">Opticien
                                        directeur/gérant H/F</option>
                                    <option value="Opticien tiers payant H/F">Opticien tiers payant H/F</option>
                                    <option value="Vendeur H/F">Vendeur H/F</option>
                                    <option value="Monteur H/F">Monteur H/F</option>
                                    <option value="Monteur-vendeur H/F">Monteur-vendeur H/F</option>
                                    <option value="Conseiller vendeur de solaires H/F">Conseiller solaires H/F</option>
                                    <option value="Audioprothésiste H/F">Audioprothésiste H/F</option>
                                    <option value="Assistant audioprothésiste H/F">Assistant audioprothésiste H/F
                                    </option>
                                    <option value="Adaptateur de lentilles H/F">Adaptateur de lentilles H/F</option>
                                </optgroup>
                                <optgroup label="🚗 Nomades / Terrain">
                                    <option value="Opticien à domicile H/F">Opticien à domicile H/F</option>
                                    <option value="Agent - Commercial - VRP H/F">Agent VRP H/F</option>
                                    <option value="Animateur réseau H/F">Animateur réseau H/F</option>
                                    <option value="Responsable de secteur H/F">Responsable de secteur H/F</option>
                                </optgroup>
                                <optgroup label="👔 Experts / Management">
                                    <option value="Responsable technique H/F">Responsable technique H/F</option>
                                    <option value="Optométriste H/F">Optométriste H/F</option>
                                    <option value="Directeur des ventes H/F">Directeur des ventes H/F</option>
                                    <option value="Chef de produits H/F">Chef de produits H/F</option>
                                </optgroup>
                                <optgroup label="🩺 Autres Professions">
                                    <option value="Orthoptiste H/F">Orthoptiste H/F</option>
                                    <option value="AMO (Assistant médical ophta) H/F">AMO (Assistant médical ophta) H/F
                                    </option>
                                    <option value="Enseignant H/F">Enseignant optique H/F</option>
                                    <option value="Autre en magasin H/F">Autre en magasin H/F</option>
                                    <option value="Autre H/F">Autre profession H/F</option>
                                </optgroup>
                            </select>
                            <p id="job_type_help" class="text-xs text-gray-400 mt-1">Choisissez le profil qui correspond
                                le mieux à votre
                                besoin</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="contract_type" class="block text-sm font-bold text-gray-700 mb-1">Type de
                                    contrat</label>
                                <select id="contract_type" name="contract_type"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition font-medium cursor-pointer validate-input">
                                    <option value="cdd">CDD (Remplacement)</option>
                                    <option value="cdi">CDI</option>
                                    <option value="freelance">Freelance / Vacation</option>
                                    <option value="stage">Stage / Alternance</option>
                                </select>
                            </div>
                            <div>
                                <label for="salary" class="block text-sm font-bold text-gray-700 mb-1">Salaire / Taux
                                    journalier</label>
                                <div class="relative">
                                    <input type="number" id="salary" name="salary" placeholder="Ex: 350" required
                                        aria-required="true" aria-describedby="salary_help"
                                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition validate-input">
                                    <span class="absolute right-4 top-3 text-gray-400 font-bold">€</span>
                                </div>
                                <p id="salary_help" class="text-xs text-gray-400 mt-1">Montant brut ou journalier
                                    (chiffre uniquement)
                                </p>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-bold text-gray-700 mb-1">Description du
                                poste</label>
                            <textarea id="description" name="description" rows="4"
                                placeholder="Décrivez les missions, l'ambiance, les avantages..."
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition text-sm validate-input"></textarea>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Section 2: Planning & Lieu -->
                <div>
                    <h2 class="text-xl font-bold text-oblink-gray mb-4 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-violet/10 text-oblink-violet flex items-center justify-center text-sm mr-3">2</span>
                        Planning & Lieu
                    </h2>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-bold text-gray-700 mb-1">Date de
                                    début</label>
                                <input type="date" id="start_date" name="start_date" required aria-required="true"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition validate-input">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-bold text-gray-700 mb-1">Date de fin
                                    (Optionnel)</label>
                                <input type="date" id="end_date" name="end_date"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition validate-input">
                            </div>
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-bold text-gray-700 mb-1">Ville</label>
                            <input type="text" id="location" name="location" placeholder="Ex: Paris" required
                                aria-required="true"
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition validate-input">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-bold text-gray-700 mb-1">Adresse complète
                                (Privé)</label>
                            <input type="text" id="address" name="address"
                                placeholder="Ex: 15 rue de Rivoli, 75004 Paris" aria-describedby="address_help"
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition">
                            <p id="address_help" class="text-xs text-gray-400 mt-1">L'adresse exacte ne sera communiquée
                                qu'aux candidats
                                validés.</p>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Section 3: Compétences (Logiciels) -->
                <div>
                    <h2 class="text-xl font-bold text-oblink-gray mb-4 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-orange/10 text-oblink-orange flex items-center justify-center text-sm mr-3">3</span>
                        Logiciel utilisé
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="Cosium" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">Cosium</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="Ivoirnet" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">Ivoirnet</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="Optimum" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">Optimum</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="Ophtix" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">Ophtix</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="WinOptics" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">WinOptics</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="MyEasyOptic" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">MyEasyOptic</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="skills[]" value="ProOptic" class="peer hidden">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">ProOptic</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group relative">
                            <input type="checkbox" name="skills[]" value="Autre" class="peer hidden"
                                id="skill-other-checkbox" onchange="toggleOtherSkillInput(this)">
                            <div
                                class="p-3 bg-gray-50 rounded-xl text-center border-2 border-transparent peer-checked:border-oblink-orange peer-checked:bg-orange-50 transition">
                                <span
                                    class="font-bold text-sm text-gray-600 peer-checked:text-oblink-orange">Autre</span>
                            </div>
                        </label>
                    </div>
                    <!-- Input caché pour 'Autre' -->
                    <div id="skill-other-container" class="mt-3 hidden">
                        <label for="skill-other-input" class="block text-sm font-bold text-gray-700 mb-1">Précisez le
                            logiciel</label>
                        <input type="text" id="skill-other-input" placeholder="Ex: PHOENIX, LEO..."
                            class="w-full px-4 py-2 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-oblink-blue focus:ring-0 transition text-sm font-bold text-gray-700">
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Section 4: Options Payantes (Boost) -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 border border-yellow-100">
                    <h2 class="text-xl font-bold text-oblink-gray mb-4 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center text-sm mr-3"><i
                                class="fas fa-rocket"></i></span>
                        Options de Visibilité
                    </h2>

                    <div class="space-y-3">
                        <label
                            class="flex items-start p-4 bg-white rounded-xl border border-yellow-100 cursor-pointer hover:border-yellow-300 transition">
                            <input type="checkbox" name="options[]" value="urgent"
                                class="mt-1 w-5 h-5 text-oblink-orange rounded focus:ring-oblink-orange border-gray-300">
                            <div class="ml-3">
                                <span class="block font-bold text-gray-800">Logo "URGENT" <span
                                        class="bg-yellow-100 text-yellow-700 text-xs px-2 py-0.5 rounded ml-2">10€</span></span>
                                <span class="block text-sm text-gray-500">Mettez un logo urgent pour démarquer votre
                                    annonce pendant 30 jours.</span>
                            </div>
                        </label>

                        <label
                            class="flex items-start p-4 bg-white rounded-xl border border-yellow-100 cursor-pointer hover:border-yellow-300 transition">
                            <input type="checkbox" name="options[]" value="top_list"
                                class="mt-1 w-5 h-5 text-oblink-orange rounded focus:ring-oblink-orange border-gray-300">
                            <div class="ml-3">
                                <span class="block font-bold text-gray-800">Remontée en tête de liste <span
                                        class="bg-yellow-100 text-yellow-700 text-xs px-2 py-0.5 rounded ml-2">15€</span></span>
                                <span class="block text-sm text-gray-500">Remontez votre annonce en haut des résultats
                                    chaque semaine.</span>
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <!-- Footer Actions -->
            <div
                class="bg-gray-50 px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-gray-100">
                <p class="text-xs text-gray-400 text-center md:text-left">
                    <i class="fas fa-info-circle mr-1"></i> Votre offre sera soumise à validation.
                </p>
                <div class="flex gap-4 w-full md:w-auto">
                    <a href="<?php echo home_url('/dashboard-entreprise'); ?>"
                        class="flex-1 md:flex-none py-3 px-6 rounded-xl font-bold text-gray-500 hover:bg-gray-200 text-center transition">
                        Annuler
                    </a>
                    <button type="submit" id="submit-btn"
                        class="flex-1 md:flex-none py-3 px-8 bg-oblink-blue text-white rounded-xl font-bold hover:bg-oblink-gray transition shadow-lg shadow-blue-200">
                        Publier l'offre
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>

<!-- Auth Guard: Redirect to login if not authenticated -->
<script>
    (async function () {
        try {
            // Wait for Supabase to be ready (with timeout)
            let attempts = 0;
            while (!window.oblinkSupabase && attempts < 20) {
                await new Promise(resolve => setTimeout(resolve, 100));
                attempts++;
            }

            if (!window.oblinkSupabase) {
                window.location.href = '<?php echo home_url('/login?redirect=/publier-offre'); ?>';
                return;
            }

            // Check session
            const { data: { session }, error } = await window.oblinkSupabase.auth.getSession();

            if (!session) {
                window.location.href = '<?php echo home_url('/login?redirect=/publier-offre'); ?>';
                return;
            }

            // Check if user is an entreprise (Matches Dashboard Logic)
            const userType = session.user.user_metadata?.user_type;

            if (userType && userType !== 'entreprise') {
                alert('Cette page est réservée aux entreprises. Redirection...');
                window.location.href = '<?php echo home_url('/'); ?>';
                return;
            }

            // User is authenticated and is an entreprise - show the form
            document.getElementById('auth-loading').classList.add('hidden');
            document.getElementById('auth-protected-content').classList.remove('hidden');
        } catch (error) {
            console.error('[PUBLIER-OFFRE] ❌ Error:', error);
            window.location.href = '<?php echo home_url('/login?redirect=/publier-offre'); ?>';
        }
    })();
</script>

<script>
    window.fillTemplate = function (type) {
        const form = document.querySelector('form');
        const typeSelect = form.querySelector('[name="contract_type"]');

        if (type === 'rempla') {
            form.querySelector('[name="job_title"]').value = 'Opticien Remplaçant (Juillet/Août)';
            typeSelect.value = 'cdd';
            form.querySelector('[name="salary"]').value = '350';
            form.querySelector('[name="location"]').value = 'Paris';
            form.querySelector('[name="description"]').value = 'Cherche remplaçant autonome pour la période estivale. Magasin de quartier, ambiance familiale. Logiciel WinOptics. Horaires : 10h-19h.';
        } else if (type === 'cdi') {
            form.querySelector('[name="job_title"]').value = 'Opticien Collaborateur Polyvalent';
            typeSelect.value = 'cdi';
            form.querySelector('[name="salary"]').value = '2600.00';
            form.querySelector('[name="description"]').value = 'Poste polyvalent (Vente, Atelier, Réfraction, Tiers-Payant). Nous cherchons un profil dynamique et souriant pour rejoindre notre équipe de 4 opticiens.';
        } else if (type === 'samedi') {
            form.querySelector('[name="job_title"]').value = 'Renfort Samedi';
            typeSelect.value = 'freelance';
            form.querySelector('[name="salary"]').value = '300';
            form.querySelector('[name="description"]').value = 'Besoin d\'un renfort pour les samedis. Forte affluence. Vente uniquement. Repas pris en charge.';
        }

        // Trigger change event to update date validation
        typeSelect.dispatchEvent(new Event('change'));

        // Visual feedback
        const btn = event.target;
        const originalText = btn.innerText;
        btn.innerText = 'Rempli !';
        btn.classList.add('bg-green-500', 'text-white', 'border-green-500');
        btn.classList.remove('bg-white', 'text-blue-600');
        setTimeout(() => {
            btn.innerText = originalText;
            btn.classList.remove('bg-green-500', 'text-white', 'border-green-500');
            btn.classList.add('bg-white', 'text-blue-600');
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const typeSelect = document.querySelector('select[name="contract_type"]');
        const endDateInput = document.querySelector('input[name="end_date"]');
        const endDateLabel = endDateInput.previousElementSibling; // Label est juste avant
        const form = document.getElementById('publish-offer-form');
        const submitBtn = document.getElementById('submit-btn');

        function updateDateFields() {
            const val = typeSelect.value;
            // CDD ou Freelance = Date de fin requise
            if (val === 'cdd' || val === 'freelance') {
                endDateInput.required = true;
                endDateLabel.innerHTML = "Date de fin <span class='text-red-500'>*</span>";
                endDateLabel.classList.add('text-oblink-orange');
            } else {
                // CDI ou Stage = Optionnel
                endDateInput.required = false;
                endDateLabel.innerHTML = "Date de fin (Optionnel)";
                endDateLabel.classList.remove('text-oblink-orange');
            }
        }

        typeSelect.addEventListener('change', updateDateFields);
        updateDateFields(); // Run on init

        // Toggle function explicitly global for inline calls
        window.toggleOtherSkillInput = function (checkbox) {
            const container = document.getElementById('skill-other-container');
            const input = document.getElementById('skill-other-input');
            if (checkbox.checked) {
                container.classList.remove('hidden');
                setTimeout(() => input.focus(), 100);
            } else {
                container.classList.add('hidden');
                input.value = '';
            }
        };

        // Live Validation Logic
        const inputs = document.querySelectorAll('.validate-input');
        inputs.forEach(input => {
            // Validate on blur
            input.addEventListener('blur', () => validateField(input));
            // Validate on input if already touched (user correction)
            input.addEventListener('input', () => {
                if (input.classList.contains('touched')) validateField(input);
            });
        });

        function validateField(input) {
            input.classList.add('touched');
            let isValid = input.checkValidity();

            if (isValid) {
                input.classList.remove('border-red-500', 'bg-red-50');
                input.classList.add('border-green-500', 'bg-green-50');
            } else {
                input.classList.remove('border-green-500', 'bg-green-50');
                input.classList.add('border-red-500', 'bg-red-50');
            }
            return isValid;
        }

        // Supabase Submission
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            // UI Loading
            const originalBtnContent = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Publication...';
            submitBtn.disabled = true;

            try {
                // 1. Check Session
                const { data: { session } } = await window.oblinkSupabase.auth.getSession();
                if (!session) {
                    throw new Error("Vous devez être connecté pour publier une offre.");
                }
                const user = session.user;

                // Collect Options
                const options = [];
                form.querySelectorAll('input[name="options[]"]:checked').forEach(cb => options.push(cb.value));

                // Collect Skills (Software)
                const software = [];
                form.querySelectorAll('input[name="skills[]"]:checked').forEach(cb => {
                    if (cb.value === 'Autre') {
                        const otherVal = document.getElementById('skill-other-input').value.trim();
                        if (otherVal) software.push(otherVal);
                    } else {
                        software.push(cb.value);
                    }
                });

                // Prepare Data for Upsert
                // FIX: Parsons le salaire pour éviter "numeric field overflow" si une chaine vide ou format incorrect est envoyé
                let salaryVal = parseFloat(form.querySelector('[name="salary"]').value);
                if (isNaN(salaryVal)) salaryVal = 0; // Default to 0 or handle error

                const offerData = {
                    company_id: user.id, // Linked to auth.users.id which maps to profiles.id via trigger usually, or we use profile id
                    title: form.querySelector('[name="job_title"]').value,
                    job_type: form.querySelector('[name="job_type"]').value, // NEW: Type de poste
                    contract_type: form.querySelector('[name="contract_type"]').value,
                    salary: salaryVal, // Numeric
                    city: form.querySelector('[name="location"]').value,
                    address: form.querySelector('[name="address"]').value, // Optional
                    description: form.querySelector('[name="description"]').value,
                    skills_needed: software, // We store software in skills_needed array
                    start_date: form.querySelector('[name="start_date"]').value,
                    end_date: form.querySelector('[name="end_date"]').value || null,
                    status: 'active',
                    is_urgent: options.includes('urgent'),
                    is_top_list: options.includes('top_list')
                };

                // 3. Insert into Supabase
                const { data, error } = await window.oblinkSupabase
                    .from('offers')
                    .insert([offerData])
                    .select();

                if (error) throw error;

                // 4. Success
                // Global Toast (if available) or redirect
                if (typeof showToast === 'function') {
                    showToast('Offre publiée avec succès !', 'success');
                }

                // 5. TRIGGER NOTIFICATION SYSTEM (Email/SMS to Experts)
                const formData = new FormData();
                formData.append('action', 'trigger_mission_alert');
                formData.append('title', offerData.title);
                formData.append('city', offerData.city);
                formData.append('type', offerData.job_type);
                formData.append('salary', offerData.salary);

                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    body: formData
                }).then(res => res.json()).then(res => {
                    if (res.success) {
                        // Display the reassuring message from the backend (Matching Engine)
                        alert("✅ SUCCÈS : L'offre est en ligne !\n📲 " + res.data.message);
                    }
                });

                // Redirect to Dashboard
                setTimeout(() => {
                    window.location.href = '<?php echo home_url('/dashboard-entreprise?success=job_posted'); ?>';
                }, 1000);

            } catch (err) {
                console.error('Error publishing offer:', err);
                alert('Erreur: ' + (err.message || "Impossible de publier l'offre."));
                submitBtn.innerHTML = originalBtnContent;
                submitBtn.disabled = false;
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>