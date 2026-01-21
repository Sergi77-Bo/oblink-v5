<?php
/*
Template Name: Devis
*/
header('Content-Type: text/html; charset=utf-8');
include 'header-inc.php';
?>

<div class="max-w-[1600px] mx-auto px-4 pt-32 pb-32">
    <!-- Back Link -->
    <div class="mb-6">
        <a href="<?php echo home_url('/dashboard-opticien'); ?>"
            class="text-oblink-blue font-semibold hover:underline inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Retour au tableau de bord
        </a>
    </div>

    <div class="grid lg:grid-cols-2 gap-8 items-start">

        <!-- LEFT COLUMN: FORM -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 h-fit">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-oblink-gray mb-2">
                    <i class="fas fa-file-alt text-oblink-blue mr-2"></i>
                    Éditeur de <span class="text-oblink-blue">Devis</span>
                </h1>
                <p class="text-sm text-oblink-gray/70">Remplissez les champs pour générer votre devis.</p>
            </div>

            <form id="quote-form" data-validate class="space-y-6">
                <!-- Quote Info -->
                <div class="border-b border-oblink-beige pb-6">
                    <h2 class="text-lg font-bold text-oblink-gray mb-4">
                        <i class="fas fa-info-circle text-oblink-blue mr-2"></i> Informations
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-oblink-gray mb-1">Numéro</label>
                            <input type="text" id="input-number" name="quoteNumber"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-oblink-blue outline-none text-sm"
                                value="DEV-2025-001">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-oblink-gray mb-1">Date d'émission</label>
                            <input type="date" id="input-date" name="issueDate"
                                class="w-full px-3 py-2 border rounded-lg outline-none text-sm"
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>

                <!-- Mission Dates (New) -->
                <div class="border-b border-oblink-beige pb-6">
                    <h2 class="text-lg font-bold text-oblink-gray mb-4">
                        <i class="fas fa-calendar-alt text-oblink-blue mr-2"></i> Période de Mission
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-oblink-gray mb-1">Date de début</label>
                            <input type="date" id="input-start-date" name="startDate"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-oblink-blue outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-oblink-gray mb-1">Date de fin (Optionnel)</label>
                            <input type="date" id="input-end-date" name="endDate"
                                class="w-full px-3 py-2 border rounded-lg outline-none text-sm">
                        </div>
                    </div>
                </div>

                <!-- Client -->
                <div class="border-b border-oblink-beige pb-6">
                    <h2 class="text-lg font-bold text-oblink-gray mb-4">
                        <i class="fas fa-building text-oblink-violet mr-2"></i> Client
                    </h2>
                    <div class="space-y-3">
                        <input type="text" id="input-client-name" name="toName"
                            class="w-full px-3 py-2 border rounded-lg outline-none text-sm"
                            placeholder="Nom de l'entreprise client">
                        <input type="text" id="input-client-address" name="toAddress"
                            class="w-full px-3 py-2 border rounded-lg outline-none text-sm"
                            placeholder="Adresse complète">
                    </div>
                </div>

                <!-- Prestations -->
                <div class="border-b border-oblink-beige pb-6">
                    <h2 class="text-lg font-bold text-oblink-gray mb-4">
                        <i class="fas fa-list text-oblink-orange mr-2"></i> Prestations
                    </h2>
                    <div id="services-container" class="space-y-4">
                        <!-- Service Line 1 -->
                        <div class="service-line border border-gray-200 rounded-lg p-3 bg-gray-50">
                            <input type="text"
                                class="w-full mb-2 bg-transparent border-b border-gray-300 focus:border-oblink-orange outline-none text-sm font-medium service-desc"
                                placeholder="Description de la mission" value="Mission de remplacement Opticien">
                            <div class="flex gap-3">
                                <div class="flex-1">
                                    <label class="text-xs text-gray-500">Qté (Jours)</label>
                                    <input type="number" class="w-full p-1 border rounded text-sm service-qty" value="3"
                                        min="1">
                                </div>
                                <div class="flex-1">
                                    <label class="text-xs text-gray-500">Prix Uni. HT</label>
                                    <input type="number" class="w-full p-1 border rounded text-sm service-price"
                                        value="280" min="0">
                                </div>
                                <div class="flex items-end">
                                    <button type="button"
                                        class="text-red-500 hover:bg-red-50 p-2 rounded remove-service"><i
                                            class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-service"
                        class="mt-3 text-sm text-oblink-blue font-bold hover:underline">
                        <i class="fas fa-plus-circle"></i> Ajouter une ligne
                    </button>
                </div>

                <!-- Frais -->
                <div class="border-b border-oblink-beige pb-6">
                    <h2 class="text-lg font-bold text-oblink-gray mb-4 flex items-center justify-between">
                        <span><i class="fas fa-receipt text-green-600 mr-2"></i> Note de Frais</span>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="toggle-expenses" class="sr-only peer">
                            <div
                                class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-600 relative">
                            </div>
                        </label>
                    </h2>
                    <div id="expenses-section"
                        class="hidden space-y-3 bg-green-50 p-4 rounded-lg border border-green-100">
                        <input type="text" id="input-expense-desc"
                            class="w-full px-3 py-2 border rounded-lg outline-none text-sm"
                            placeholder="Description (ex: Déplacement AR Train, Repas midi)"
                            value="Frais de déplacement">
                        <div class="flex items-center gap-2">
                            <input type="number" id="input-expense-amount"
                                class="w-32 px-3 py-2 border rounded-lg outline-none text-sm font-bold text-green-700"
                                placeholder="0.00">
                            <span class="text-sm text-green-700">€ HT</span>
                        </div>
                    </div>
                </div>

                <!-- Options d'envoi (V51) -->
                <div class="border-b border-oblink-beige pb-6">
                    <h2 class="text-lg font-bold text-oblink-gray mb-4">
                        <i class="fas fa-paper-plane text-oblink-blue mr-2"></i> Options d'envoi
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-oblink-gray mb-1">Email du client</label>
                            <input type="email" id="input-client-email" name="clientEmail"
                                class="w-full px-3 py-2 border rounded-lg outline-none text-sm"
                                placeholder="client@exemple.com">
                            <p class="text-[10px] text-gray-400 mt-1">L'email sera pré-rempli si le client est reconnu.
                            </p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="send-internal" name="sendInternal"
                                class="w-4 h-4 text-oblink-blue rounded border-gray-300 focus:ring-oblink-blue">
                            <label for="send-internal"
                                class="ml-2 text-sm text-gray-600 font-medium cursor-pointer">Envoyer également via la
                                messagerie interne OBLINK</label>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col gap-3 pt-4">
                    <div class="flex gap-4">
                        <button type="submit"
                            class="flex-1 py-3 bg-oblink-orange text-white rounded-xl font-bold hover:bg-oblink-orange/90 shadow-lg shadow-orange-200 transition">
                            <i class="fas fa-save mr-2"></i>Valider & Envoyer
                        </button>
                    </div>

                    <div class="flex gap-4">
                        <a href="<?php echo home_url('/dashboard-opticien'); ?>"
                            class="flex-1 px-4 py-3 border border-gray-300 text-gray-500 text-center rounded-xl hover:bg-gray-50 transition font-semibold text-sm">
                            <i class="fas fa-times mr-2"></i>Annuler
                        </a>
                        <!-- Convert Button -->
                        <button type="button" id="btn-convert-invoice"
                            class="flex-1 px-4 py-3 border-2 border-oblink-blue text-oblink-blue rounded-xl hover:bg-oblink-blue hover:text-white transition font-semibold text-sm">
                            <i class="fas fa-exchange-alt mr-2"></i>Transformer en Facture
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            // Handle "Transformer en Facture"
            document.getElementById('btn-convert-invoice').addEventListener('click', function () {
                // Collect Data
                const clientName = encodeURIComponent(document.getElementById('input-client-name').value);
                const clientAddress = encodeURIComponent(document.getElementById('input-client-address').value);
                // Simple redirection with basic params for MVP
                const url = `<?php echo home_url('/facture'); ?>?from=devis&client=${clientName}&address=${clientAddress}`;
                window.location.href = url;
            });
        </script>

        <!-- RIGHT COLUMN: PREVIEW (A4 Paper Style) -->
        <div class="hidden lg:block sticky top-24">
            <div class="bg-gray-800 rounded-t-xl py-2 px-4 flex justify-between items-center text-white text-xs">
                <span><i class="fas fa-eye mr-2"></i>Aperçu en direct</span>
                <span>Format A4</span>
            </div>
            <div id="pdf-preview"
                class="bg-white mx-auto shadow-2xl p-8 md:p-12 min-h-[800px] text-xs md:text-sm text-gray-800 relative font-sans"
                style="aspect-ratio: 210/297;">

                <!-- HEADER PREVIEW -->
                <div class="flex justify-between items-start mb-12">
                    <div>
                        <h2 class="text-2xl font-bold text-oblink-blue mb-1">DEVIS</h2>
                        <p class="text-gray-500 font-mono" id="preview-number">DEV-2025-001</p>
                        <p class="text-gray-400 text-[10px] mt-1">Date: <span
                                id="preview-date"><?php echo date('d/m/Y'); ?></span></p>
                        <p class="text-gray-400 text-[10px]">Période: <span id="preview-period"
                                class="font-medium text-gray-600">-</span></p>
                    </div>
                    <div class="text-right">
                        <div class="font-bold text-lg mb-1">OPTICIEN FREELANCE</div>
                        <div class="text-gray-500 text-xs">
                            Sarah Dubois<br>
                            123 rue de la République<br>
                            75001 Paris<br>
                            SIRET: 123 456 789 00012
                        </div>
                    </div>
                </div>

                <!-- CLIENT PREVIEW -->
                <div class="mb-12 bg-gray-50 p-4 rounded-lg border border-gray-100 w-1/2 ml-auto">
                    <p class="text-[10px] uppercase text-gray-400 font-bold mb-1">Client</p>
                    <p class="font-bold text-lg text-gray-800" id="preview-client-name">Nom du Client</p>
                    <p class="text-gray-500" id="preview-client-address">Adresse du client...</p>
                </div>

                <!-- TABLE PREVIEW -->
                <table class="w-full mb-8">
                    <thead class="bg-oblink-blue text-white">
                        <tr>
                            <th class="py-2 px-3 text-left rounded-l-md">Description</th>
                            <th class="py-2 px-3 text-right">Qté</th>
                            <th class="py-2 px-3 text-right">Prix Uni.</th>
                            <th class="py-2 px-3 text-right rounded-r-md">Total HT</th>
                        </tr>
                    </thead>
                    <tbody id="preview-lines" class="text-gray-600">
                        <!-- Lines injected via JS -->
                    </tbody>
                    <!-- Expenses Line -->
                    <tbody id="preview-expenses" class="hidden text-green-700 bg-green-50/50">
                        <tr>
                            <td class="py-3 px-3 border-b border-green-100 flex items-center">
                                <i class="fas fa-receipt mr-2 text-xs"></i> <span id="preview-expense-desc">Frais</span>
                            </td>
                            <td class="py-3 px-3 text-right border-b border-green-100">1</td>
                            <td class="py-3 px-3 text-right border-b border-green-100" id="preview-expense-price">0.00 €
                            </td>
                            <td class="py-3 px-3 text-right border-b border-green-100 font-bold"
                                id="preview-expense-total">0.00 €</td>
                        </tr>
                    </tbody>
                </table>

                <!-- TOTALS PREVIEW -->
                <div class="flex justify-end">
                    <div class="w-1/2 space-y-2">
                        <div class="flex justify-between border-b pb-1">
                            <span>Total HT</span>
                            <span class="font-bold" id="preview-total-ht">0,00 €</span>
                        </div>
                        <div class="flex justify-between border-b pb-1 text-gray-400">
                            <span>TVA (0%)</span>
                            <span>0,00 €</span>
                        </div>
                        <div class="flex justify-between pt-1 text-lg font-bold text-oblink-orange">
                            <span>Net à payer</span>
                            <span id="preview-total-ttc">0,00 €</span>
                        </div>
                        <p class="text-[9px] text-gray-400 text-right mt-2">
                            TVA non applicable, art. 293 B du CGI (Franchise en base).
                        </p>
                    </div>
                </div>

                <!-- FOOTER PREVIEW -->
                <div class="absolute bottom-12 left-12 right-12 text-center border-t pt-4 text-[10px] text-gray-400">
                    Conditions de règlement : Paiement à réception de facture. <br>
                    En cas de retard, indemnité forfaitaire de 40€ pour frais de recouvrement.
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // --- 1. SYNC FUNCTIONS ---
        // Update Basic Info
        const inputNumber = document.getElementById('input-number').value;
        document.getElementById('preview-number').textContent = inputNumber || `DEV-${new Date().getFullYear()}-001`;


        const dateVal = document.getElementById('input-date').value;
        if (dateVal) {
            const [y, m, d] = dateVal.split('-');
            document.getElementById('preview-date').textContent = `${d}/${m}/${y}`;
        }

        document.getElementById('preview-client-name').textContent = document.getElementById('input-client-name').value || 'Nom du Client';
        document.getElementById('preview-client-address').textContent = document.getElementById('input-client-address').value || '...';

        // Update Period
        const startRaw = document.getElementById('input-start-date').value;
        const endRaw = document.getElementById('input-end-date').value;
        if (startRaw) {
            const [sy, sm, sd] = startRaw.split('-');
            let periodStr = `Du ${sd}/${sm}/${sy}`;
            if (endRaw) {
                const [ey, em, ed] = endRaw.split('-');
                periodStr += ` au ${ed}/${em}/${ey}`;
            }
            document.getElementById('preview-period').textContent = periodStr;
        } else {
            document.getElementById('preview-period').textContent = '-';
        }

        // Lines
        const tbody = document.getElementById('preview-lines');
        tbody.innerHTML = '';
        let total = 0;

        // Service Lines
        document.querySelectorAll('.service-line').forEach(line => {
            const desc = line.querySelector('.service-desc').value;
            const qty = parseFloat(line.querySelector('.service-qty').value) || 0;
            const price = parseFloat(line.querySelector('.service-price').value) || 0;
            const lineTotal = qty * price;
            total += lineTotal;

            if (desc || lineTotal > 0) {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                        <td class="py-2 px-3 border-b border-gray-50">${desc}</td>
                        <td class="py-2 px-3 text-right border-b border-gray-50">${qty}</td>
                        <td class="py-2 px-3 text-right border-b border-gray-50">${price.toFixed(2)} €</td>
                        <td class="py-2 px-3 text-right border-b border-gray-50 font-medium">${lineTotal.toFixed(2)} €</td>
                    `;
                tbody.appendChild(tr);
            }
        });

        // Expense Line
        const hasExpense = document.getElementById('toggle-expenses').checked;
        const expenseSection = document.getElementById('preview-expenses');
        if (hasExpense) {
            const expenseDesc = document.getElementById('input-expense-desc').value;
            const expenseAmount = parseFloat(document.getElementById('input-expense-amount').value) || 0;

            document.getElementById('preview-expense-desc').textContent = expenseDesc;
            document.getElementById('preview-expense-price').textContent = expenseAmount.toFixed(2) + ' €';
            document.getElementById('preview-expense-total').textContent = expenseAmount.toFixed(2) + ' €';

            expenseSection.classList.remove('hidden');
            total += expenseAmount;
        } else {
            expenseSection.classList.add('hidden');
        }

        // Totals
        document.getElementById('preview-total-ht').textContent = total.toFixed(2).replace('.', ',') + ' €';
        document.getElementById('preview-total-ttc').textContent = total.toFixed(2).replace('.', ',') + ' €';
    }

        // --- 2. EVENTS ---

        // Live Update on Input
        document.getElementById('quote-form').addEventListener('input', updatePreview);

    // Toggle Expenses
    document.getElementById('toggle-expenses').addEventListener('change', function () {
        const section = document.getElementById('expenses-section');
        if (this.checked) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
        updatePreview();
    });

    // Add Service
    document.getElementById('add-service').addEventListener('click', function () {
        const container = document.getElementById('services-container');
        const template = container.querySelector('.service-line').cloneNode(true);
        template.querySelector('.service-desc').value = '';
        template.querySelector('.service-qty').value = 1;
        template.querySelector('.service-price').value = 0;

        // Re-attach delete event
        template.querySelector('.remove-service').addEventListener('click', function () {
            if (document.querySelectorAll('.service-line').length > 1) {
                this.closest('.service-line').remove();
                updatePreview();
            }
        });

        container.appendChild(template);
        updatePreview();
    });

    // Remove Service (Initial)
    document.querySelectorAll('.remove-service').forEach(btn => {
        btn.addEventListener('click', function () {
            if (document.querySelectorAll('.service-line').length > 1) {
                this.closest('.service-line').remove();
                updatePreview();
            }
        });
    });

    // Initialize
    updatePreview();

    // Submit Mock
    document.getElementById('quote-form').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Devis enregistré et prêt à être envoyé !');
    });
    });
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>