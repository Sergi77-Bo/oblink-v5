/**
 * OBLINK - Header Auth Dynamic (FIXED V2.0)
 * Makes the header react to Supabase authentication state.
 * Solves Race Condition by waiting for Supabase Global Instance.
 */

document.addEventListener('DOMContentLoaded', function () {
    const headerAuthActions = document.getElementById('header-auth-actions');

    if (!headerAuthActions) {
        // Log verbose only in dev
        // console.warn('[Header Auth] Container not found');
        return;
    }

    // Function to initialize header logic
    const initHeaderAuth = async () => {
        if (!window.oblinkSupabase) {
            console.error('[Header Auth] Supabase still not ready after wait. Logic aborted.');
            return;
        }

        try {
            // Get current session
            const { data: { session }, error } = await window.oblinkSupabase.auth.getSession();

            if (error) {
                console.error('[Header Auth] Error getting session:', error);
                return;
            }

            if (session) {
                // USER IS LOGGED IN
                const user = session.user;
                const meta = user.user_metadata || {};
                const userType = meta.user_type;
                const firstName = meta.first_name || 'Utilisateur';
                const companyName = meta.company_name || 'Entreprise';

                // Determine dashboard URL
                const baseUrl = window.location.origin; // Or use oblink_vars.home_url
                let dashboardPath = '/dashboard';

                if (userType === 'opticien') dashboardPath = '/dashboard-opticien';
                else if (userType === 'entreprise') dashboardPath = '/dashboard-entreprise';

                const dashboardUrl = baseUrl + dashboardPath; // Ensure correct path concatenation if baseUrl has trailing slash check needed, but mostly standard.

                console.log('[Header Auth] Logged In as:', userType);

                const authContainer = document.getElementById('auth-buttons-container');
                if (authContainer) {
                    authContainer.innerHTML = `
                        <a href="${dashboardUrl}" 
                           class="px-4 py-2.5 bg-oblink-orange/10 text-oblink-orange rounded-lg font-bold hover:bg-oblink-orange hover:text-white transition-all flex items-center gap-2 group">
                            <i class="fas fa-tachometer-alt group-hover:text-white transition-colors"></i>
                            <span>Mon Espace</span>
                        </a>
                        <button id="logout-btn-header"
                            class="px-4 py-2.5 ml-2 bg-gray-50 text-gray-500 rounded-lg font-bold hover:bg-gray-100 hover:text-red-500 transition-colors" title="Déconnexion">
                            <i class="fas fa-power-off"></i>
                        </button>
                    `;
                }

                // Logout handler
                const logoutBtn = document.getElementById('logout-btn-header');
                if (logoutBtn) {
                    logoutBtn.addEventListener('click', async () => {
                        if (window.oblinkSignOut) {
                            window.oblinkSignOut();
                        } else {
                            await window.oblinkSupabase.auth.signOut();
                            window.location.reload();
                        }
                    });
                }

            } else {
                // USER IS NOT LOGGED IN
                // Leave default or ensure it shows login buttons
                // Already handled by supabase-config.js default state or PHP fallback
            }

        } catch (err) {
            console.error('[Header Auth] Error:', err);
        }
    };

    // WAIT FOR SUPABASE STRATEGY
    if (window.oblinkSupabase) {
        initHeaderAuth();
    } else {
        // Listen for the custom event dispatched by supabase-config.js
        window.addEventListener('oblinkSupabaseReady', initHeaderAuth);

        // Fallback: Check quickly a few times in case event missed (race condition reversed)
        let attempts = 0;
        const checkInterval = setInterval(() => {
            attempts++;
            if (window.oblinkSupabase) {
                clearInterval(checkInterval);
                window.removeEventListener('oblinkSupabaseReady', initHeaderAuth); // Cleanup
                initHeaderAuth();
            } else if (attempts > 20) { // 2 seconds timeout
                clearInterval(checkInterval);
                console.warn('[Header Auth] Timed out waiting for Supabase.');
            }
        }, 100);
    }
});
