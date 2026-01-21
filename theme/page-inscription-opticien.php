<?php
/*
Template Name: Page Inscription Opticien
*/
include 'header-inc.php';
?>

<!-- Auth Protection: Redirect if already logged in -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        if (window.oblinkSupabase) {
            const { data: { session } } = await window.oblinkSupabase.auth.getSession();
            if (session) {
                // Already logged in, redirect to appropriate dashboard
                const userType = session.user.user_metadata?.user_type;
                if (userType === 'opticien') {
                    window.location.href = '<?php echo home_url("/dashboard-opticien"); ?>';
                } else if (userType === 'entreprise') {
                    window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
                } else {
                    window.location.href = '<?php echo home_url("/dashboard"); ?>';
                }
            }
        }
    });
</script>

<div class="min-h-screen bg-oblink-orange-claire/30 pt-32 pb-20 relative overflow-hidden">

    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-10 w-64 h-64 bg-oblink-orange/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-oblink-blue/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 relative z-10">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-4">
                Devenez Opticien <span class="text-oblink-orange">Partenaire</span>
            </h1>
            <p class="text-lg text-oblink-gray/70 max-w-xl mx-auto font-body">
                Rejoignez la première communauté d'opticiens freelances. Trouvez des missions, gérez votre emploi du
                temps et boostez vos revenus.
            </p>
        </div>

        <!-- Multi-step Form Container -->
        <div class="bg-white rounded-[2rem] shadow-2xl border border-white/50 backdrop-blur-xl overflow-hidden">

            <!-- Progress Bar -->
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-oblink-gray uppercase tracking-wider">Progression</span>
                    <span class="text-xs font-bold text-oblink-orange" id="progress-text">Étape 1 sur 3</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-oblink-orange to-oblink-violet h-2 rounded-full transition-all duration-500"
                        style="width: 33%" id="progress-bar"></div>
                </div>
            </div>

            <!-- Success Message -->
            <div id="success-message" class="hidden mx-8 mt-6 p-4 rounded-xl bg-green-50 border border-green-200">
                <div class="flex items-start gap-3">
                    <i class="fas fa-check-circle text-green-500 text-xl mt-0.5"></i>
                    <div>
                        <p class="text-sm font-semibold text-green-700" id="success-text"></p>
                    </div>
                </div>
            </div>

            <!-- Error Message -->
            <div id="error-message" class="hidden mx-8 mt-6 p-4 rounded-xl bg-red-50 border border-red-200">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mt-0.5"></i>
                    <div>
                        <p class="text-sm font-semibold text-red-700" id="error-text"></p>
                    </div>
                </div>
            </div>

            <form id="opticien-register-form" class="p-8 md:p-12">

                <!-- STEP 1: Identité -->
                <!-- Honeypot anti-spam (invisible pour les humains) -->
                <input type="text" name="website" style="position:absolute;left:-9999px;opacity:0;" tabindex="-1"
                    autocomplete="off">

                <div class="form-step active" data-step="1">
                    <h2 class="text-2xl font-bold text-oblink-gray mb-6 font-display flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-orange/20 text-oblink-orange flex items-center justify-center text-sm font-bold">1</span>
                        Créez votre compte
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Prénom</label>
                            <input type="text" name="first_name"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-orange focus:ring-2 focus:ring-oblink-orange/20 outline-none transition"
                                placeholder="Jean" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nom</label>
                            <input type="text" name="last_name"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-orange focus:ring-2 focus:ring-oblink-orange/20 outline-none transition"
                                placeholder="Dupont" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email professionnel</label>
                        <div class="relative">
                            <i
                                class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="email" name="email"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-orange focus:ring-2 focus:ring-oblink-orange/20 outline-none transition"
                                placeholder="jean.dupont@email.com" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Type de poste recherché <span
                                class="text-red-500">*</span></label>
                        <select name="job_type" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-orange focus:ring-2 focus:ring-oblink-orange/20 outline-none transition">
                            <option value="">Sélectionnez votre profil...</option>
                            <optgroup label="💼 En Magasin">
                                <option value="Opticien collaborateur H/F">Opticien collaborateur H/F</option>
                                <option value="Opticien remplaçant H/F">Opticien remplaçant H/F</option>
                                <option value="Opticien en alternance H/F">Opticien en alternance H/F</option>
                                <option value="Opticien directeur, gérant ou responsable H/F">Opticien directeur/gérant
                                    H/F</option>
                                <option value="Opticien tiers payant H/F">Opticien tiers payant H/F</option>
                                <option value="Vendeur H/F">Vendeur H/F</option>
                                <option value="Monteur H/F">Monteur H/F</option>
                                <option value="Monteur-vendeur H/F">Monteur-vendeur H/F</option>
                                <option value="Conseiller vendeur de solaires H/F">Conseiller solaires H/F</option>
                                <option value="Audioprothésiste H/F">Audioprothésiste H/F</option>
                                <option value="Assistant audioprothésiste H/F">Assistant audioprothésiste H/F</option>
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
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Mot de passe</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="password" name="password"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-orange focus:ring-2 focus:ring-oblink-orange/20 outline-none transition"
                                placeholder="••••••••" required>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Au moins 8 caractères, une majuscule et un chiffre.</p>
                    </div>

                    <div class="flex justify-end">
                        <button type="button"
                            class="next-step-btn px-8 py-3 bg-oblink-gray text-white font-bold rounded-xl hover:bg-oblink-orange transition-all flex items-center gap-2">
                            Continuer <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 2: Profil Pro -->
                <div class="form-step hidden" data-step="2">
                    <h2 class="text-2xl font-bold text-oblink-gray mb-6 font-display flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-blue/20 text-oblink-blue flex items-center justify-center text-sm font-bold">2</span>
                        Votre profil pro
                    </h2>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Niveau de diplôme</label>
                        <select name="diploma"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition">
                            <option value="bts">BTS Opticien Lunetier</option>
                            <option value="licence">Licence Pro d'Optique</option>
                            <option value="master">Master Sciences de la Vision</option>
                            <option value="etudiant">Étudiant (Stage/Alternance)</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Années d'expérience</label>
                        <div class="flex gap-4">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="experience" value="junior" class="hidden peer" checked>
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 text-center peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/5 transition">
                                    <span class="block font-bold text-oblink-gray">0-2 ans</span>
                                    <span class="text-xs text-gray-500">Junior</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="experience" value="confirme" class="hidden peer">
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 text-center peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/5 transition">
                                    <span class="block font-bold text-oblink-gray">3-7 ans</span>
                                    <span class="text-xs text-gray-500">Confirmé</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="experience" value="expert" class="hidden peer">
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 text-center peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/5 transition">
                                    <span class="block font-bold text-oblink-gray">8+ ans</span>
                                    <span class="text-xs text-gray-500">Expert</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- NOUVEAU: Logiciels Maîtrisés -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Logiciels Maîtrisés (Cochez tout ce
                            qui s'applique)</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="Cosium" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    Cosium
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="Ivoirnet" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    Ivoirnet
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="Optimum" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    Optimum
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="Ophtix" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    Ophtix
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="WinOptics" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    WinOptics
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="MyEasyOptic" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    MyEasyOptic
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="ProOptic" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    ProOptic
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="software[]" value="Autre" class="hidden peer">
                                <div
                                    class="px-3 py-2 rounded-lg border border-gray-200 text-center text-sm hover:bg-gray-50 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue/10 peer-checked:text-oblink-blue font-medium transition">
                                    Autre
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">CV & Diplômes (Optionnel)</label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-oblink-blue transition cursor-pointer bg-gray-50">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                            <p class="font-medium text-gray-600">Glissez vos fichiers ici ou <span
                                    class="text-oblink-blue underline">cliquez pour parcourir</span></p>
                            <p class="text-xs text-gray-400 mt-2">PDF, JPG, PNG (Max 5Mo)</p>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <button type="button"
                            class="prev-step-btn px-6 py-3 text-gray-500 font-bold hover:text-oblink-gray transition">
                            Retour
                        </button>
                        <button type="button"
                            class="next-step-btn px-8 py-3 bg-oblink-gray text-white font-bold rounded-xl hover:bg-oblink-blue transition-all flex items-center gap-2">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 3: Préférences -->
                <div class="form-step hidden" data-step="3">
                    <h2 class="text-2xl font-bold text-oblink-gray mb-6 font-display flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-violet/20 text-oblink-violet flex items-center justify-center text-sm font-bold">3</span>
                        Vos préférences
                    </h2>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ville principale</label>
                        <div class="relative">
                            <i
                                class="fas fa-map-marker-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="city"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-violet focus:ring-2 focus:ring-oblink-violet/20 outline-none transition"
                                placeholder="Paris, Lyon, Bordeaux..." required>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Mobilité</label>
                        <input type="range"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-oblink-violet"
                            min="0" max="100" step="10" value="20">
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>0 km</span>
                            <span>50 km</span>
                            <span>100 km+</span>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" required
                                class="w-5 h-5 rounded border-gray-300 text-oblink-violet focus:ring-oblink-violet">
                            <span class="text-sm text-gray-600">J'accepte les <a href="#"
                                    class="underline text-oblink-violet">Conditions Générales d'Utilisation</a> et la
                                Politique de Confidentialité.</span>
                        </label>
                    </div>

                    <div class="flex justify-between">
                        <button type="button"
                            class="prev-step-btn px-6 py-3 text-gray-500 font-bold hover:text-oblink-gray transition">
                            Retour
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-oblink-orange to-oblink-violet text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                            Valider mon inscription <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <div class="text-center mt-8">
            <p class="text-gray-500">Déjà inscrit ? <a href="<?php echo home_url('/login'); ?>"
                    class="font-bold text-oblink-orange hover:underline">Connexion</a></p>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('opticien-register-form');
        const steps = document.querySelectorAll('.form-step');
        const nextBtns = document.querySelectorAll('.next-step-btn');
        const prevBtns = document.querySelectorAll('.prev-step-btn');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        let currentStep = 1;

        function updateStep(step) {
            steps.forEach(s => s.classList.add('hidden'));
            steps.forEach(s => s.classList.remove('active'));
            const activeStep = document.querySelector(`.form-step[data-step="${step}"]`);
            activeStep.classList.remove('hidden');

            const percentage = (step / 3) * 100;
            progressBar.style.width = percentage + '%';
            progressText.textContent = `Étape ${step} sur 3`;
            document.querySelector('.bg-white').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep < 3) {
                    const inputs = steps[currentStep - 1].querySelectorAll('input[required]');
                    let valid = true;
                    inputs.forEach(input => {
                        if (!input.value) {
                            valid = false;
                            input.classList.add('border-red-500');
                        } else {
                            input.classList.remove('border-red-500');
                        }
                    });

                    if (valid) {
                        currentStep++;
                        updateStep(currentStep);
                    }
                }
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    updateStep(currentStep);
                }
            });
        });

        // SUPABASE SUBMISSION (Updated)
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création...';
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            const formData = new FormData(form);
            const email = formData.get('email');
            const password = formData.get('password');
            const firstName = formData.get('first_name');
            const lastName = formData.get('last_name');

            // Metadata for Profile
            const metaData = {
                first_name: firstName,
                last_name: lastName,
                full_name: `${firstName} ${lastName}`,
                user_type: 'opticien',
                diploma: formData.get('diploma'),
                experience: formData.get('experience'),
                city: formData.get('city'),
                software_skills: formData.getAll('software[]') // Capture checked software
            };

            try {
                // 1. Sign Up
                const { data, error } = await window.oblinkSupabase.auth.signUp({
                    email: email,
                    password: password,
                    options: {
                        data: metaData
                    }
                });

                if (error) throw error;

                // 2. Wait for session to be fully established (fix race condition)
                let sessionReady = false;
                let attempts = 0;

                while (!sessionReady && attempts < 10) {
                    await new Promise(resolve => setTimeout(resolve, 300));
                    const { data: { session } } = await window.oblinkSupabase.auth.getSession();
                    if (session) {
                        sessionReady = true;
                    }
                    attempts++;
                }

                if (!sessionReady) {
                    throw new Error("Session non établie. Veuillez vous reconnecter.");
                }

                // 3. Success - redirect with active session
                const successDiv = document.getElementById('success-message');
                const successText = document.getElementById('success-text');
                successText.textContent = '✅ Compte créé avec succès ! Redirection vers votre tableau de bord...';
                successDiv.classList.remove('hidden');
                successDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

                setTimeout(() => {
                    window.location.href = '<?php echo home_url("/dashboard-opticien"); ?>';
                }, 1500);

            } catch (error) {
                console.error('Supabase Error:', error);

                // Show inline error
                const errorDiv = document.getElementById('error-message');
                const errorText = document.getElementById('error-text');
                errorText.textContent = 'Erreur : ' + error.message;
                errorDiv.classList.remove('hidden');
                errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>