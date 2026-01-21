<?php
/*
Template Name: Paramètres Compte
*/
include 'header-inc.php';
?>

<!-- Auth Guard -->
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        if (!window.oblinkSupabase) {
            console.error('Supabase not loaded');
            return;
        }

        const { data: { session } } = await window.oblinkSupabase.auth.getSession();
        if (!session) {
            window.location.href = '<?php echo home_url('/login'); ?>?redirect=/parametres';
        }
    });
</script>

<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold font-display text-oblink-gray mb-2">Paramètres du compte</h1>
            <p class="text-gray-500">Gérez vos informations personnelles et votre sécurité</p>
        </div>

        <!-- Success Message -->
        <div id="success-message" class="hidden mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
            <div class="flex items-start gap-3">
                <i class="fas fa-check-circle text-green-500 text-xl mt-0.5"></i>
                <div>
                    <p class="text-sm font-semibold text-green-700" id="success-text"></p>
                </div>
            </div>
        </div>

        <!-- Error Message -->
        <div id="error-message" class="hidden mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-circle text-red-500 text-xl mt-0.5"></i>
                <div>
                    <p class="text-sm font-semibold text-red-700" id="error-text"></p>
                </div>
            </div>
        </div>

        <!-- Warning Message -->
        <div id="warning-message" class="hidden mb-6 p-4 rounded-xl bg-yellow-50 border border-yellow-200">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-triangle text-yellow-600 text-xl mt-0.5"></i>
                <div>
                    <p class="text-sm font-semibold text-yellow-700" id="warning-text"></p>
                </div>
            </div>
        </div>

        <!-- Settings Sections -->
        <div class="space-y-6">

            <!-- Profile Information -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-xl font-bold text-oblink-gray mb-6 flex items-center gap-2">
                    <i class="fas fa-user text-oblink-blue"></i> Informations du profil
                </h2>

                <form id="profile-form" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Prénom</label>
                            <input type="text" id="first-name"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                                placeholder="Votre prénom">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nom</label>
                            <input type="text" id="last-name"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                                placeholder="Votre nom">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                        <input type="email" id="email"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 cursor-not-allowed"
                            placeholder="email@exemple.com" disabled>
                        <p class="text-xs text-gray-500 mt-1">L'email ne peut pas être modifié pour le moment</p>
                    </div>

                    <button type="submit"
                        class="px-6 py-3 bg-oblink-blue text-white font-bold rounded-xl hover:bg-blue-600 transition flex items-center gap-2">
                        <i class="fas fa-save"></i> Enregistrer les modifications
                    </button>
                </form>
            </div>

            <!-- Password Change -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-xl font-bold text-oblink-gray mb-6 flex items-center gap-2">
                    <i class="fas fa-lock text-oblink-orange"></i> Sécurité
                </h2>

                <form id="password-form" class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nouveau mot de passe</label>
                        <input type="password" id="new-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                            placeholder="Minimum 6 caractères">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Confirmer le mot de passe</label>
                        <input type="password" id="confirm-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-oblink-blue focus:ring-2 focus:ring-oblink-blue/20 outline-none transition"
                            placeholder="Retapez le mot de passe">
                    </div>

                    <button type="submit"
                        class="px-6 py-3 bg-oblink-orange text-white font-bold rounded-xl hover:bg-orange-600 transition flex items-center gap-2">
                        <i class="fas fa-key"></i> Changer le mot de passe
                    </button>
                </form>
            </div>

            <!-- Logout -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-xl font-bold text-oblink-gray mb-4 flex items-center gap-2">
                    <i class="fas fa-sign-out-alt text-red-500"></i> Déconnexion
                </h2>
                <p class="text-gray-600 mb-4">Vous souhaitez vous déconnecter de votre compte ?</p>
                <button onclick="logout()"
                    class="px-6 py-3 bg-red-500 text-white font-bold rounded-xl hover:bg-red-600 transition flex items-center gap-2">
                    <i class="fas fa-power-off"></i> Se déconnecter
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        if (!window.oblinkSupabase) return;

        // Load current user data
        const { data: { session } } = await window.oblinkSupabase.auth.getSession();
        if (!session) return;

        const user = session.user;

        // Populate form
        document.getElementById('email').value = user.email || '';
        document.getElementById('first-name').value = user.user_metadata?.first_name || '';
        document.getElementById('last-name').value = user.user_metadata?.last_name || '';

        // Profile form handler
        document.getElementById('profile-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
            btn.disabled = true;

            try {
                const { error } = await window.oblinkSupabase.auth.updateUser({
                    data: {
                        first_name: document.getElementById('first-name').value,
                        last_name: document.getElementById('last-name').value
                    }
                });

                if (error) throw error;

                btn.innerHTML = '<i class="fas fa-check"></i> Enregistré !';
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }, 2000);

            } catch (error) {
                showError('Erreur : ' + error.message);
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        });

        // Password form handler
        document.getElementById('password-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (newPassword.length < 6) {
                showWarning('Le mot de passe doit contenir au moins 6 caractères');
                return;
            }

            if (newPassword !== confirmPassword) {
                showWarning('Les mots de passe ne correspondent pas');
                return;
            }

            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Modification...';
            btn.disabled = true;

            try {
                const { error } = await window.oblinkSupabase.auth.updateUser({
                    password: newPassword
                });

                if (error) throw error;

                btn.innerHTML = '<i class="fas fa-check"></i> Mot de passe changé !';
                document.getElementById('new-password').value = '';
                document.getElementById('confirm-password').value = '';

                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }, 2000);

            } catch (error) {
                showError('Erreur : ' + error.message);
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        });
    });

    // Helper functions for messages
    function showSuccess(message) {
        const successDiv = document.getElementById('success-message');
        const successText = document.getElementById('success-text');
        successText.textContent = message;
        successDiv.classList.remove('hidden');
        successDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Hide other messages
        document.getElementById('error-message').classList.add('hidden');
        document.getElementById('warning-message').classList.add('hidden');
    }

    function showError(message) {
        const errorDiv = document.getElementById('error-message');
        const errorText = document.getElementById('error-text');
        errorText.textContent = message;
        errorDiv.classList.remove('hidden');
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Hide other messages
        document.getElementById('success-message').classList.add('hidden');
        document.getElementById('warning-message').classList.add('hidden');
    }

    function showWarning(message) {
        const warningDiv = document.getElementById('warning-message');
        const warningText = document.getElementById('warning-text');
        warningText.textContent = message;
        warningDiv.classList.remove('hidden');
        warningDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Hide other messages
        document.getElementById('success-message').classList.add('hidden');
        document.getElementById('error-message').classList.add('hidden');
    }

    // Logout function with inline confirmation
    async function logout() {
        // Show confirmation message
        const warningDiv = document.getElementById('warning-message');
        const warningText = document.getElementById('warning-text');
        warningText.innerHTML = `
            Êtes-vous sûr de vouloir vous déconnecter ?
            <div class="mt-3 flex gap-2">
                <button onclick="confirmLogout()" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 transition text-sm">
                    Oui, déconnecter
                </button>
                <button onclick="hideMessages()" class="px-4 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition text-sm">
                    Annuler
                </button>
            </div>
        `;
        warningDiv.classList.remove('hidden');
        warningDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    async function confirmLogout() {
        try {
            await window.oblinkSupabase.auth.signOut();
            showSuccess('Déconnexion réussie ! Redirection...');
            setTimeout(() => {
                window.location.href = '<?php echo home_url('/'); ?>';
            }, 1000);
        } catch (error) {
            showError('Erreur lors de la déconnexion : ' + error.message);
        }
    }

    function hideMessages() {
        document.getElementById('success-message').classList.add('hidden');
        document.getElementById('error-message').classList.add('hidden');
        document.getElementById('warning-message').classList.add('hidden');
    }
</script>

<?php
include get_template_directory() . "/footer-content.php";
wp_footer();
?>