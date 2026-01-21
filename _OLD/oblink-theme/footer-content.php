<!-- GLOBAL HARDCODED FOOTER -->
<footer id="main-footer" class="bg-gray-900 text-white pt-20 pb-10 relative z-10"
    style="background-color: #1F2937 !important; color: #FFFFFF !important; border-top: 4px solid #FF6600; display: block !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand -->
            <div class="space-y-6">
                <a href="<?php echo home_url('/'); ?>" class="inline-block text-2xl font-black tracking-tight"
                    style="font-family: 'Overpass', sans-serif; text-decoration: none;">
                    <span style="color:#FFF">OB</span><span style="color:#FF6600">LINK</span><span
                        style="color:#0099FF">.</span>
                </a>
                <p class="text-sm leading-relaxed" style="color: #9CA3AF;">La plateforme des Opticiens Freelances.</p>
            </div>
            <!-- Links Candidates -->
            <div>
                <h3 class="text-lg font-bold mb-6" style="color:#FFF;">Pour les Opticiens</h3>
                <ul class="space-y-3 text-sm" style="color: #9CA3AF;">
                    <li><a href="<?php echo home_url('/inscription-opticien'); ?>" style="color:inherit">Inscription
                            Freelance</a></li>
                    <li><a href="<?php echo home_url('/simulateur'); ?>" style="color:inherit">Simulateur Revenus</a>
                    </li>
                    <li><a href="<?php echo home_url('/formation-erp'); ?>" style="color:inherit">Formation
                            Logiciels</a></li>
                    <li><a href="<?php echo home_url('/emploi-opticien'); ?>" style="color:inherit">Offres de
                            mission</a></li>
                </ul>
            </div>
            <!-- Links Companies -->
            <div>
                <h3 class="text-lg font-bold mb-6" style="color:#FFF;">Pour les Magasins</h3>
                <ul class="space-y-3 text-sm" style="color: #9CA3AF;">
                    <li><a href="<?php echo home_url('/inscription-entreprise'); ?>" style="color:inherit">Recruter un
                            Freelance</a></li>
                    <li><a href="<?php echo home_url('/abonnements'); ?>" style="color:inherit">Nos Tarifs</a></li>
                    <li><a href="<?php echo home_url('/recherche-opticiens'); ?>" style="color:inherit">CV-thèque</a>
                    </li>
                    <li><a href="<?php echo home_url('/generateur-de-contrat'); ?>" style="color:inherit">Générateur de
                            Contrat</a>
                    </li>
                </ul>
            </div>
            <!-- Legal -->
            <div>
                <h3 class="text-lg font-bold mb-6" style="color:#FFF;">Informations</h3>
                <ul class="space-y-3 text-sm" style="color: #9CA3AF;">
                    <li><a href="<?php echo home_url('/a-propos'); ?>" style="color:inherit">À propos</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>" style="color:inherit">Nous contacter</a></li>
                    <li><a href="<?php echo home_url('/mentions-legales'); ?>" style="color:inherit">Mentions
                            Légales</a></li>
                    <li><a href="<?php echo home_url('/cgu'); ?>" style="color:inherit">CGU / CGV</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4"
            style="border-top-color: #374151; color: #6B7280; font-size: 0.75rem;">
            <p>&copy;
                <?php echo date('Y'); ?> OBLINK. Tous droits réservés.
            </p>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-green-500"
                    style="background-color: #10B981; display:inline-block"></span>
                <span>Système Opérationnel</span>
            </div>
        </div>
    </div>
    </div>
</footer>

<!-- GLOBAL TOAST NOTIFICATION SYSTEM -->
<div id="toast-container" class="fixed top-24 right-4 z-50 flex flex-col gap-2 pointer-events-none">
    <!-- Toasts will be injected here by JS -->
</div>

<script>
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');

        // Colors
        const colors = {
            'success': 'bg-white border-l-4 border-green-500 text-gray-800',
            'error': 'bg-white border-l-4 border-red-500 text-gray-800',
            'info': 'bg-white border-l-4 border-oblink-blue text-gray-800'
        };

        // Icons
        const icons = {
            'success': '<i class="fas fa-check-circle text-green-500 text-xl"></i>',
            'error': '<i class="fas fa-exclamation-circle text-red-500 text-xl"></i>',
            'info': '<i class="fas fa-info-circle text-oblink-blue text-xl"></i>'
        };

        toast.className = `transform translate-x-full transition-transform duration-300 ease-out flex items-center gap-4 px-6 py-4 rounded-lg shadow-xl cursor-pointer pointer-events-auto min-w-[300px] max-w-md ${colors[type]}`;
        toast.innerHTML = `
        ${icons[type]}
        <div>
            <h4 class="font-bold text-sm">${type === 'error' ? 'Erreur' : (type === 'info' ? 'Information' : 'Succès')}</h4>
            <p class="text-xs text-gray-500">${message}</p>
        </div>
    `;

        container.appendChild(toast);

        // Animate In
        requestAnimationFrame(() => {
            toast.classList.remove('translate-x-full');
        });

        // Auto Dismiss
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4000); // 4 seconds
    }

    // Check URL Params for Feedback (e.g. ?success=job_posted)
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === 'job_posted') {
            showToast('Votre offre a été publiée et soumise à validation.', 'success');

            // Clean URL
            const url = new URL(window.location);
            url.searchParams.delete('success');
            window.history.replaceState({}, '', url);
        }
    });
</script>