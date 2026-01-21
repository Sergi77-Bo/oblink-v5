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
                    <a href="#"
                        onclick="alert('Fonctionnalité de réinitialisation via Supabase à venir.'); return false;"
                        class="text-xs text-oblink-orange hover:underline">Mot de passe oublié ?</a>
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
                // 1. Sign In
                const { data, error } = await window.oblinkSupabase.auth.signInWithPassword({
                    email: email,
                    password: password
                });

                if (error) throw error;

                // 2. Check User Type & Redirect
                const user = data.user;
                const userType = user.user_metadata.user_type;

                console.log('Login successful:', userType);

                if (userType === 'opticien') {
                    window.location.href = '<?php echo home_url("/dashboard-opticien"); ?>';
                } else if (userType === 'entreprise') {
                    window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
                } else {
                    // Fallback
                    window.location.href = '<?php echo home_url("/"); ?>';
                }

            } catch (error) {
                console.error('Login Error:', error);
                alert('Erreur de connexion : ' + (error.message || 'Identifiants incorrects.'));
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
            }
        });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>