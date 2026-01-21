<?php
/*
Template Name: Connexion
*/

include 'header-inc.php';
?>

<div class="bg-oblink-beige/20 min-h-screen pt-32 pb-20 flex items-center justify-center">
    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 max-w-lg w-full">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-oblink-gray mb-3" style="font-family: 'Montserrat', sans-serif;">
                Connexion
            </h1>
            <p class="text-oblink-gray/70">Accédez à votre espace OBLINK</p>
        </div>

        <!-- Contextual Auth Message -->
        <div id="auth-message" class="hidden mb-6 p-4 rounded-xl bg-oblink-blue/10 border border-oblink-blue/20">
            <div class="flex items-start gap-3">
                <i class="fas fa-info-circle text-oblink-blue mt-0.5"></i>
                <div>
                    <p class="text-sm font-semibold text-oblink-gray" id="auth-message-text"></p>
                </div>
            </div>
        </div>

        <!-- Error Message -->
        <div id="login-error" class="hidden mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                <div>
                    <p class="text-sm font-semibold text-red-700" id="login-error-text"></p>
                </div>
            </div>
        </div>

        <form id="supabase-login-form" class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-oblink-gray mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                    placeholder="votre@email.com">
            </div>
            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-sm font-semibold text-oblink-gray">
                        Mot de passe <span class="text-red-500">*</span>
                    </label>
                    <a href="#" id="forgot-password-link" class="text-xs text-oblink-orange hover:underline">Mot de
                        passe oublié ?</a>
                </div>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full px-6 py-4 bg-oblink-orange text-white rounded-lg hover:bg-oblink-orange/90 transition font-semibold shadow-lg flex justify-center items-center gap-2">
                Se connecter <i class="fas fa-sign-in-alt"></i>
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-oblink-beige text-center">
            <p class="text-sm text-oblink-gray/70">
                Vous n'avez pas de compte ?<br>
                <a href="<?php echo home_url('/inscription-opticien'); ?>"
                    class="text-oblink-orange font-semibold hover:underline">Inscription Opticien</a>
                <span class="mx-2 text-gray-300">|</span>
                <a href="<?php echo home_url('/inscription-entreprise'); ?>"
                    class="text-oblink-blue font-semibold hover:underline">Inscription Entreprise</a>
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('supabase-login-form');
        const authMessage = document.getElementById('auth-message');
        const authMessageText = document.getElementById('auth-message-text');

        // Check for redirect parameter and show contextual message
        const urlParams = new URLSearchParams(window.location.search);
        const redirect = urlParams.get('redirect');

        if (redirect) {
            const messages = {
                '/publier-offre': '⚠️ Vous devez être connecté pour publier une offre',
                '/dashboard-opticien': '⚠️ Connectez-vous pour accéder à votre tableau de bord opticien',
                '/dashboard-entreprise': '⚠️ Connectez-vous pour accéder à votre espace entreprise',
                '/dashboard': '⚠️ Connectez-vous pour accéder à votre tableau de bord',
                '/parametres': '⚠️ Connectez-vous pour accéder aux paramètres',
            };

            authMessageText.textContent = messages[redirect] || '⚠️ Vous devez être connecté pour accéder à cette page';
            authMessage.classList.remove('hidden');
        }

        // Forgot password handler
        document.getElementById('forgot-password-link').addEventListener('click', function (e) {
            e.preventDefault();
            const errorDiv = document.getElementById('login-error');
            const errorText = document.getElementById('login-error-text');
            errorText.textContent = 'Fonctionnalité de réinitialisation en cours de développement. Contactez contact@oblink.fr';
            errorDiv.classList.remove('hidden');
            errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });

        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connexion...';
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            const email = form.querySelector('input[name="email"]').value;
            const password = form.querySelector('input[name="password"]').value;

            try {
                console.log('[LOGIN] Starting authentication...');

                // 1. Sign In
                const { data, error } = await window.oblinkSupabase.auth.signInWithPassword({
                    email: email,
                    password: password
                });

                if (error) throw error;

                // 2. Get FRESH session to ensure metadata is loaded
                const { data: { session } } = await window.oblinkSupabase.auth.getSession();

                if (!session) {
                    throw new Error('Session introuvable après connexion');
                }

                const user = session.user;
                const userType = user.user_metadata?.user_type;

                console.log('[LOGIN] ✅ Authentification réussie');
                console.log('[LOGIN] User Type:', userType);
                console.log('[LOGIN] User Metadata:', user.user_metadata);

                // 3. Check for redirect parameter
                const urlParams = new URLSearchParams(window.location.search);
                const redirectTo = urlParams.get('redirect');

                // 4. Determine redirect URL (SECURE WHITELIST)
                let redirectUrl;

                // Allowed paths whitelist (Open Redirect Protection)
                const ALLOWED_PATHS = [
                    '/publier-offre',
                    '/dashboard-opticien',
                    '/dashboard-entreprise',
                    '/dashboard',
                    '/parametres',
                    '/mon-compte'
                ];

                if (redirectTo) {
                    // Sanitize redirect path (remove domain if present to force local)
                    let cleanPath = redirectTo;
                    try {
                        const urlObj = new URL(redirectTo, window.location.origin);
                        if (urlObj.origin === window.location.origin) {
                            cleanPath = urlObj.pathname;
                        } else {
                            cleanPath = ''; // Block external domains
                        }
                    } catch (e) {
                        cleanPath = '';
                    }

                    if (ALLOWED_PATHS.includes(cleanPath)) {
                        redirectUrl = '<?php echo home_url(); ?>' + cleanPath;
                        console.log('[LOGIN] 🔄 Redirect validé:', redirectUrl);
                    } else {
                        console.warn('[LOGIN] ⚠️ Redirect bloqué (non whitelisté):', redirectTo);
                        // Default fallbacks
                        if (userType === 'opticien') {
                            redirectUrl = '<?php echo home_url("/dashboard-opticien"); ?>';
                        } else if (userType === 'entreprise') {
                            redirectUrl = '<?php echo home_url("/dashboard-entreprise"); ?>';
                        } else {
                            redirectUrl = '<?php echo home_url("/"); ?>';
                        }
                    }
                } else {
                    if (userType === 'opticien') {
                        redirectUrl = '<?php echo home_url("/dashboard-opticien"); ?>';
                        console.log('[LOGIN] 🔄 Redirect opticien:', redirectUrl);
                    } else if (userType === 'entreprise') {
                        redirectUrl = '<?php echo home_url("/dashboard-entreprise"); ?>';
                        console.log('[LOGIN] 🔄 Redirect entreprise:', redirectUrl);
                    } else {
                        console.warn('[LOGIN] ⚠️ Type utilisateur inconnu:', userType);
                        redirectUrl = '<?php echo home_url("/"); ?>';
                    }
                }

                // 5. Redirect
                window.location.href = redirectUrl;

            } catch (error) {
                console.error('Login Error:', error);

                // Show inline error message instead of alert
                const errorDiv = document.getElementById('login-error');
                const errorText = document.getElementById('login-error-text');
                errorText.textContent = error.message || 'Identifiants incorrects. Veuillez réessayer.';
                errorDiv.classList.remove('hidden');

                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');

                // Scroll to error
                errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>