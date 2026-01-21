<?php
/*
Template Name: Page Inscription Entreprise
*/
include 'header-inc.php';
?>

<div class="min-h-screen bg-oblink-blue/5 pt-32 pb-20 relative overflow-hidden">

    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-10 w-96 h-96 bg-oblink-blue/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-64 h-64 bg-oblink-violet/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 relative z-10">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-4">
                Recrutez vos <span class="text-oblink-blue">Opticiens</span>
            </h1>
            <p class="text-lg text-oblink-gray/70 max-w-xl mx-auto font-body">
                Inscrivez votre magasin en 2 minutes et accédez instantanément à notre vivier d'opticiens vérifiés.
            </p>
        </div>

        <!-- Multi-step Form Container -->
        <div class="bg-white rounded-[2rem] shadow-2xl border border-white/50 backdrop-blur-xl overflow-hidden">

            <!-- Progress Bar -->
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-oblink-gray uppercase tracking-wider">Progression</span>
                    <span class="text-xs font-bold text-oblink-blue" id="progress-text">Étape 1 sur 3</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-oblink-blue to-oblink-violet h-2 rounded-full transition-all duration-500"
                        style="width: 33%" id="progress-bar"></div>
                </div>
            </div>

            <form id="entreprise-register-form" class="p-8 md:p-12">

                <!-- STEP 1: Entreprise -->
                <div class="form-step active" data-step="1">
                    <h2 class="text-2xl font-bold text-oblink-gray mb-6 font-display flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-blue/20 text-oblink-blue flex items-center justify-center text-sm font-bold">1</span>
                        Votre Entreprise
                    </h2>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Raison Sociale / Nom du
                            Magasin</label>
                        <input type="text" name="company_name"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                            placeholder="Ex: Optic 2000 - Centre Villagio" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Numéro SIRET</label>
                        <input type="text" name="siret"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                            placeholder="14 chiffres" required>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Adresse Principale</label>
                        <div class="relative">
                            <i
                                class="fas fa-map-marker-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="address"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                                placeholder="12 rue de la Paix, 75000 Paris" required>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="button"
                            class="next-step-btn px-8 py-3 bg-oblink-gray text-white font-bold rounded-xl hover:bg-oblink-blue transition-all flex items-center gap-2">
                            Continuer <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 2: Contact Admin -->
                <div class="form-step hidden" data-step="2">
                    <h2 class="text-2xl font-bold text-oblink-gray mb-6 font-display flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-violet/20 text-oblink-violet flex items-center justify-center text-sm font-bold">2</span>
                        Administrateur du compte
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Prénom</label>
                            <input type="text" name="admin_firstname"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                                placeholder="Marie" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nom</label>
                            <input type="text" name="admin_lastname"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                                placeholder="Curie" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email de connexion</label>
                        <input type="email" name="admin_email"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                            placeholder="marie@optic2000.com" required>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Mot de passe</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                            placeholder="••••••••" required>
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

                <!-- STEP 3: Offre -->
                <div class="form-step hidden" data-step="3">
                    <h2 class="text-2xl font-bold text-oblink-gray mb-6 font-display flex items-center gap-3">
                        <span
                            class="w-8 h-8 rounded-full bg-oblink-orange/20 text-oblink-orange flex items-center justify-center text-sm font-bold">3</span>
                        Choisissez votre formule
                    </h2>

                    <div class="grid md:grid-cols-2 gap-4 mb-8">
                        <!-- Plan Gratuit -->
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="plan" value="free" class="hidden peer" checked>
                            <div
                                class="h-full p-6 rounded-2xl border-2 border-gray-200 bg-white hover:border-gray-300 peer-checked:border-oblink-gray peer-checked:bg-gray-50 transition-all shadow-sm">
                                <h3 class="text-xl font-bold text-oblink-gray mb-2">Découverte</h3>
                                <p class="text-3xl font-black text-oblink-gray mb-4">0 €<span
                                        class="text-sm font-normal text-gray-500">/mois</span></p>
                                <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> 1
                                        Offre d'emploi</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i>
                                        Visibilité standard</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i>
                                        Commission standard</li>
                                </ul>
                            </div>
                            <div
                                class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 peer-checked:border-oblink-gray peer-checked:bg-oblink-gray flex items-center justify-center transition-colors">
                                <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                            </div>
                        </label>

                        <!-- Plan Premium -->
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="plan" value="premium" class="hidden peer">
                            <div
                                class="h-full p-6 rounded-2xl border-2 border-gray-200 bg-white hover:border-oblink-blue peer-checked:border-oblink-blue peer-checked:bg-blue-50/50 transition-all shadow-sm">
                                <div
                                    class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-oblink-blue text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                    Recommandé</div>
                                <h3 class="text-xl font-bold text-oblink-blue mb-2">Premium</h3>
                                <p class="text-3xl font-black text-oblink-gray mb-4">49 €<span
                                        class="text-sm font-normal text-gray-500">/mois</span></p>
                                <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Offres illimitées</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Accès CV-thèque</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Commission réduite</li>
                                </ul>
                            </div>
                            <div
                                class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue flex items-center justify-center transition-colors">
                                <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                            </div>
                        </label>
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="button"
                            class="prev-step-btn px-6 py-3 text-gray-500 font-bold hover:text-oblink-gray transition">
                            Retour
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-oblink-blue to-oblink-violet text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                            Créer mon compte Entreprise <i class="fas fa-building"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <div class="text-center mt-8">
            <p class="text-gray-500">Vous avez déjà un compte ? <a href="<?php echo home_url('/login'); ?>"
                    class="font-bold text-oblink-blue hover:underline">Connectez-vous</a></p>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Reuse the same logic as opticien form for stepper
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

            document.querySelector('form').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Add validation here if needed
                if (currentStep < 3) {
                    currentStep++;
                    updateStep(currentStep);
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

        // SUPABASE SUBMISSION (Updated with DEBUG)
        const form = document.getElementById('entreprise-register-form');

        console.log('DEBUG: Form element:', form);

        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            console.log('DEBUG: Submit event fired!');

            const btn = form.querySelector('button[type="submit"]');
            console.log('DEBUG: Submit button:', btn);

            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création...';
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            const formData = new FormData(form);
            const email = formData.get('admin_email');
            const password = formData.get('password');
            const firstName = formData.get('admin_firstname');
            const lastName = formData.get('admin_lastname');

            console.log('DEBUG: Form values:', { email, firstName, lastName });

            // CHECK IF SUPABASE CLIENT EXISTS
            if (typeof window.oblinkSupabase === 'undefined') {
                console.error('ERREUR CRITIQUE: window.oblinkSupabase n\'existe pas!');
                alert('Erreur: Le système n\'est pas initialisé. Rechargez la page.');
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
                return;
            }

            console.log('DEBUG: Supabase client exists:', window.oblinkSupabase);

            // Metadata for Profile (Entreprise)
            const metaData = {
                first_name: firstName,
                last_name: lastName,
                full_name: `${firstName} ${lastName}`,
                company_name: formData.get('company_name'),
                siret: formData.get('siret'),
                address: formData.get('address'),
                user_type: 'entreprise',
                plan: formData.get('plan')
            };

            console.log('DEBUG: Metadata:', metaData);

            try {
                console.log('DEBUG: Calling signUp...');
                // 1. Sign Up
                const { data, error } = await window.oblinkSupabase.auth.signUp({
                    email: email,
                    password: password,
                    options: {
                        data: metaData
                    }
                });

                console.log('DEBUG: signUp response:', { data, error });

                if (error) throw error;

                // 2. Success
                alert('Compte Entreprise créé avec succès ! Bienvenue sur OBLINK.');
                window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';

            } catch (error) {
                console.error('Supabase Error:', error);
                alert('Erreur: ' + (error.message || error));
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>