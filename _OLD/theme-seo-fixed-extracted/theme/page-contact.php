<?php
/**
 * Template Name: Contact
 */
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12">
            <div
                class="inline-block px-3 py-1 bg-oblink-blue/10 text-oblink-blue font-bold rounded-full text-xs uppercase tracking-wider mb-3">
                Contact & Support
            </div>
            <h1 class="text-4xl md:text-5xl font-bold font-display text-oblink-gray mb-4">
                Nous sommes là pour vous aider
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Une question ? Besoin d'assistance ? Notre équipe vous répondra dans les plus brefs délais.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Envoyez-nous un message</h2>

                <form id="contact-form" class="space-y-5">

                    <!-- Honeypot (Anti-spam) -->
                    <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nom complet <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none"
                            placeholder="Jean Dupont" />
                        <span class="error-message text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none"
                            placeholder="jean.dupont@example.com" />
                        <span class="error-message text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Subject -->
                    <div class="form-group">
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sujet <span class="text-red-500">*</span>
                        </label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none">
                            <option value="">Choisissez un sujet...</option>
                            <option value="support">Support technique</option>
                            <option value="partnership">Partenariat</option>
                            <option value="billing">Facturation & Abonnements</option>
                            <option value="general">Question générale</option>
                            <option value="feedback">Suggestion / Feedback</option>
                        </select>
                        <span class="error-message text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" name="message" required rows="6"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 transition outline-none resize-none"
                            placeholder="Décrivez votre demande en détail..."></textarea>
                        <span class="error-message text-red-500 text-sm mt-1 hidden"></span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submit-btn"
                        class="w-full px-6 py-4 bg-oblink-blue text-white font-bold rounded-xl hover:bg-oblink-blue/90 transition-all duration-300 shadow-lg shadow-oblink-blue/20 flex items-center justify-center gap-2">
                        <span id="btn-text">Envoyer le message</span>
                        <i class="fas fa-paper-plane" id="btn-icon"></i>
                    </button>
                </form>

                <!-- Success/Error Messages -->
                <div id="form-success" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-600 text-xl mt-0.5"></i>
                        <div>
                            <h3 class="font-bold text-green-900 mb-1">Message envoyé !</h3>
                            <p class="text-sm text-green-700">Nous vous répondrons dans les 24-48 heures.</p>
                        </div>
                    </div>
                </div>

                <div id="form-error" class="hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-exclamation-circle text-red-600 text-xl mt-0.5"></i>
                        <div>
                            <h3 class="font-bold text-red-900 mb-1">Erreur d'envoi</h3>
                            <p class="text-sm text-red-700" id="error-text">Une erreur est survenue. Veuillez réessayer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info & FAQ -->
            <div class="space-y-6">

                <!-- Contact Info Card -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Autres moyens de contact</h3>

                    <!-- Email -->
                    <div class="flex items-start gap-4 mb-5">
                        <div
                            class="w-10 h-10 rounded-xl bg-oblink-blue/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-oblink-blue"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                            <a href="mailto:contact@oblink.fr" class="text-oblink-blue hover:underline">
                                contact@oblink.fr
                            </a>
                            <p class="text-sm text-gray-500 mt-1">Réponse sous 24-48h</p>
                        </div>
                    </div>

                    <!-- Support -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-oblink-orange/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-life-ring text-oblink-orange"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Support</h4>
                            <p class="text-gray-600 text-sm">
                                Consultez notre <a href="<?php echo home_url('/blog'); ?>"
                                    class="text-oblink-blue hover:underline">blog</a>
                                pour des guides et tutoriels.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick FAQ -->
                <div class="bg-gradient-to-br from-oblink-blue to-blue-600 rounded-3xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-4">Questions fréquentes</h3>

                    <div class="space-y-4">
                        <div>
                            <h4 class="font-semibold mb-1">Combien de temps pour une réponse ?</h4>
                            <p class="text-sm text-blue-100">Nous répondons sous 24-48 heures ouvrées.</p>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-1">Comment modifier mon abonnement ?</h4>
                            <p class="text-sm text-blue-100">
                                Connectez-vous à votre <a href="<?php echo home_url('/dashboard-entreprise'); ?>"
                                    class="underline hover:text-white">espace entreprise</a>.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold mb-1">Problème de connexion ?</h4>
                            <p class="text-sm text-blue-100">
                                Utilisez la récupération de mot de passe sur la <a
                                    href="<?php echo home_url('/login'); ?>" class="underline hover:text-white">page de
                                    connexion</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contact-form');
        const submitBtn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnIcon = document.getElementById('btn-icon');
        const successMsg = document.getElementById('form-success');
        const errorMsg = document.getElementById('form-error');
        const errorText = document.getElementById('error-text');

        // Real-time validation
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', () => validateField(input));
            input.addEventListener('input', () => {
                if (input.classList.contains('border-red-500')) {
                    validateField(input);
                }
            });
        });

        function validateField(field) {
            const formGroup = field.closest('.form-group');
            const errorSpan = formGroup.querySelector('.error-message');
            let isValid = true;
            let errorMessage = '';

            // Reset styles
            field.classList.remove('border-red-500');
            errorSpan.classList.add('hidden');

            // Check required
            if (field.hasAttribute('required') && !field.value.trim()) {
                isValid = false;
                errorMessage = 'Ce champ est requis';
            }

            // Email validation
            if (field.type === 'email' && field.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value)) {
                    isValid = false;
                    errorMessage = 'Email invalide';
                }
            }

            // Show error if invalid
            if (!isValid) {
                field.classList.add('border-red-500');
                errorSpan.textContent = errorMessage;
                errorSpan.classList.remove('hidden');
            }

            return isValid;
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Validate all fields
            let formValid = true;
            inputs.forEach(input => {
                if (input.name !== 'website') { // Skip honeypot
                    if (!validateField(input)) {
                        formValid = false;
                    }
                }
            });

            if (!formValid) return;

            // Check honeypot (anti-spam)
            if (form.querySelector('[name="website"]').value) {
                console.log('Spam detected');
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            btnText.textContent = 'Envoi en cours...';
            btnIcon.className = 'fas fa-spinner fa-spin';
            successMsg.classList.add('hidden');
            errorMsg.classList.add('hidden');

            // Prepare form data
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value,
            };

            try {
                // Send email via WordPress AJAX
                const response = await fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'send_contact_form',
                        ...formData
                    })
                });

                const result = await response.json();

                if (result.success) {
                    // Show success message
                    successMsg.classList.remove('hidden');
                    form.reset();

                    // Scroll to success message
                    successMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else {
                    throw new Error(result.data?.message || 'Erreur d\'envoi');
                }

            } catch (error) {
                console.error('Contact form error:', error);
                errorText.textContent = error.message || 'Une erreur est survenue. Veuillez réessayer ou nous contacter directement à contact@oblink.fr';
                errorMsg.classList.remove('hidden');
                errorMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                btnText.textContent = 'Envoyer le message';
                btnIcon.className = 'fas fa-paper-plane';
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php"; ?>
<?php wp_footer(); ?>
</body>

</html>