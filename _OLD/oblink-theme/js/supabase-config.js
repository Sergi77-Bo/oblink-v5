// OBLINK - Supabase Configuration
// Handles initialization of the Supabase Client

// OBLINK - Supabase Configuration
// Handles initialization of the Supabase Client

// 1. Initialize Client IMMEDIATELY (Global Scope)
// This ensures window.oblinkSupabase is available before other scripts' DOMContentLoaded events fire.
if (typeof supabase === 'undefined') {
    console.error('Supabase SDK not loaded');
} else {
    const sbUrl = oblink_vars.supabase_url;
    const sbKey = oblink_vars.supabase_key;

    console.log('Supabase Init:', { url: sbUrl, keyLength: sbKey?.length });

    try {
        window.oblinkSupabase = supabase.createClient(sbUrl, sbKey);
        console.log("Supabase Client Initialized Successfully (Global)");
    } catch (err) {
        console.error("Supabase createClient Failed:", err);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // UI AUTH STATE MANAGEMENT
    // Check session on load
    updateAuthUI();

    // Listen for auth changes
    if (window.oblinkSupabase && window.oblinkSupabase.auth) {
        window.oblinkSupabase.auth.onAuthStateChange((event, session) => {
            console.log("Auth Event:", event);
            updateAuthUI(session);

            if (event === 'SIGNED_OUT') {
                // Optional: Redirect
            }
        });
    } else {
        console.error("Supabase Auth not available - Check Keys");
    }
});

async function updateAuthUI(session = null) {
    if (!window.oblinkSupabase || !window.oblinkSupabase.auth) return;

    try {
        if (!session) {
            const { data } = await window.oblinkSupabase.auth.getSession();
            session = data?.session;
        }
    } catch (err) {
        console.error("Error getting session:", err);
    }

    const authContainer = document.getElementById('header-auth-actions');
    const mobileAuthContainer = document.getElementById('mobile-auth-actions');

    if (session) {
        // USER LOGGED IN
        const user = session.user;
        const displayName = user.user_metadata.full_name || user.email;
        const initial = displayName.charAt(0).toUpperCase();

        // Determine Dashboard URL based on User Type
        const userType = user.user_metadata.user_type;
        const dashboardSlug = userType === 'entreprise' ? '/dashboard-entreprise' : '/dashboard-opticien';
        const dashboardUrl = (oblink_vars.home_url || '') + dashboardSlug;

        const html = `
            <a href="${dashboardUrl}" class="flex items-center space-x-2 text-sm font-semibold text-oblink-gray hover:text-oblink-orange">
                <div class="w-8 h-8 rounded-full bg-oblink-orange text-white flex items-center justify-center font-bold">
                    ${initial}
                </div>
                <span>Mon Espace</span>
            </a>
            <button onclick="oblinkSignOut()" class="text-xs text-gray-400 hover:text-red-500 ml-2">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        `;

        if (authContainer) authContainer.innerHTML = html;
        if (mobileAuthContainer) mobileAuthContainer.innerHTML = html; // Simplify for mobile for now
    } else {
        // USER LOGGED OUT
        const html = `
            <a href="/login" class="text-sm font-semibold text-oblink-gray hover:text-oblink-orange">Connexion</a>
            <a href="/inscription-opticien" class="px-5 py-2.5 bg-oblink-orange text-white rounded-lg font-bold shadow hover:bg-oblink-orange/90 transition transform hover:-translate-y-0.5">S'inscrire</a>
        `;

        if (authContainer) authContainer.innerHTML = html;
        if (mobileAuthContainer) mobileAuthContainer.innerHTML = html;
    }
}

async function oblinkSignOut() {
    const { error } = await window.oblinkSupabase.auth.signOut();
    if (!error) {
        window.location.href = '/login';
    } else {
        alert('Erreur déconnexion: ' + error.message);
    }
}
