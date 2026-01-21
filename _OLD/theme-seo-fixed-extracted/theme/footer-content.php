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
                    <li><a href="<?php echo home_url('/guide-creation-entreprise'); ?>" style="color:inherit">Guide
                            Création (Freelance)</a></li>
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
                    <li><a href="mailto:contact@oblink.fr" style="color:inherit">Contact & Support</a></li>
                    <li><a href="<?php echo home_url('/mentions-legales'); ?>" style="color:inherit">Mentions
                            Légales</a></li>
                    <li><a href="<?php echo home_url('/cgu'); ?>" style="color:inherit">CGU / CGV</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs"
            style="border-top-color: #374151; color: #6B7280;">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <p>&copy; <?php echo date('Y'); ?> OBLINK. Tous droits réservés.</p>
                <div class="flex items-center gap-4">
                    <!-- Social Links -->
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-linkedin-in text-lg"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-instagram text-lg"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i
                            class="fab fa-facebook-f text-lg"></i></a>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-green-500"
                    style="background-color: #10B981; display:inline-block"></span>
                <span>Système Opérationnel - <?php echo date('d/m/Y'); ?></span>
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

<!-- OBLINK ASSIST WIDGET -->
<div id="oblink-chat-widget" class="fixed bottom-6 right-6 z-50 flex flex-col items-end pointer-events-none">

    <!-- Chat Window (Hidden by default) -->
    <div id="chat-window"
        class="bg-white w-[350px] h-[500px] rounded-2xl shadow-2xl border border-gray-200 mb-4 flex flex-col hidden pointer-events-auto overflow-hidden animate-fade-in-up">
        <!-- Header -->
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 p-4 text-white flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-lg">🤖</div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-gray-900 rounded-full">
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Oblink Assist</h4>
                    <p class="text-xs text-gray-400">Support 24/7 • IA Expert</p>
                </div>
            </div>
            <button onclick="toggleChat()" class="text-gray-400 hover:text-white transition"><i
                    class="fas fa-times"></i></button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-grow p-4 overflow-y-auto space-y-4 bg-gray-50">
            <!-- Intro Message -->
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs">🤖</div>
                <div
                    class="bg-white border border-gray-200 p-3 rounded-2xl rounded-tl-none shadow-sm text-sm text-gray-700">
                    Bonjour ! Je suis l'intelligence artificielle d'OBLINK. Je peux répondre à vos questions sur les
                    certifications, les tarifs ou la réforme 2026.
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-4 bg-white border-t border-gray-100">
            <form onsubmit="sendMessage(event)" class="relative">
                <input type="text" id="chat-input"
                    class="w-full bg-gray-100 border-0 rounded-full pl-4 pr-12 py-3 text-sm focus:ring-2 focus:ring-oblink-blue focus:bg-white transition"
                    placeholder="Posez votre question..." autocomplete="off">
                <button type="submit" id="chat-submit"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-oblink-blue text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                    <i class="fas fa-paper-plane text-xs"></i>
                </button>
            </form>
            <p class="text-[10px] text-center text-gray-400 mt-2">IA générative. Vérifiez les infos contractuelles.</p>
        </div>
    </div>

    <!-- Toggle Button -->
    <button onclick="toggleChat()"
        class="pointer-events-auto bg-oblink-blue hover:bg-blue-700 text-white w-14 h-14 rounded-full shadow-lg flex items-center justify-center text-2xl transition transform hover:scale-110 relative group">
        <i class="fas fa-comment-alt"></i>
        <!-- Notification Badge -->
        <span
            class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full animate-pulse border-2 border-white"></span>
        <!-- Tooltip -->
        <span
            class="absolute right-16 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">Besoin
            d'aide ?</span>
    </button>
</div>

<script>
    function toggleChat() {
        const chatWindow = document.getElementById('chat-window');
        chatWindow.classList.toggle('hidden');
        if (!chatWindow.classList.contains('hidden')) {
            document.getElementById('chat-input').focus();
        }
    }

    async function sendMessage(e) {
        e.preventDefault();
        const input = document.getElementById('chat-input');
        const message = input.value.trim();
        if (!message) return;

        // Add User Message
        addMessage(message, 'user');
        input.value = '';
        document.getElementById('chat-submit').disabled = true;

        // Show Typing Indicator
        const typingId = addTypingIndicator();

        try {
            // Call API
            // Note: Since api-chat.php is in the same folder as footer, we assume root relative path works or adjust accordingly.
            // In WordPress theme context, we usually need the full path or ajaxurl.
            // Using a relative path strategy for this static-ish structure:
            const response = await fetch('<?php echo get_template_directory_uri(); ?>/api-chat.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ question: message })
            });

            const data = await response.json();

            // Remove Typing
            removeMessage(typingId);

            if (data.response) {
                addMessage(data.response.replace(/\n/g, '<br>'), 'bot');
            } else if (data.error) {
                addMessage("Désolé, je rencontre un problème de connexion (" + data.error + ").", 'bot');
            }

        } catch (err) {
            removeMessage(typingId);
            addMessage("Erreur réseau. Veuillez réessayer.", 'bot');
            console.error(err);
        }

        document.getElementById('chat-submit').disabled = false;
    }

    function addMessage(html, sender) {
        const container = document.getElementById('chat-messages');
        const div = document.createElement('div');

        if (sender === 'bot') {
            div.className = "flex items-start gap-3 animate-fade-in-up";
            div.innerHTML = `
                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs flex-shrink-0">🤖</div>
                <div class="bg-white border border-gray-200 p-3 rounded-2xl rounded-tl-none shadow-sm text-sm text-gray-700 leading-relaxed">
                    ${html}
                </div>
            `;
        } else {
            div.className = "flex items-center justify-end animate-fade-in-up";
            div.innerHTML = `
                <div class="bg-oblink-blue text-white p-3 rounded-2xl rounded-tr-none shadow-sm text-sm">
                    ${html}
                </div>
            `;
        }

        container.appendChild(div);
        container.scrollTop = container.scrollHeight;
        return div.id; // Not really using IDs here
    }

    function addTypingIndicator() {
        const container = document.getElementById('chat-messages');
        const id = 'typing-' + Date.now();
        const div = document.createElement('div');
        div.id = id;
        div.className = "flex items-start gap-3 animate-pulse";
        div.innerHTML = `
            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs">🤖</div>
            <div class="bg-gray-100 p-3 rounded-2xl rounded-tl-none text-gray-400 text-xs flex gap-1">
                <span class="w-1 h-1 bg-gray-400 rounded-full animate-bounce"></span>
                <span class="w-1 h-1 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></span>
                <span class="w-1 h-1 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
            </div>
        `;
        container.appendChild(div);
        container.scrollTop = container.scrollHeight;
        return id;
    }

    function removeMessage(id) {
        const el = document.getElementById(id);
        if (el) el.remove();
    }
</script>