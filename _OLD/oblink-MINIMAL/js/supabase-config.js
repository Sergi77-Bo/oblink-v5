/**
 * OBLINK - Supabase Configuration (FIXED V2.0)
 * Handles initialization of the Supabase Client with robust error handling and no duplication.
 */

(function () {
    // 1. Check if already initialized to prevent double init
    if (window.oblinkSupabase) {
        console.warn('Supabase Client already initialized.');
        return;
    }

    // 2. Validate Dependencies
    if (typeof supabase === 'undefined') {
        console.error('CRITICAL: Supabase SDK not loaded. Check script enqueuing.');
        return;
    }

    if (!oblink_vars || !oblink_vars.supabase_url || !oblink_vars.supabase_key) {
        console.error('CRITICAL: Supabase variables missing in oblink_vars.');
        return;
    }

    // 3. Initialize Client
    const sbUrl = oblink_vars.supabase_url;
    const sbKey = oblink_vars.supabase_key;

    console.log('🔄 OBLINK: Initializing Supabase...');

    try {
        window.oblinkSupabase = supabase.createClient(sbUrl, sbKey);
        console.log("✅ Supabase Client Initialized Successfully");

        // Dispatch Custom Event for other scripts to listen to
        const event = new Event('oblinkSupabaseReady');
        window.dispatchEvent(event);

    } catch (err) {
        console.error("❌ Supabase Initialization Failed:", err);
    }

    // 4. UI AUTH STATE MANAGEMENT
    // We run this on DOMContentLoaded to ensure elements exist
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.oblinkSupabase) return;

        // Check session on load
        updateAuthUI();

        // Listen for auth changes
        if (window.oblinkSupabase.auth) {
            window.oblinkSupabase.auth.onAuthStateChange((event, session) => {
                console.log("Auth Event:", event);
                updateAuthUI(session);

                if (event === 'SIGNED_OUT') {
                    // Make sure UI reflects logged out state immediately
                    window.location.href = '/login';
                }
            });
        }
    });

    // 5. HELPER: Update Header UI
    async function updateAuthUI(session = null) {
        if (!window.oblinkSupabase || !window.oblinkSupabase.auth) return;

        try {
            if (!session) {
                const { data } = await window.oblinkSupabase.auth.getSession();
                session = data?.session;
            }
        } catch (err) {
            console.error("Error getting session:", err);
            return;
        }

        const authContainer = document.getElementById('header-auth-actions');
        const mobileAuthContainer = document.getElementById('mobile-auth-actions');

        if (session) {
            // USER LOGGED IN
            const user = session.user;
            const meta = user.user_metadata || {};
            const displayName = meta.full_name || meta.first_name || user.email;
            const initial = displayName.charAt(0).toUpperCase();

            // Determine Dashboard URL based on User Type
            const userType = meta.user_type;
            let dashboardSlug = '/dashboard'; // Default
            if (userType === 'opticien') dashboardSlug = '/dashboard-opticien';
            if (userType === 'entreprise') dashboardSlug = '/dashboard-entreprise';

            const dashboardUrl = (oblink_vars.home_url || '') + dashboardSlug;

            const html = `
                <a href="${dashboardUrl}" class="flex items-center space-x-2 text-sm font-semibold text-oblink-gray hover:text-oblink-orange transition-colors duration-200">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-oblink-orange to-red-500 text-white flex items-center justify-center font-bold shadow-md">
                        ${initial}
                    </div>
                    <span class="hidden md:inline">Mon Espace</span>
                </a>
                <button onclick="window.oblinkSignOut()" class="text-xs text-gray-400 hover:text-red-500 ml-3 transition-colors duration-200" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            `;

            if (authContainer) authContainer.innerHTML = html;
            if (mobileAuthContainer) mobileAuthContainer.innerHTML = html;
        } else {
            // USER LOGGED OUT
            const html = `
                <a href="/login" class="text-sm font-semibold text-oblink-gray hover:text-oblink-orange transition-colors duration-200">Connexion</a>
                <a href="/inscription-opticien" class="px-5 py-2.5 bg-oblink-orange text-white rounded-lg font-bold shadow hover:bg-oblink-orange/90 transition transform hover:-translate-y-0.5 ml-4">S'inscrire</a>
            `;

            if (authContainer) authContainer.innerHTML = html;
            if (mobileAuthContainer) mobileAuthContainer.innerHTML = html;
        }
    }

    // 6. GLOBAL SIGN OUT FUNCTION
    window.oblinkSignOut = async function () {
        if (!window.oblinkSupabase) return;
        try {
            const { error } = await window.oblinkSupabase.auth.signOut();
            if (error) throw error;
            window.location.href = '/login';
        } catch (err) {
            console.error('Logout Error:', err);
            alert('Erreur lors de la déconnexion');
        }
    };

})();
