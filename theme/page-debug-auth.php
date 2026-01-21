<?php
/*
Template Name: Debug Auth
*/
header('Content-Type: text/html; charset=utf-8');
include 'header-inc.php';
?>

<div class="min-h-screen bg-gray-50 pt-32 pb-20 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-3xl font-bold text-oblink-gray mb-6">🔍 Diagnostic Authentification</h1>

            <div id="auth-debug-output" class="space-y-4">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-oblink-orange"></div>
                <p class="text-gray-500">Chargement des informations...</p>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <button onclick="location.reload()"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-semibold mr-3">
                    🔄 Rafraîchir
                </button>
                <button onclick="clearAndLogout()"
                    class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 font-semibold">
                    🗑️ Déconnexion Complète
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    async function clearAndLogout() {
        if (confirm('Ceci va te déconnecter et vider toutes les données. Continuer ?')) {
            try {
                await window.oblinkSupabase.auth.signOut();
                localStorage.clear();
                sessionStorage.clear();
                alert('✅ Déconnexion réussie ! Refresh de la page...');
                window.location.href = '<?php echo home_url('/'); ?>';
            } catch (err) {
                alert('Erreur : ' + err.message);
            }
        }
    }

    async function runDiagnostic() {
        const output = document.getElementById('auth-debug-output');

        try {
            // Check if Supabase is loaded
            if (!window.oblinkSupabase) {
                output.innerHTML = `
                <div class="bg-red-50 border-2 border-red-200 rounded-lg p-4">
                    <h3 class="font-bold text-red-800 mb-2">❌ Supabase non chargé</h3>
                    <p class="text-red-600">Le client Supabase n'est pas initialisé.</p>
                </div>
            `;
                return;
            }

            // Get session
            const { data: { session }, error } = await window.oblinkSupabase.auth.getSession();

            if (error) {
                output.innerHTML = `
                <div class="bg-red-50 border-2 border-red-200 rounded-lg p-4">
                    <h3 class="font-bold text-red-800 mb-2">❌ Erreur Session</h3>
                    <p class="text-red-600">${error.message}</p>
                </div>
            `;
                return;
            }

            if (!session) {
                output.innerHTML = `
                <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-4">
                    <h3 class="font-bold text-yellow-800 mb-2">⚠️ Non connecté</h3>
                    <p class="text-yellow-700">Aucune session active détectée.</p>
                    <a href="<?php echo home_url('/login'); ?>" class="inline-block mt-3 px-4 py-2 bg-oblink-orange text-white rounded-lg">
                        Se connecter
                    </a>
                </div>
            `;
                return;
            }

            // Session exists - show details
            const user = session.user;
            const userType = user.user_metadata?.user_type;
            const correctDashboard = userType === 'entreprise' ? '/dashboard-entreprise' : '/dashboard-opticien';

            output.innerHTML = `
            <div class="bg-green-50 border-2 border-green-200 rounded-lg p-4 mb-4">
                <h3 class="font-bold text-green-800 mb-3">✅ Session Active</h3>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="font-semibold text-gray-700">Email:</dt>
                        <dd class="text-gray-900">${user.email}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-semibold text-gray-700">User ID:</dt>
                        <dd class="text-gray-900 font-mono text-xs">${user.id}</dd>
                    </div>
                    <div class="flex justify-between items-center">
                        <dt class="font-semibold text-gray-700">Type utilisateur:</dt>
                        <dd class="px-3 py-1 rounded-full text-xs font-bold ${userType === 'entreprise' ? 'bg-blue-100 text-blue-800' : 'bg-orange-100 text-orange-800'}">
                            ${userType || 'NON DÉFINI'}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4 mb-4">
                <h3 class="font-bold text-blue-800 mb-3">📊 Métadonnées Complètes</h3>
                <pre class="bg-white p-3 rounded overflow-auto text-xs">${JSON.stringify(user.user_metadata, null, 2)}</pre>
            </div>

            <div class="bg-purple-50 border-2 border-purple-200 rounded-lg p-4">
                <h3 class="font-bold text-purple-800 mb-3">🎯 Dashboard Recommandé</h3>
                <p class="text-purple-700 mb-3">Selon ton type (<strong>${userType}</strong>), tu devrais accéder à :</p>
                <a href="<?php echo home_url(); ?>${correctDashboard}" 
                   class="inline-block px-6 py-3 ${userType === 'entreprise' ? 'bg-oblink-blue' : 'bg-oblink-orange'} text-white rounded-lg font-semibold hover:opacity-90">
                    ${userType === 'entreprise' ? '🏢' : '👤'} Aller au Dashboard ${userType === 'entreprise' ? 'Entreprise' : 'Opticien'}
                </a>
            </div>
        `;

        } catch (err) {
            output.innerHTML = `
            <div class="bg-red-50 border-2 border-red-200 rounded-lg p-4">
                <h3 class="font-bold text-red-800 mb-2">❌ Erreur Diagnostic</h3>
                <p class="text-red-600">${err.message}</p>
            </div>
        `;
        }
    }

    // Run on load
    document.addEventListener('DOMContentLoaded', runDiagnostic);
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>