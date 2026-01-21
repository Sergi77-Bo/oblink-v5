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
                            <input type="text" name="address" id="entreprise-address"
                                class="w-full pl-12 pr-16 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                                placeholder="Commencez à taper votre adresse..." required>
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
                        <button type="submit" id="submit-btn"
                            class="px-8 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-oblink-gray transition-all flex items-center gap-2">
                            <i class="fas fa-check mr-2"></i> Créer mon compte
                        </button>
                    </div>
                </div>

                <!-- STEP 3: Offre (TEMPORAIREMENT MASQUÉ) -->
                <div class="form-step hidden" data-step="3" style="display: none !important;">
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
                                        class="text-sm font-normal text-gray-500"> / mois</span></p>
                                <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i>
                                        1ère Annonce Offerte</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i>
                                        Visibilité standard</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i>
                                        <strong>0% Commission</strong> sur salaire
                                    </li>
                                    <li class="flex items-center gap-2"><i class="fas fa-lock text-gray-400"></i>
                                        CV-thèque (Noms masqués)</li>
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
                                        class="text-sm font-normal text-gray-500"> HT / mois</span></p>
                                <ul class="text-sm text-gray-600 space-y-2 mb-4">
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Offres illimitées</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Accès CV-thèque Complet</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        <strong>0% Commission</strong> sur salaire
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 peer-checked:border-oblink-blue peer-checked:bg-oblink-blue flex items-center justify-center transition-colors">
                                <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                            </div>
                        </label>

                        <!-- Plan Corporate -->
                        <label class="relative cursor-pointer group md:col-span-2 mt-4">
                            <input type="radio" name="plan" value="corporate" class="hidden peer">
                            <div
                                class="h-full p-6 rounded-2xl border-2 border-gray-200 bg-white hover:border-oblink-gray peer-checked:border-oblink-gray peer-checked:bg-gray-50 transition-all shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                                <div>
                                    <h3 class="text-xl font-bold text-oblink-gray mb-2">Corporate <span
                                            class="text-sm font-normal text-gray-500 ml-2">(Sur Mesure)</span></h3>
                                    <p class="text-sm text-gray-500 italic mb-2">"Déjà compatible avec les flux RH de
                                        Krys Group et Alain Afflelou."</p>
                                </div>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Multi-comptes & API RH</li>
                                    <li class="flex items-center gap-2"><i class="fas fa-check text-oblink-blue"></i>
                                        Facturation centralisée</li>
                                </ul>
                                <div class="px-4 py-2 bg-gray-100 text-oblink-gray font-bold rounded-lg text-sm">
                                    Contactez-nous
                                </div>
                            </div>
                            <div
                                class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 peer-checked:border-oblink-gray peer-checked:bg-oblink-gray flex items-center justify-center transition-colors">
                                <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                            </div>
                        </label>
                    </div>

                    <!-- Argument 0% Commission -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 mb-8">
                        <div class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-oblink-gray mb-2 flex items-center gap-2">
                                    <i class="fas fa-lightbulb text-yellow-500"></i> Pourquoi 0% de commission ?
                                </h4>
                                <p class="text-sm text-gray-600 text-justify leading-relaxed">
                                    Contrairement aux agences d'intérim qui margent sur chaque heure travaillée (jusqu'à
                                    25%), OBLINK est un pur outil technologique.
                                    <br><strong>Vous ne payez que l'accès (l'abonnement).</strong> L'intégralité de
                                    votre budget va au freelance. Vous payez moins cher, et le candidat gagne mieux sa
                                    vie.
                                </p>
                            </div>
                            <div
                                class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-sm w-full md:w-auto min-w-[300px]">
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b border-gray-100">
                                            <th class="text-left pb-2 text-gray-500 font-medium">Coût / Jour</th>
                                            <th class="text-right pb-2 text-red-400">Agence</th>
                                            <th class="text-right pb-2 text-green-600">OBLINK</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        <tr>
                                            <td class="py-2">Freelance</td>
                                            <td class="text-right">350 €</td>
                                            <td class="text-right font-bold">350 €</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Frais</td>
                                            <td class="text-right text-red-500">+ 80 €</td>
                                            <td class="text-right font-bold text-green-600">0 €</td>
                                        </tr>
                                        <tr class="border-t border-gray-100 font-bold">
                                            <td class="pt-2">TOTAL</td>
                                            <td class="text-right pt-2 text-gray-500 line-through">430 €</td>
                                            <td class="text-right pt-2 text-oblink-blue">350 €</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="text-center text-xs text-green-600 font-bold mt-3">
                                    ~1 600 € d'économie / mois
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details (Conditional) -->
                    <div id="payment-section" class="hidden border-t border-gray-100 pt-6 mb-8 animated fadeIn">
                        <h4 class="font-bold text-oblink-gray mb-4">Paiement Sécurisé</h4>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <div class="flex items-center gap-3 mb-4">
                                <i class="fas fa-credit-card text-gray-400"></i>
                                <input type="text" placeholder="Numéro de carte"
                                    class="bg-white w-full px-3 py-2 rounded-lg border border-gray-200 text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" placeholder="MM/AA"
                                    class="bg-white w-full px-3 py-2 rounded-lg border border-gray-200 text-sm">
                                <input type="text" placeholder="CVC"
                                    class="bg-white w-full px-3 py-2 rounded-lg border border-gray-200 text-sm">
                            </div>
                        </div>
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

        // PAYMENT LOGIC
        const planInputs = document.querySelectorAll('input[name="plan"]');
        const paymentSection = document.getElementById('payment-section');

        function updatePaymentVisibility() {
            const selectedPlan = document.querySelector('input[name="plan"]:checked')?.value;
            if (selectedPlan === 'premium') {
                paymentSection.classList.remove('hidden');
                // Auto scroll to payment if visible
                setTimeout(() => {
                    paymentSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            } else {
                paymentSection.classList.add('hidden');
            }
        }

        planInputs.forEach(input => {
            input.addEventListener('change', updatePaymentVisibility);
        });

        // Init
        updatePaymentVisibility();

        // SUPABASE SUBMISSION
        const form = document.getElementById('entreprise-register-form');

        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const btn = form.querySelector('button[type="submit"]');

            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création...';
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            const formData = new FormData(form);
            const email = formData.get('admin_email');
            const password = formData.get('password');
            const firstName = formData.get('admin_firstname');
            const lastName = formData.get('admin_lastname');

            // CHECK IF SUPABASE CLIENT EXISTS
            if (typeof window.oblinkSupabase === 'undefined') {
                console.error('ERREUR CRITIQUE: window.oblinkSupabase n\'existe pas!');

                const errorDiv = document.getElementById('error-message');
                const errorText = document.getElementById('error-text');
                errorText.textContent = 'Erreur : Le système d\'authentification n\'est pas initialisé. Rechargez la page.';
                errorDiv.classList.remove('hidden');
                errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
                return;
            }

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

                // 2. Success
                const successDiv = document.getElementById('success-message');
                const successText = document.getElementById('success-text');
                successText.textContent = '✅ Compte entreprise créé avec succès ! Redirection...';
                successDiv.classList.remove('hidden');
                successDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

                setTimeout(() => {
                    window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
                }, 1500);

            } catch (error) {
                console.error('Supabase Error:', error);

                const errorDiv = document.getElementById('error-message');
                const errorText = document.getElementById('error-text');
                errorText.textContent = 'Erreur : ' + (error.message || error);
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